<?php

namespace App\Models;

class CategoriaModel {
    private $id;
    private $nombre;
    private $fechaCreacion;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
        $this->fechaCreacion = $data["fecha_creacion"];
        $this->fechaActualizacion = $data["fecha_actualizacion"];
        $this->concurrencia = $data["concurrencia"];
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function getFechaActualizacion() {
        return $this->fechaActualizacion;
    }

    public function getConcurrencia() {
        return $this->concurrencia;
    }
}