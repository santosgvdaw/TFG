<?php

namespace App\Repositories;

use App\Models\ProductoModel;

class ProductosRepository
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
        SELECT P.id, P.nombre, P.descripcion, P.stock_minimo, (SELECT COUNT(*) FROM Ejemplares e WHERE e.producto_fk = p.id) AS stock_actual, C.nombre AS categoria, P.fecha_creacion, P.fecha_actualizacion, P.concurrencia
        FROM Productos P
        INNER JOIN Categorias C ON P.categoria_fk = C.id
        WHERE P.id = :id;
        SQL, [':id' => $id]);
        $this->db->closeConnection();

        return new ProductoModel($res);
    }

    public function findAll()
    {
        $productos = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT P.id, P.nombre, P.descripcion, P.stock_minimo, (SELECT COUNT(*) FROM Ejemplares e WHERE e.producto_fk = p.id) AS stock_actual, C.nombre AS categoria, P.fecha_creacion, P.fecha_actualizacion, P.concurrencia
        FROM Productos P
        INNER JOIN Categorias C ON P.categoria_fk = C.id;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $producto) {
            $productos[] = new ProductoModel($producto);
        }

        return $productos;
    }

    public function save($nombre, $descripcion, $categoriaId, $stockMinimo)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        INSERT INTO ALMACEN_DB.Productos (nombre, descripcion, categoria_fk, stock_minimo, fecha_creacion, fecha_actualizacion, concurrencia)
        VALUES (:nombre, :descripcion, :categoriaId, :stockMinimo, CURDATE(), CURDATE(), 0);
        SQL, [':nombre' => $nombre, ':descripcion' => $descripcion, ':categoriaId' => $categoriaId, ':stockMinimo' => $stockMinimo]);
        $this->db->closeConnection();
    }

    public function update($id, $nombre, $descripcion, $categoriaId, $stockMinimo, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        UPDATE ALMACEN_DB.Productos
        SET categoria_fk = :categoriaId, nombre = :nombre, descripcion = :descripcion, stock_minimo = :stockMinimo, fecha_actualizacion = CURDATE(), concurrencia = concurrencia + 1
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':categoriaId' => $categoriaId, ':nombre' => $nombre, ':descripcion' => $descripcion, ':stockMinimo' => $stockMinimo, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }

    public function delete($id, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        DELETE FROM ALMACEN_DB.Productos
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }
}
