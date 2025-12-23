<?php

namespace App\Models;

class EjemplarModel {
    private $id;
    private $nombreProducto;
    private $precio;
    private $fechaEntrada;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data["id"];
        $this->nombreProducto = $data["nombreProducto"];
        $this->precio = $data["precio"];
        $this->fechaEntrada = $data["fechaEntrada"];
        $this->fechaActualizacion = $data["fechaActualizacion"];
        $this->concurrencia = $data["concurrencia"];
    }

    public function getId() {
        return $this->id;
    }

    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function getprecio() {
        return $this->precio;
    }

    public function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    public function getFechaActualizacion() {
        return $this->fechaActualizacion;
    }

    public function getConcurrencia() {
        return $this->concurrencia;
    }
}