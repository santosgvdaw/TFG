<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\RegisterController;
use App\Models\Config;
use App\Models\Database;
use App\Repositories\RegisterRepository;
use App\Services\RegisterService;
use App\Views\RegisterView;

$config = new Config('USUARIOS');
$db = new Database($config);
$repo = new RegisterRepository($db);
$service = new RegisterService();
$view = new RegisterView();
$controller = new RegisterController($service, $repo, $view);
$controller->run();
