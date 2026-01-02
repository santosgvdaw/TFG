<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\Models\VentaModel;

class VentasController {
    private $repo;
    private $view;

    public function __construct($repo, $view) {
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run() {
        $ventas = $this->repo->findAll();
        $this->view->setVentas($ventas);
        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);
        $this->view->render();
    }
}
