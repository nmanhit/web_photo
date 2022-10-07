<?php
declare(strict_types=1);
namespace configs;

include_once "constant.php";

class database
{
    protected string $host;
    protected string $username;
    protected string $password;
    protected string $database;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->username = DB_USERNAME ;
        $this->password = DB_PASSWORD;
        $this->database = DB_DATABASE;
    }
}
