<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

use PDOException;

class RegisterController {
    private $service;
    private $repo;
    private $view;

    public function __construct($service, $repo, $view) {
        $this->service = $service;
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run() {
        try {
            if (isset($_POST['register'])) {
                $nombre = $_POST['userName'];
                $contrasena = $_POST['password'];
                $email = $_POST['email'];
                
                $isValido = $this->service->validar($nombre, $email);
                if ($isValido) {
                    $hashedContrasena = $this->service->hash($contrasena);
                    $rolId = $this->repo->findRolIdByName("user");
                    $this->repo->saveUser($nombre, $email, $hashedContrasena, $rolId);
                    header('Location: login.php');
                    exit;
                } else { // Si hay errores
                    $this->view->setError($this->service->getErrores());
                }
            }
        } catch (PDOException $ex) {
            if ($ex->getCode() == 23000) {
                $this->view->setError(['errorExiste']);
            }
        }
        echo $this->view->render();
    }
}
