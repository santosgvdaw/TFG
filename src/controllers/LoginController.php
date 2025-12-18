<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class LoginController {
    private $service;
    private $repo;
    private $view;

    public function __construct($service, $repo, $view) {
        $this->service = $service;
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run() {
        if (isset($_POST['login'])) {
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            $hashedPassword = $this->repo->findPasswordByUsername($userName);
            
            $isValido = $this->service->validar($userName, $password, $hashedPassword);
            if ($isValido) {
                // TODO: iniciar sesión e ir a index
                header('Location: index.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }
        $this->view->render();
    }
}
