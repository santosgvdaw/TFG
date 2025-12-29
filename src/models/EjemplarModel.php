<?php

namespace App\Models;

class EjemplarModel
{
    private $id;
    private $nombreProducto;
    private $nombreUbicacion;
    private $precio;
    private $fechaEntrada;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data["id"];
        $this->nombreProducto = $data["nombre_producto"];
        $this->nombreUbicacion = $data["nombre_ubicacion"];
        $this->precio = $data["precio"];
        $this->fechaEntrada = $data["fecha_entrada"];
        $this->fechaActualizacion = $data["fecha_actualizacion"];
        $this->concurrencia = $data["concurrencia"];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    public function getNombreUbicacion()
    {
        return $this->nombreUbicacion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
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
