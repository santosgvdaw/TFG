<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

use PDOException;

class ActualizarProductoController
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
            header('Location: index.php');
            exit;
        }

        $this->view->setIsLogged(isset($_SESSION['isLogged']));
        $this->view->setRol($_SESSION['rol']);

        $categorias = $this->repoCategorias->findAll();
        $this->view->setCategorias($categorias);

        $id = $_REQUEST['id'];
        $concurrencia = $_REQUEST['con'];

        $producto = $this->repo->findById($id, $concurrencia);
        if ($producto == null) {
            header('Location: productos.php');
            exit;
        }

        try {
            if (isset($_POST['actualizar'])) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $categoriaId = $_POST['categoria'];
                $stockMinimo = $_POST['stockMinimo'];

                $isValido = $this->service->validar($categoriaId, $categorias, $nombre, $descripcion, $stockMinimo);
                if ($isValido) {
                    $this->repo->update($producto->getId(), $nombre, $descripcion, $categoriaId, $stockMinimo, $concurrencia);
                    header('Location: productos.php');
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


        $this->view->setProducto($producto);
        $this->view->render();
    }
}
