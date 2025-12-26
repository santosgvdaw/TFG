<?php

namespace App\Models;

require __DIR__ . '/../../vendor/autoload.php';

use PDO;
use PDOException;

class Database
{
    private $con;
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    // Crea la conexión o false si no se a creado
    public function openConnection()
    {
        try {
            $this->con = new PDO($this->config->getDSN(), $this->config->getUser(), $this->config->getPass());
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            var_dump($e);
            return null;
        }
        return $this->con;
    }

    public function closeConnection()
    {
        $this->con = null;
    }

    // Ejecuta una consulta preparada y devuelve el primer registro
    public function execPrepared(string $sql, array $params)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    // Ejecuta una consulta preparada y devuelve todos los registros
    public function execAllPrepared(string $sql, array $params)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Ejecuta una consulta y devuelve todos los registros
    public function queryAll(string $sql)
    {
        $stmt = $this->con->query($sql);
        return $stmt->fetchAll();
    }
}
