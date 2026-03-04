<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ActualizarUbicacionController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\UbicacionesRepository;
use App\Services\UbicacionesService;
use App\Views\ActualizarUbicacionView;

$config = new Config();
$db = new Database($config);
$repo = new UbicacionesRepository($db);
$service = new UbicacionesService();
$view = new ActualizarUbicacionView();
$controller = new ActualizarUbicacionController($service, $repo, $view);
$controller->run();
