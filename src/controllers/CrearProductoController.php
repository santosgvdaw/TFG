<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class CrearProductoController
{
    private $service;
    private $repo;
    private $repoCategorias;
    private $view;

    public function __construct($service, $repo, $repoCategorias, $view)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->repoCategorias = $repoCategorias;
        $this->view = $view;
    }

    public function run()
    {
        if (!isset($_SESSION['isLogged'])) {
            header('Location: productos.php');
            exit;
        }

        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);

        $categorias = $this->repoCategorias->findAll();
        $this->view->setCategorias($categorias);

        if (isset($_POST['crear'])) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];
            $stockMinimo = $_POST['stockMinimo'];

            $isValido = $this->service->validar($categoria, $categorias, $nombre, $descripcion, $stockMinimo);
            if ($isValido) {
                $this->repo->save($nombre, $descripcion, $categoria, $stockMinimo);
                header('Location: productos.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }

        $this->view->render();
    }
}
