<?php

namespace App\Repositories;

class LoginRepository {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findPasswordByUsername($username) {
        $this->db->openConnection();
        $res = $this->db->execPrepared("SELECT contrasena FROM USUARIOS_DB.USUARIOS WHERE nombre = :nombre;", [':nombre' => $username]);
        $this->db->closeConnection();
        return $res;
    }
}