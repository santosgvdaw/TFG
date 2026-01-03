<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class UsuariosController {
    private $repo;
    private $view;

    public function __construct($repo, $view) {
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run() {
        if (!isset($_SESSION['isLogged'])) {
            header('Location: index.php');
            exit;
        }

        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
            header('Location: index.php');
            exit;
        }

        $usuarios = $this->repo->findAll();
        $this->view->setUsuarios($usuarios);
        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);
        $this->view->render();
    }
}
