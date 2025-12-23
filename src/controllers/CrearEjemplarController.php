<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class CrearEjemplarController
{
    private $service;
    private $repo;
    private $repoProductos;
    private $repoUbicaciones;
    private $view;

    public function __construct($service, $repo, $repoProductos, $repoUbicaciones, $view)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->repoProductos = $repoProductos;
        $this->repoUbicaciones = $repoUbicaciones;
        $this->view = $view;
    }

    public function run()
    {
        if (!isset($_SESSION['isLogged'])) {
            header('Location: index.php');
            exit;
        }

        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);
        $productos = $this->repoProductos->findAll();
        $ubicaciones = $this->repoUbicaciones->findAll();

        if (isset($_POST['crear'])) {
            $productoId = $_POST['producto'];
            $ubicacionId = $_POST['ubicacion'];
            $precio = $_POST['precio'];

            $isValido = $this->service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);
            if ($isValido) {
                $this->repo->save($productoId, $ubicacionId, $precio);
                header('Location: index.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }

        
        $this->view->setProductos($productos);
        $this->view->setUbicaciones($ubicaciones);
        $this->view->render();
    }
}
