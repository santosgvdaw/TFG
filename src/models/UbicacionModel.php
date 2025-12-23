<?php

namespace App\Models;

class UbicacionModel
{
    private $id;
    private $nombre;
    private $fechaEntrada;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
        $this->fechaEntrada = $data["fechaEntrada"];
        $this->fechaActualizacion = $data["fechaActualizacion"];
        $this->concurrencia = $data["concurrencia"];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
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
