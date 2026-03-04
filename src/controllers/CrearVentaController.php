<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

use PDOException;

class CrearVentaController
{
    private $service;
    private $repo;
    private $repoEjemplares;
    private $view;

    public function __construct($service, $repo, $repoEjemplres, $view)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->repoEjemplares = $repoEjemplres;
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
        $ejemplares = $this->repoEjemplares->findAllAvailable();
        
        try {
            if (isset($_POST['crear'])) {
                $nombre = $_POST['nombre'];
                $numEjemplares = $_POST['numEjemplares'];
                $ejemplaresVenta = [];
                for ($i=1; $i <= $numEjemplares; $i++) { 
                    $ejemplaresVenta[] = $_POST["ejemplar{$i}"];
                }
                $idEjemplares = array_map(fn($e) => $e->getId(), $ejemplares);

                $isValido = $this->service->validar($nombre, $ejemplaresVenta, $idEjemplares);
                if ($isValido) {
                    $error = $this->repo->save($nombre, $ejemplaresVenta);
                    header('Location: ventas.php');
                    exit;
                } else { // Si hay errores
                    $this->view->setError($this->service->getErrores());
                }
            }
        } catch (PDOException $ex) {
            if ($ex->getCode() == 23000) {
                $this->view->setError(['errorExiste']);
            }
        }

        
        $this->view->setEjemplares($ejemplares);
        $this->view->render();
    }
}
