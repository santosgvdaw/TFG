<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class ActualizarUsuarioController
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
        $usuario = $this->repo->findById($id);
        $roles = $this->repo->findAllRoles();

        if (isset($_POST['actualizar'])) {
            $rol = $_POST['rol'];

            $isValido = $this->service->validar($rol, $roles);
            if ($isValido) {
                $this->repo->update($usuario->getId(), $rol, $usuario->getConcurrencia());
                header('Location: usuarios.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }


        $this->view->setUsuario($usuario);
        $this->view->setRoles($roles);
        $this->view->render();
    }
}
