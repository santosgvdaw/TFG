<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ActualizarProductoController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\CategoriasRepository;
use App\Repositories\ProductosRepository;
use App\Services\ProductosService;
use App\Views\ActualizarProductoView;

$config = new Config();
$db = new Database($config);
$repo = new ProductosRepository($db);
$repoCategorias = new CategoriasRepository($db);
$service = new ProductosService();
$view = new ActualizarProductoView();
$controller = new ActualizarProductoController($service, $repo, $repoCategorias, $view);
$controller->run();
