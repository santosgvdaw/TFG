<?php

namespace App\Controllers;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

class BorrarEjemplarController
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
            $ejemplar = $this->repo->findById($id);
            $this->repo->delete($id, $ejemplar->getConcurrencia());
        }

        header('Location: index.php');
        exit;
    }
}
