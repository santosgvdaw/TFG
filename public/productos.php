<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ProductosController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\ProductosRepository;
use App\Views\ProductosView;

$config = new Config();
$db = new Database($config);
$repo = new ProductosRepository($db);
$view = new ProductosView();
$controller = new ProductosController($repo, $view);
$controller->run();
