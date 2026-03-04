<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CrearCategoriaController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\CategoriasRepository;
use App\Services\CategoriasService;
use App\Views\CrearCategoriaView;

$config = new Config();
$db = new Database($config);
$repo = new CategoriasRepository($db);
$service = new CategoriasService();
$view = new CrearCategoriaView();
$controller = new CrearCategoriaController($service, $repo, $view);
$controller->run();
