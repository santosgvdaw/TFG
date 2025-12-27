<?php

namespace App\Models;

class ProductoModel
{
    private $id;
    private $nombre;
    private $categoria;
    private $descripcion;
    private $stockMinimo;
    private $stockActual;
    private $fechaCreacion;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->nombre = $data['nombre'];
        $this->categoria = $data['categoria'];
        $this->descripcion = $data['descripcion'];
        $this->stockMinimo = $data['stock_minimo'];
        $this->stockActual = $data['stock_actual'];
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

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getStockMinimo()
    {
        return $this->stockMinimo;
    }

    public function getStockActual()
    {
        return $this->stockActual;
    }

    public function getFechaCreacion()
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
