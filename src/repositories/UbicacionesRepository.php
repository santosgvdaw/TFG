<?php

namespace App\Repositories;

use App\Models\UbicacionModel;

class UbicacionesRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findById($id)
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->execPrepared(<<<SQL
        SELECT id, nombre, fecha_creacion, fecha_actualizacion, concurrencia
        FROM ALMACEN_DB.Ubicaciones
        WHERE id = :id;
        SQL, [':id' => $id]);
        $this->db->closeConnection();

        return new UbicacionModel($res);
    }

    public function findAll()
    {
        $ubicaciones = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT id, nombre, fecha_creacion, fecha_actualizacion, concurrencia
        FROM ALMACEN_DB.Ubicaciones;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $producto) {
            $ubicaciones[] = new UbicacionModel($producto);
        }

        return $ubicaciones;
    }

    public function save($nombre)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        INSERT INTO ALMACEN_DB.Ubicaciones (nombre, fecha_creacion, fecha_actualizacion, concurrencia)
        VALUES (:nombre, CURDATE(), CURDATE(), 0);
        SQL, [':nombre' => $nombre]);
        $this->db->closeConnection();
    }

    public function update($id, $nombre, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        UPDATE ALMACEN_DB.Ubicaciones
        SET nombre = :nombre, fecha_actualizacion = CURDATE(), concurrencia = concurrencia + 1
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':nombre' => $nombre, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }

    public function delete($id, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        DELETE FROM ALMACEN_DB.Ubicaciones
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }
}
