<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\BorrarCategoriaController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\CategoriasRepository;

$config = new Config();
$db = new Database($config);
$repo = new CategoriasRepository($db);
$controller = new BorrarCategoriaController($repo);
$controller->run();
