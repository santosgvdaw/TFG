<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ActualizarCategoriaController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\CategoriasRepository;
use App\Services\CategoriasService;
use App\Views\ActualizarCategoriaView;

$config = new Config();
$db = new Database($config);
$repo = new CategoriasRepository($db);
$service = new CategoriasService();
$view = new ActualizarCategoriaView();
$controller = new ActualizarCategoriaController($service, $repo, $view);
$controller->run();
