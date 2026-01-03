<?php

namespace App\Services;

class UsuariosService
{
    private $errores;

    public function validar($rol, $roles)
    {
        $this->errores = [];

        // Si hay algún rol con el id dado se elimina el error de producto
        $this->errores[0] = 'errorRol';
        foreach ($roles as $_rol) {
            if ($_rol->getId() == $rol) {
                unset($this->errores[0]);
                break;
            }
        }
        return empty($this->errores);
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
