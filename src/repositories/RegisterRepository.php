<?php

namespace App\Repositories;

class RegisterRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function saveUser($nombre, $correo, $contrasena, $rol)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        INSERT INTO USUARIOS_DB.USUARIOS (nombre, correo, contrasena, rol_fk, fecha_creacion, fecha_actualizacion, concurrencia)
        VALUES (:nombre, :correo, :contrasena, :rol, CURDATE(), CURDATE(), 0);
        SQL, [':nombre' => $nombre, ':correo' => $correo, ':contrasena' => $contrasena, ':rol' => $rol]);
        $this->db->closeConnection();
    }

    public function findRolIdByName($nombre)
    {
        $this->db->openConnection();
        $res = $this->db->execPrepared(<<<SQL
        SELECT id
        FROM USUARIOS_DB.Roles
        WHERE nombre = :nombre;
        SQL, [':nombre' => $nombre]);
        $this->db->closeConnection();
        return $res->id;
    }
}
