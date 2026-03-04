<?php

namespace App\Services;

class LoginService {
    private $errores;

    public function validar($nombre, $password, $hashedPassword) {
        $this->errores = [];
        if (strlen($nombre) > 20 || empty($nombre)) {
            $this->errores[] = 'errorNombre';
        }
        if (!password_verify($password, $hashedPassword)) {
            $this->errores[] = 'errorContrasena';
        }
        return empty($this->errores);
    }

    public function getErrores() {
        return $this->errores;
    }
}
