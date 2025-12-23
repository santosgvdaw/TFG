<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class EjemplaresController {
    private $repo;
    private $view;

    public function __construct($repo, $view) {
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run() {
        $ejemplares = $this->repo->findAll();
        $this->view->setEjemplares($ejemplares);
        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);
        $this->view->render();
    }
}
