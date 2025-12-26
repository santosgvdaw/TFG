<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class CategoriasController {
    private $repo;
    private $view;

    public function __construct($repo, $view) {
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run() {
        $categorias = $this->repo->findAll();
        $this->view->setCategorias($categorias);
        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);
        $this->view->render();
    }
}
