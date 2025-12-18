<?php

namespace App\Models;

require __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

class Config
{
    private $con;
    private $host;
    private $port;
    private $db;
    private $user;
    private $pass;

    public function __construct($dbName = 'ALMACEN')
    {
        Dotenv::createImmutable(__DIR__ . '/../../')->load();
        $this->con = $_ENV['DB_CONNECTION'];
        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];

        $this->db = $_ENV['DB_'.$dbName.'_DATABASE'];
        $this->user = $_ENV['DB_'.$dbName.'_USERNAME'];
        $this->pass = $_ENV['DB_'.$dbName.'_PASSWORD'];
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getDb(): string
    {
        return $this->db;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function getDSN(): string
    {
        return "{$this->con}:host={$this->host}:{$this->port};dbname={$this->db};charset=utf8mb4";
    }
}

