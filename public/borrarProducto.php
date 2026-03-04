<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\BorrarProductoController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\ProductosRepository;

$config = new Config();
$db = new Database($config);
$repo = new ProductosRepository($db);
$controller = new BorrarProductoController($repo);
$controller->run();
