<?php

namespace App\Repositories;

use App\Models\UserModel;

class LoginRepository {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findByUsername($username) {
        $this->db->openConnection();
        $res = $this->db->execPrepared(<<<SQL
        SELECT U.id, R.nombre AS rol, U.nombre, U.correo, U.contrasena, U.fecha_creacion, U.fecha_actualizacion, U.concurrencia
        FROM USUARIOS_DB.USUARIOS U
        INNER JOIN Roles R ON U.rol_fk = R.id
        WHERE U.nombre = :nombre;
        SQL, [':nombre' => $username]);
        $this->db->closeConnection();
        return new UserModel($res);
    }
}