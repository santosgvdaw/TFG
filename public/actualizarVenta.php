<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ActualizarVentaController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\EjemplaresRepository;
use App\Repositories\VentasRepository;
use App\Services\VentasService;
use App\Views\ActualizarVentaView;

$config = new Config();
$db = new Database($config);
$repo = new VentasRepository($db);
$repoEjemplares = new EjemplaresRepository($db);
$service = new VentasService();
$view = new ActualizarVentaView();
$controller = new ActualizarVentaController($service, $repo, $repoEjemplares, $view);
$controller->run();
