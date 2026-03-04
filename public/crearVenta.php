<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CrearVentaController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\VentasRepository;
use App\Repositories\EjemplaresRepository;
use App\Repositories\UbicacionesRepository;
use App\Services\VentasService;
use App\Views\CrearVentaView;

$config = new Config();
$db = new Database($config);
$repo = new VentasRepository($db);
$repoEjemplares = new EjemplaresRepository($db);
$service = new VentasService();
$view = new CrearVentaView();
$controller = new CrearVentaController($service, $repo, $repoEjemplares, $view);
$controller->run();
