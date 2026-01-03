<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\BorrarUsuarioController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\UsuariosRepository;

$config = new Config();
$db = new Database($config);
$repo = new UsuariosRepository($db);
$controller = new BorrarUsuarioController($repo);
$controller->run();
