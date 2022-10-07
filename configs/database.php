<?php
declare(strict_types=1);
namespace configs;

class database
{
    protected string $host;
    protected string $username;
    protected string $password;
    protected string $database;

    public function __construct()
    {
        $this->host = getenv("DB_HOST");
        $this->username = getenv("DB_USERNAME");
        $this->password = getenv("DB_PASSWORD");
        $this->database = getenv("DB_DATABASE");
    }
}
