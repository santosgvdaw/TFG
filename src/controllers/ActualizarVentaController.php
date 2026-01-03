<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class ActualizarVentaController
{
    private $service;
    private $repo;
    private $repoEjemplares;
    private $view;

    public function __construct($service, $repo, $repoEjemplares, $view)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->repoEjemplares = $repoEjemplares;
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

        $id = $_REQUEST['id'];
        $venta = $this->repo->findById($id);
        $ejemplares = $this->repoEjemplares->findAll();

        if (isset($_POST['actualizar'])) {
            $nombre = $_POST['nombre'];
            $numEjemplares = $_POST['numEjemplares'];
            $ejemplaresVenta = [];
            for ($i=1; $i <= $numEjemplares; $i++) { 
                $ejemplaresVenta[] = $_POST["ejemplar{$i}"];
            }
            $ejemplares = array_map(fn($e) => $e->getId(), $ejemplares);

            $isValido = $this->service->validar($nombre, $ejemplaresVenta, $ejemplares);
            if ($isValido) {
                $this->repo->update($id, $nombre, $ejemplaresVenta, $venta->getConcurrencia());
                header('Location: ventas.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }

        
        $this->view->setVenta($venta);
        $this->view->setEjemplares($ejemplares);
        $this->view->render();
    }
}
