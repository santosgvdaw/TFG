<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\BorrarVentaController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\VentasRepository;

$config = new Config();
$db = new Database($config);
$repo = new VentasRepository($db);
$controller = new BorrarVentaController($repo);
$controller->run();
