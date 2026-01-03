<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ActualizarUsuarioController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\UsuariosRepository;
use App\Services\UsuariosService;
use App\Views\ActualizarUsuarioView;

$config = new Config();
$db = new Database($config);
$repo = new UsuariosRepository($db);
$service = new UsuariosService();
$view = new ActualizarUsuarioView();
$controller = new ActualizarUsuarioController($service, $repo, $view);
$controller->run();
