<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\BorrarUbicacionController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\UbicacionesRepository;

$config = new Config();
$db = new Database($config);
$repo = new UbicacionesRepository($db);
$controller = new BorrarUbicacionController($repo);
$controller->run();
