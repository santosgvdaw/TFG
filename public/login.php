<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\LoginController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\LoginRepository;
use App\Services\LoginService;
use App\Views\LoginView;

$config = new Config('USUARIOS');
$db = new Database($config);
$repo = new LoginRepository($db);
$service = new LoginService();
$view = new LoginView();
$controller = new LoginController($service, $repo, $view);
$controller->run();
