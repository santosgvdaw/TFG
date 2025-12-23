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

    public function findAll()
    {
        $ubicaciones = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT id, nombre, fecha_creacion, fecha_actualizacion, concurrencia
        FROM Ubicaciones;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $producto) {
            $ubicaciones[] = new UbicacionModel($producto);
        }

        return $ubicaciones;
    }
}
