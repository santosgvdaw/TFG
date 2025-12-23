<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\BorrarEjemplarController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\EjemplaresRepository;

$config = new Config();
$db = new Database($config);
$repo = new EjemplaresRepository($db);
$controller = new BorrarEjemplarController($repo);
$controller->run();
