<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

use PDOException;

class ActualizarUbicacionController
{
    private $service;
    private $repo;
    private $view;

    public function __construct($service, $repo, $view)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->view = $view;
    }

    public function run()
    {
        if (!isset($_SESSION['isLogged'])) {
            header('Location: index.php');
            exit;
        }

        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
            header('Location: index.php');
            exit;
        }

        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);

        $id = $_REQUEST['id'];
        $concurrencia = $_REQUEST['con'];
        $ubicacion = $this->repo->findById($id, $concurrencia);
        if ($ubicacion == null) {
            header('Location: ubicaciones.php');
            exit;
        }

        try {
            if (isset($_POST['actualizar'])) {
                $nombre = $_POST['nombre'];

                $isValido = $this->service->validar($nombre);
                if ($isValido) {
                    $this->repo->update($ubicacion->getId(), $nombre, $concurrencia);
                    header('Location: ubicaciones.php');
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

        $this->view->setUbicacion($ubicacion);
        $this->view->render();
    }
}
