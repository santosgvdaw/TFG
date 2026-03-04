<?php

namespace App\Repositories;

use App\Models\VentaModel;

class VentasRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $ventas = [];
        $this->db->openConnection();
        $res = $this->db->queryAll(<<<SQL
        SELECT id, nombre, fecha_creacion, fecha_actualizacion, concurrencia
        FROM Ventas;
        SQL);
        $this->db->closeConnection();

        foreach ($res as $ejemplar) {
            $ventas[] = new VentaModel($ejemplar);
        }

        return $ventas;
    }

    public function findById($id, $concurrencia)
    {
        $this->db->openConnection();
        $res = $this->db->execAllPrepared(<<<SQL
        SELECT V.id, E.id AS ejemplar, V.nombre, V.fecha_creacion, V.fecha_actualizacion, V.concurrencia
        FROM Ventas V
        LEFT JOIN Ejemplares E ON E.venta_fk = V.id
        WHERE V.id = :id AND V.concurrencia = :concurrencia;
        SQL, [':id' => $id, ':concurrencia' => $concurrencia]);
        $this->db->closeConnection();
        if ($res == null) {
            return null;
        }

        $venta = new VentaModel($res[0]);
        foreach ($res as $_venta) {
            if ($_venta['ejemplar'] != NULL) {
                $venta->addEjemplar($_venta['ejemplar']);
            }
        }

        return $venta;
    }

    public function save($nombre, $ejemplaresVenta)
    {
        $this->db->openConnection();
        $this->db->beginTransaction();
        try {
            $this->db->execPrepared(<<<SQL
            INSERT INTO ALMACEN_DB.Ventas (nombre, fecha_creacion, fecha_actualizacion, concurrencia)
            VALUES (:nombre, CURDATE(), CURDATE(), 0);
            SQL, [':nombre' => $nombre]);

            $venta = $this->db->execPrepared(<<<SQL
            SELECT id
            FROM ALMACEN_DB.Ventas
            WHERE nombre = :nombre;
            SQL, [':nombre' => $nombre]);

            foreach ($ejemplaresVenta as $ejemplarVenta) {
                $this->db->execPrepared(<<<SQL
                UPDATE ALMACEN_DB.EJEMPLARES
                SET venta_fk = :venta_fk
                WHERE id = :id;
                SQL, [':id' => $ejemplarVenta, 'venta_fk' => $venta['id']]);
            }
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollBack();
            throw $e;
        } finally {
            $this->db->closeConnection();
        }
    }

    public function update($id, $nombre, $ejemplaresVenta, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->beginTransaction();
        try {
            $this->db->execPrepared(<<<SQL
            UPDATE ALMACEN_DB.Ventas
            SET nombre = :nombre, fecha_actualizacion = CURDATE(), concurrencia = concurrencia + 1
            WHERE id = :id AND concurrencia = :concurrencia;
            SQL, [':id' => $id, ':nombre' => $nombre, ':concurrencia' => $concurrencia]);

            $this->db->execPrepared(<<<SQL
            UPDATE ALMACEN_DB.EJEMPLARES
            SET venta_fk = NULL
            WHERE venta_fk = :id;
            SQL, [':id' => $id]);

            foreach ($ejemplaresVenta as $ejemplarVenta) {
                $this->db->execPrepared(<<<SQL
                UPDATE ALMACEN_DB.EJEMPLARES
                SET venta_fk = :venta_fk
                WHERE id = :id;
                SQL, [':id' => $ejemplarVenta, ':venta_fk' => $id]);
            }
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollBack();
            throw $e;
        } finally {
            $this->db->closeConnection();
        }
    }

    public function delete($id, $concurrencia)
    {
        $this->db->openConnection();
        $this->db->beginTransaction();
        try {
            $this->db->execPrepared(<<<SQL
            UPDATE ALMACEN_DB.EJEMPLARES
            SET venta_fk = NULL
            WHERE venta_fk = :id;
            SQL, [':id' => $id]);


            $this->db->execPrepared(<<<SQL
            DELETE FROM ALMACEN_DB.Ventas
            WHERE id = :id AND concurrencia = :concurrencia;
            SQL, [':id' => $id, ':concurrencia' => $concurrencia]);
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollBack();
        }
        $this->db->closeConnection();
    }
}
