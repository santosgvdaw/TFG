<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class EjemplaresController {
    private $repo;
    private $repoUbicaciones;
    private $repoCategorias;
    private $view;

    public function __construct($repo, $repoUbicaciones, $repoCategorias, $view) {
        $this->repo = $repo;
        $this->repoUbicaciones = $repoUbicaciones;
        $this->repoCategorias = $repoCategorias;
        $this->view = $view;
    }

    public function run() {
        $ejemplares = null;
        // Filtrar por Ubicación y Categoría
        if (isset($_GET['filtrar']) && !empty($_GET['ubicacion']) && !empty($_GET['categoria'])) {
            $ejemplares = $this->repo->findAllAvailableByUbicacionCategoria($_GET['ubicacion'], $_GET['categoria']);
        // Filtrar por Ubicación
        } elseif (isset($_GET['filtrar']) && !empty($_GET['ubicacion']) && empty($_GET['categoria'])) {
        $ejemplares = $this->repo->findAllAvailableByUbicacion($_GET['ubicacion']);
        // Filtrar por Categoría
        } elseif (isset($_GET['filtrar']) && empty($_GET['ubicacion']) && !empty($_GET['categoria'])) {
        $ejemplares = $this->repo->findAllAvailableByCategoria($_GET['categoria']);
        // Obtener todos los ejemplares
        } else {
            $ejemplares = $this->repo->findAllAvailable();
        }
        $ubicaciones = $this->repoUbicaciones->findAll();
        $categorias = $this->repoCategorias->findAll();
        $this->view->setEjemplares($ejemplares);
        $this->view->setUbicacion($_GET['ubicacion'] ?? '');
        $this->view->setUbicaciones($ubicaciones);
        $this->view->setCategoria($_GET['categoria'] ?? '');
        $this->view->setCategorias($categorias);
        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol'] ?? 'invitado');
        $this->view->render();
    }
}
