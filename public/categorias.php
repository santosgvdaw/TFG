<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CategoriasController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\CategoriasRepository;
use App\Views\CategoriasView;

$config = new Config();
$db = new Database($config);
$repo = new CategoriasRepository($db);
$view = new CategoriasView();
$controller = new CategoriasController($repo, $view);
$controller->run();
