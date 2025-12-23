<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\EjemplaresController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\EjemplaresRepository;
use App\Views\EjemplaresView;

$config = new Config();
$db = new Database($config);
$repo = new EjemplaresRepository($db);
$view = new EjemplaresView();
$controller = new EjemplaresController($repo, $view);
$controller->run();
