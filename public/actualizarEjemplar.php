<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ActualizarEjemplarController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\EjemplaresRepository;
use App\Repositories\ProductosRepository;
use App\Repositories\UbicacionesRepository;
use App\Services\EjemplaresService;
use App\Views\ActualizarEjemplarView;

$config = new Config();
$db = new Database($config);
$repo = new EjemplaresRepository($db);
$repoProductos = new ProductosRepository($db);
$repoUbicaciones = new UbicacionesRepository($db);
$service = new EjemplaresService();
$view = new ActualizarEjemplarView();
$controller = new ActualizarEjemplarController($service, $repo, $repoProductos, $repoUbicaciones, $view);
$controller->run();
