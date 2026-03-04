<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\EjemplaresController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\CategoriasRepository;
use App\Repositories\EjemplaresRepository;
use App\Repositories\UbicacionesRepository;
use App\Views\EjemplaresView;

$config = new Config();
$db = new Database($config);
$repo = new EjemplaresRepository($db);
$repoUbicaciones = new UbicacionesRepository($db);
$repoCategorias = new CategoriasRepository($db);
$view = new EjemplaresView();
$controller = new EjemplaresController($repo, $repoUbicaciones, $repoCategorias, $view);
$controller->run();
