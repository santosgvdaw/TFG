<?php

namespace App\Services;

class RegisterService
{
    private $errores;

    public function validar($nombre, $correo)
    {
        $this->errores = [];
        if (strlen($nombre) > 20 || empty($nombre)) {
            $this->errores[] = 'errorNombre';
        }
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $this->errores[] = 'errorEmail';
        }
        return empty($this->errores);
    }

    public function hash($contrasena)
    {
        return password_hash($contrasena, PASSWORD_BCRYPT);;
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
