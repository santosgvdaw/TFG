<?php

namespace App\Repositories;

use App\Models\EjemplarModel;

class EjemplaresRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT E.id, P.nombre, E.precio, U.nombre, E.fecha_creacion, E.fecha_actualizacion, E.concurrencia
        FROM Ejemplares E
        INNER JOIN Productos P ON E.producto_fk = P.id
        INNER JOIN Ubicaciones U ON E.ubicacion_fk = U.id;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $ejemplar) {
            $ejemplares[] = new EjemplarModel($ejemplar);
        }

        return $ejemplares;
    }

    public function save($productoId, $ubicacionId,  $precio)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        INSERT INTO ALMACEN_DB.EJEMPLARES (producto_fk, ubicacion_fk, precio, fecha_creacion, fecha_actualizacion, concurrencia)
        VALUES (:productoId, :ubicacionId, :precio, CURDATE(), CURDATE(), 0);
        SQL, [':productoId' => $productoId, ':ubicacionId' => $ubicacionId, ':precio' => $precio]);
        $this->db->closeConnection();
    }

    public function update($id, $productoId, $ubicacionId,  $precio, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        UPDATE ALMACEN_DB.EJEMPLARES
        SET producto_fk = :productoId, ubicacion_fk = :ubicacionId, precio = :precio, fecha_actualizacion = CURDATE(), concurrencia = concurrencia + 1
        WHERE id = :id AND concurrencia = :concurrencia;
        SQL, [':id' => $id, ':productoId' => $productoId, ':ubicacionId' => $ubicacionId, ':precio' => $precio, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
    }

    public function delete($id) {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        DELETE FROM ALMACEN_DB.EJEMPLARES
        WHERE id = :id;
        SQL, [':id' => $id]);
        $this->db->closeConnection();
    }
}
