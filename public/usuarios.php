<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UsuariosController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\UsuariosRepository;
use App\Views\UsuarioView;

$config = new Config('USUARIOS');
$db = new Database($config);
$repo = new UsuariosRepository($db);
$view = new UsuarioView();
$controller = new UsuariosController($repo, $view);
$controller->run();
