<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class BorrarProductoController
{
    private $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function run()
    {
        if (!isset($_SESSION['isLogged'])) {
            header('Location: index.php');
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = $this->repo->findById($id);
            $this->repo->delete($id, $producto->getConcurrencia()); 
        }

        header('Location: productos.php');
        exit;
    }
}
