<?php

declare(strict_types=1);


namespace database;

include "configs/database.php";

use configs\database as databaseConfig;


class Database extends databaseConfig
{
    public object|null $conn;
    protected string $database;
    protected string $host;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->conn = NULL;
        $dbParam = new databaseConfig();
        $this->database = $dbParam->database;
        $this->host = $dbParam->host;
        $this->username = $dbParam->username;
        $this->password = $dbParam->password;
        $dbParam = NULL;
    }

    public function dbConnect(): object
    {
        $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->database);
        return $this->conn;
    }

    public function execQuery($query, $bind_vars = []): object|bool
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($bind_vars);
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

}
