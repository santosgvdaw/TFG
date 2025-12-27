<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

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
        //$this->view->setRol($_SESSION['rol']);

        $id = $_REQUEST['id'];
        $categorias = $this->repoCategorias->findAll();
        $this->view->setCategorias($categorias);

        $producto = $this->repo->findById($id);

        if (isset($_POST['actualizar'])) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $categoriaId = $_POST['categoria'];
            $stockMinimo = $_POST['stockMinimo'];

            $isValido = $this->service->validar($categoriaId, $categorias, $nombre, $descripcion, $stockMinimo);
            if ($isValido) {
                $this->repo->update($producto->getId(), $nombre, $descripcion, $categoriaId, $stockMinimo, $producto->getConcurrencia());
                header('Location: productos.php');
                exit;
            } else { // Si hay errores
                $this->view->setError($this->service->getErrores());
            }
        }


        $this->view->setProducto($producto);
        $this->view->render();
    }
}
