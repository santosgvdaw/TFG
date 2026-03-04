<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\VentasController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\VentasRepository;
use App\Views\VentasView;

$config = new Config();
$db = new Database($config);
$repo = new VentasRepository($db);
$view = new VentasView();
$controller = new VentasController($repo, $view);
$controller->run();
