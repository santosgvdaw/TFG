<?php

namespace App\Models;

class ProductoModel
{
    private $id;
    private $nombre;
    private $descripcion;
    private $stockMinimo;
    private $nombreUbicacion;
    private $fechaCreacion;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->nombre = $data['nombre'];
        $this->descripcion = $data['descripcion'];
        $this->stockMinimo = $data['stock_minimo'];
        $this->nombreUbicacion = $data['nombre_ubicacion'];
        $this->fechaCreacion = $data['fecha_creacion'];
        $this->fechaActualizacion = $data['fecha_actualizacion'];
        $this->concurrencia = $data['concurrencia'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getStockMinimo()
    {
        return $this->stockMinimo;
    }

    public function getNombreUbicacion()
    {
        return $this->nombreUbicacion;
    }

    public function getFechaEntrada()
    {
        return $this->fechaCreacion;
    }

    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

    public function getConcurrencia()
    {
        return $this->concurrencia;
    }
}
