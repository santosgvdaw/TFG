<?php

namespace App\Repositories;

use App\Models\CategoriaModel;

class CategoriasRepository
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
        FROM Categorias
        WHERE id = :id;
        SQL, [':id' => $id]);
        $this->db->closeConnection();

        return new CategoriaModel($res);
    }

    public function findAll()
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT id, nombre, fecha_creacion, fecha_actualizacion, concurrencia
        FROM Categorias;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $categoria) {
            $ejemplares[] = new CategoriaModel($categoria);
        }

        return $ejemplares;
    }

    public function save($nombre)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        INSERT INTO ALMACEN_DB.Categorias (nombre, fecha_creacion, fecha_actualizacion, concurrencia)
        VALUES (:nombre, CURDATE(), CURDATE(), 0);
        SQL, [':nombre' => $nombre]);
        $this->db->closeConnection();
    }

    public function update($id, $nombre, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        UPDATE ALMACEN_DB.Categorias
        SET nombre = :nombre, fecha_actualizacion = CURDATE(), concurrencia = concurrencia + 1
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':nombre' => $nombre, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }

    public function delete($id, $concurrencia) {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        DELETE FROM ALMACEN_DB.Categorias
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }
}
