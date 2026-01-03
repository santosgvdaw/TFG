<?php

namespace App\Repositories;

use App\Models\RolesModel;
use App\Models\UsuariosModel;

class UsuariosRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findById($id)
    {
        $this->db->openConnection();
        $res = $this->db->execPrepared(<<<SQL
        SELECT U.id, U.nombre, R.nombre AS nombre_rol, U.correo, U.fecha_creacion, U.fecha_actualizacion, U.concurrencia
        FROM USUARIOS_DB.Usuarios U
        INNER JOIN USUARIOS_DB.Roles R ON U.rol_fk = R.id
        WHERE U.id = :id;
        SQL, [':id' => $id]);
        $this->db->closeConnection();

        return new UsuariosModel($res);
    }

    public function findAll()
    {
        $usuarios = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT U.id, U.nombre, R.nombre AS nombre_rol, U.correo, U.fecha_creacion, U.fecha_actualizacion, U.concurrencia
        FROM USUARIOS_DB.Usuarios U
        INNER JOIN USUARIOS_DB.Roles R ON U.rol_fk = R.id;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $usuario) {
            $usuarios[] = new UsuariosModel($usuario);
        }

        return $usuarios;
    }

    public function findAllRoles()
    {
        $roles = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT id, nombre, fecha_creacion, fecha_actualizacion, concurrencia
        FROM USUARIOS_DB.Roles;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $rol) {
            $roles[] = new RolesModel($rol);
        }

        return $roles;
    }

    public function update($id, $rolId, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        UPDATE USUARIOS_DB.Usuarios
        SET rol_fk = :rol, fecha_actualizacion = CURDATE(), concurrencia = concurrencia + 1
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':rol' => $rolId, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }

    public function delete($id, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        DELETE FROM USUARIOS_DB.Usuarios
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }
}
