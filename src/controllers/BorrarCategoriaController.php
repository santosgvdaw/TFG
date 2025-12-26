<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class BorrarCategoriaController
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

        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
            header('Location: index.php');
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = $this->repo->findById($id);
            $this->repo->delete($id, $categoria->getConcurrencia());
        }

        header('Location: categorias.php');
        exit;
    }
}
