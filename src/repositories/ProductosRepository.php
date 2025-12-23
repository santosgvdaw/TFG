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

    public function findAll()
    {
        $productos = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT P.id, P.nombre, P.descripcion, P.stock_minimo, C.nombre AS nombre_ubicacion, P.fecha_creacion, P.fecha_actualizacion, P.concurrencia
        FROM Productos P
        INNER JOIN Categorias C ON P.categoria_fk = C.id;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $producto) {
            $productos[] = new ProductoModel($producto);
        }

        return $productos;
    }
}
