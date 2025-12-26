<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UbicacionesController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\UbicacionesRepository;
use App\Views\UbicacionesView;

$config = new Config();
$db = new Database($config);
$repo = new UbicacionesRepository($db);
$view = new UbicacionesView();
$controller = new UbicacionesController($repo, $view);
$controller->run();
