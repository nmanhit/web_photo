<?php declare(strict_types=1);
namespace Base_model;

$DatabaseConfig = require('../../configs/database.php');
$db = new \mysqli($DatabaseConfig["host"], $DatabaseConfig["username"], $DatabaseConfig["password"], $DatabaseConfig["database"]);

class base_model {
    public $last_error_message;
    protected $db;
    protected $properties = array();

    public function __construct($data_array = null) {
        if(isset($data_array) && is_array($data_array)) {
            $this->properties = $data_array;
        }
        $this->setDB();
    }

    public static function table_name() {
        return strtolower(get_called_class());
    }

    public function __get($key) {
        return $this->properties[$key];
    }

    public function __set($key, $value) {
        return $this->properties[$key] = $value;
    }

    public function exists() {
        if(isset($this->properties) && isset($this->properties['id']) && is_numeric($this->id)) {
            return true;
        } else {
            return false;
        }
    }

    public function setDB() {
        global $db;
        $this->db = $db;
    }

    public static function all() {
        global $db;
        $sql = "SELECT * FROM ". self::table_name();
        $q = $db->prepare($sql);
        $categories = [];
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }
        $db->close();
        return $categories;
    }

    public static function find($id) {
        global $db;
        $sql = "SELECT * FROM ".self::table_name()." WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->get_result();
        while ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
    }

    public function save() {
        # Table Name && Created/Updated Fields
        $table_name = self::table_name();
        if($this->exists() === false) {
            $this->is_active = 1;
            $this->create_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->update_time = strtotime(date('Y-m-d H:i:s'));
        $this->create_by = 1;

        # Create SQL Query
        $sql_insert_string1 = "";
        $sql_insert_string2 = "";
        $sql_update_string = "";
        $total_properties_count = count($this->properties);
        $x = 0;

        foreach($this->properties as $k => $v) {
            $x++;
            if($this->exists()) {
                if($k != "id" && $k != "create_time") {
                    $sql_update_string .= $k."=?";
                    $bind_vars[] = $v;
                    if($x != $total_properties_count) {
                        $sql_update_string .= ", ";
                    }
                }
            }
            else {
                $bind_vars[] = $v;
                $sql_insert_string1 .= $k;
                $sql_insert_string2 .= "?";
                if($x != $total_properties_count) {
                    $sql_insert_string1 .= ", ";
                    $sql_insert_string2 .= ", ";
                }
            }
        }

        # Final SQL Statement
        $sqlInsert = $table_name." (".$sql_insert_string1. ") VALUES (".$sql_insert_string2.")";
        $sqlUpdate = $table_name." SET ".$sql_update_string;
        if($this->exists()) {
            $final_sql = "UPDATE ".$sqlUpdate." WHERE id=?";
            $bind_vars[] = $this->properties["id"];
        } else {
            $final_sql = "INSERT INTO ".$sqlInsert;
        }


        echo $final_sql;
        # Run the Insert or Update
        $stmt = $this->db->prepare($final_sql);
        $stmt->execute($bind_vars);
        $stmt->close();
    }
}

