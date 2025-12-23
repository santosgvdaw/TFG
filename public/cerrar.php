<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CerrarController;

$controller = new CerrarController($service, $repo, $view);
$controller->run();
