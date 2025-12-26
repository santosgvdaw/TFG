<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class CrearCategoriaController
{
    private $service;
    private $repo;    private $view;

    public function __construct($service, $repo, $view)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run()
    {
        if (!isset($_SESSION['isLogged'])) {
            header('Location: categorias.php');
            exit;
        }

        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
            header('Location: categorias.php');
            exit;
        }

        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);

        if (isset($_POST['crear'])) {
            $nombre = $_POST['nombre'];

            $isValido = $this->service->validar($nombre);
            if ($isValido) {
                $this->repo->save($nombre);
                header('Location: categorias.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }

        $this->view->render();
    }
}
