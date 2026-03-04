<?php

namespace App\Models;

class UsuariosModel
{
    private $id;
    private $nombre;
    private $correo;
    private $nombreRol;
    private $fechaCreacion;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data["id"];
        $this->nombre = $data["nombre"];
        $this->correo = $data["correo"];
        $this->nombreRol = $data["nombre_rol"];
        $this->fechaCreacion = $data["fecha_creacion"];
        $this->fechaActualizacion = $data["fecha_actualizacion"];
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

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNombreRol()
    {
        return $this->nombreRol;
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
