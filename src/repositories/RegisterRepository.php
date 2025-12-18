<?php

namespace App\Repositories;

class RegisterRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function saveUser($nombre, $correo, $contrasena)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        INSERT INTO USUARIOS_DB.USUARIOS (nombre, correo, contrasena, fecha_creacion, fecha_actualizacion, concurrencia)
        VALUES :nombre, :correo, :contrasena; CURRENT_DATE(), CURRENT_DATE(), 0;
        SQL, [':nombre' => $nombre, ':correo' => $correo, ':contrasena' => $contrasena]);
        $this->db->closeConnection();
    }
}
