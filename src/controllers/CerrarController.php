<?php

namespace App\Controllers;

session_start();

class CerrarController {

    public function __construct() {
    }

    public function run() {
        unset($_SESSION['isLogged']);
        unset($_SESSION['rol']);
        header('Location: index.php');
    }
}
