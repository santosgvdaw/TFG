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

    public function findById($id, $concurrencia)
    {
        $this->db->openConnection();
        $res = $this->db->execPrepared(<<<SQL
        SELECT E.id, P.nombre AS nombre_producto, E.precio, U.nombre AS nombre_ubicacion, E.fecha_entrada, E.fecha_actualizacion, E.concurrencia
        FROM Ejemplares E
        INNER JOIN Productos P ON E.producto_fk = P.id
        INNER JOIN Ubicaciones U ON E.ubicacion_fk = U.id
        WHERE E.id = :id AND E.concurrencia = :concurrencia;
        SQL, [':id' => $id, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
        if ($res == null) {
            return null;
        }

        return new EjemplarModel($res);
    }

    public function findAll()
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT E.id, P.nombre AS nombre_producto, E.precio, U.nombre AS nombre_ubicacion, E.fecha_entrada, E.fecha_actualizacion, E.concurrencia
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

    public function findAllAvailable()
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT E.id, P.nombre AS nombre_producto, E.precio, U.nombre AS nombre_ubicacion, E.fecha_entrada, E.fecha_actualizacion, E.concurrencia
        FROM Ejemplares E
        INNER JOIN Productos P ON E.producto_fk = P.id
        INNER JOIN Ubicaciones U ON E.ubicacion_fk = U.id
        WHERE E.venta_fk IS NULL;;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $ejemplar) {
            $ejemplares[] = new EjemplarModel($ejemplar);
        }

        return $ejemplares;
    }

    public function findAllAvailableByUbicacionCategoria($ubicacionId, $categoriaId)
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->execAllPrepared(<<<SQL
        SELECT E.id, P.nombre AS nombre_producto, E.precio, U.nombre AS nombre_ubicacion, E.fecha_entrada, E.fecha_actualizacion, E.concurrencia
        FROM Ejemplares E
        INNER JOIN Productos P ON E.producto_fk = P.id
        INNER JOIN Ubicaciones U ON E.ubicacion_fk = U.id
        WHERE E.venta_fk IS NULL
        AND E.ubicacion_fk = :ubicacion
        AND P.categoria_fk = :categoria;
        SQL, [':ubicacion' => $ubicacionId, ':categoria' => $categoriaId]);
        $this->db->closeConnection();

        foreach ($res as $ejemplar) {
            $ejemplares[] = new EjemplarModel($ejemplar);
        }

        return $ejemplares;
    }

    public function findAllAvailableByUbicacion($ubicacionId)
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->execAllPrepared(<<<SQL
        SELECT E.id, P.nombre AS nombre_producto, E.precio, U.nombre AS nombre_ubicacion, E.fecha_entrada, E.fecha_actualizacion, E.concurrencia
        FROM Ejemplares E
        INNER JOIN Productos P ON E.producto_fk = P.id
        INNER JOIN Ubicaciones U ON E.ubicacion_fk = U.id
        WHERE E.venta_fk IS NULL
        AND E.ubicacion_fk = :ubicacion;
        SQL, [':ubicacion' => $ubicacionId]);
        $this->db->closeConnection();

        foreach ($res as $ejemplar) {
            $ejemplares[] = new EjemplarModel($ejemplar);
        }

        return $ejemplares;
    }

    public function findAllAvailableByCategoria($categoriaId)
    {
        $ejemplares = [];
        $this->db->openConnection();
        $res = $this->db->execAllPrepared(<<<SQL
        SELECT E.id, P.nombre AS nombre_producto, E.precio, U.nombre AS nombre_ubicacion, E.fecha_entrada, E.fecha_actualizacion, E.concurrencia
        FROM Ejemplares E
        INNER JOIN Productos P ON E.producto_fk = P.id
        INNER JOIN Ubicaciones U ON E.ubicacion_fk = U.id
        WHERE E.venta_fk IS NULL
        AND P.categoria_fk = :categoria;
        SQL, [':categoria' => $categoriaId]);
        $this->db->closeConnection();

        foreach ($res as $ejemplar) {
            $ejemplares[] = new EjemplarModel($ejemplar);
        }

        return $ejemplares;
    }

    public function save($productoId, $ubicacionId,  $precio, $cantidad)
    {
        $this->db->openConnection();
        $this->db->beginTransaction();
        try {
            for ($i = 0; $i < $cantidad; $i++) {
                $this->db->execPrepared(<<<SQL
                INSERT INTO ALMACEN_DB.EJEMPLARES (producto_fk, ubicacion_fk, precio, fecha_entrada, fecha_actualizacion, concurrencia)
                VALUES (:productoId, :ubicacionId, :precio, CURDATE(), CURDATE(), 0);
                SQL, [':productoId' => $productoId, ':ubicacionId' => $ubicacionId, ':precio' => $precio]);
            }
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollBack();
        }
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

    public function delete($id)
    {
        $this->db->openConnection();
        $this->db->execPrepared(<<<SQL
        DELETE FROM ALMACEN_DB.EJEMPLARES
        WHERE id = :id;
        SQL, [':id' => $id]);
        $this->db->closeConnection();
    }
}
