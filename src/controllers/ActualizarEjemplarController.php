<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class ActualizarEjemplarController
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

        $id = $_GET['id'];
        $ejemplar = $this->repo->findById($id);
        $productos = $this->repoProductos->findAll();
        $ubicaciones = $this->repoUbicaciones->findAll();

        if (isset($_POST['actualizar'])) {
            $productoId = $_POST['producto'];
            $ubicacionId = $_POST['ubicacion'];
            $precio = $_POST['precio'];

            $isValido = $this->service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);
            if ($isValido) {
                $this->repo->update($id, $productoId, $ubicacionId, $precio, $ejemplar->getConcurrencia());
                header('Location: index.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }

        
        $this->view->setEjemplar($ejemplar);
        $this->view->setProductos($productos);
        $this->view->render();
    }
}
