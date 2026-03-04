<?php

namespace App\Services;

class CategoriasService
{
    private $errores;

    public function validar($nombre)
    {
        $this->errores = [];
        if (strlen($nombre) > 20 || empty($nombre)) {
            $this->errores[] = 'errorNombre';
        }
        return empty($this->errores);
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
