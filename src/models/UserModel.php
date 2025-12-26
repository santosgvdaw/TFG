<?php

namespace App\Models;

class UserModel {
    private $id;
    private $nombre;
    private $rol;
    private $correo;
    private $contrasena;
    private $fechaCreacion;
    private $fechaActualizacion;
    private $concurrencia;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->nombre = $data['nombre'];
        $this->rol = $data['rol'];
        $this->correo = $data['correo'];
        $this->contrasena = $data['contrasena'];
        $this->fechaCreacion = $data['fecha_creacion'];
        $this->fechaActualizacion = $data['fecha_actualizacion'];
        $this->concurrencia = $data['concurrencia'];
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getContrasena() {
        return $this->contrasena;
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