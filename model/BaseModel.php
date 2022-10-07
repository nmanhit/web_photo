<?php
declare(strict_types=1);
namespace model;

include "database/database.php";

use database\Database as Database;

class BaseModel
{
    protected object $db;
    protected array $properties = [];
    protected string $id_field = "id";
    private array $properties_ignore_update = array("id", "create_time", "create_by");

    public function __construct()
    {
        $this->setDB();
    }

    protected function table_name(): string
    {
        $get_table_method = "table_name";
        if (method_exists($this, $get_table_method) && is_callable(array($this, $get_table_method))) {
            return call_user_func(
                array($this, "table_name")
            );
        }
        return "";
    }

    public function exists(): bool
    {
        if (isset($this->properties) && array_key_exists($this->id_field, $this->properties)) {
            return true;
        }
        return false;
    }

    public function setDB(): void
    {
        $dbInstant = new Database();
        $dbInstant->dbConnect();
        $this->db = $dbInstant;
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->table_name()}";
        $result = $this->db->execQuery($sql);
        if ($result->num_rows == 0) return [];

        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    }

    public function findById($id): array
    {
        $sql = "SELECT * FROM {$this->table_name()} WHERE " . $this->id_field . "=?;";
        $result = $this->db->execQuery($sql, array($id));
        return mysqli_fetch_assoc($result);
    }

    public function getProperties(): array
    {
        $propertiesSet = [];
        $called_vars = array_keys(get_class_vars(get_class($this)));
        $current_vars = array_keys(get_class_vars(__CLASS__));
        $properties = array_filter($called_vars, function ($key, $column) use ($current_vars) {
            return !in_array("$key", $current_vars);
        }, ARRAY_FILTER_USE_BOTH);
        foreach ($properties as $property) {
            $rp = new \ReflectionProperty(get_class($this), $property);
            if ($rp->isInitialized($this)) {
                $propertiesSet[$property] = $this->{$property};
            }
        }
        return $propertiesSet;
    }

    public function save(): bool
    {
        $this->properties = $this->getProperties();
        if ($this->exists()) {
            return $this->update();
        }
        return $this->insert();
    }

    protected function update(): bool
    {
        $id = $this->properties[$this->id_field];
        $this->properties = array_filter($this->properties, function ($column) {
            return !in_array("$column", $this->properties_ignore_update);
        }, ARRAY_FILTER_USE_KEY);
        $data = array_values($this->properties);
        $data[] = $id;
        $query = $this->getQueryUpdate();
        $this->db->execQuery($query, $data);
        return true;
    }

    protected function insert(): bool
    {
        $currentTime = strtotime(date('Y-m-d H:i:s'));
        $this->properties["is_active"] = ACTIVE;
        $this->properties["create_time"] = $currentTime;
        $this->properties["update_time"] = $currentTime;
        $this->properties["create_by"] = LOGIN_ID;
        $data = array_values($this->properties);
        $query = $this->getQueryInsert();
        $this->db->execQuery($query, $data);
        return true;
    }

    protected function getQueryUpdate(): string
    {
        $sql_set = "";
        foreach ($this->properties as $property => $value) {
            $sql_set .= " " . $property . "=?,";
        }
        $sql_set = substr_replace($sql_set, "", -1);
        return "UPDATE {$this->table_name()} SET $sql_set WHERE " . $this->id_field . "=?;";
    }


    protected function getQueryInsert(): string
    {
        $sql_key = "";
        $sql_value = "";
        foreach ($this->properties as $property => $value) {
            $sql_key .= " " . $property . ",";
            $sql_value .= "?,";
        }
        $sql_key = substr_replace($sql_key, "", -1);
        $sql_value = substr_replace($sql_value, "", -1);
        return "INSERT INTO {$this->table_name()} ($sql_key) VALUES ($sql_value);";
    }
}