<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CrearUbicacionController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\UbicacionesRepository;
use App\Services\UbicacionesService;
use App\Views\CrearUbicacionView;

$config = new Config();
$db = new Database($config);
$repo = new UbicacionesRepository($db);
$service = new UbicacionesService();
$view = new CrearUbicacionView();
$controller = new CrearUbicacionController($service, $repo, $view);
$controller->run();
