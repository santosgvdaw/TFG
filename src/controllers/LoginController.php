<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\Models\UserModel;

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
            $user = $this->repo->findByUsername($userName);
            
            $isValido = $this->service->validar($userName, $password, $user->getContrasena());
            if ($isValido) {
                $_SESSION['isLogged'] = true;
                $_SESSION['rol'] = $user->getRol();
                header('Location: index.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }
        $this->view->render();
    }
}
