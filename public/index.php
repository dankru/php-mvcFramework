<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\Controller;

$ROOT_DIR = dirname(__DIR__);

$app = new Application($ROOT_DIR);

$app->router->get('/', [Controller::class, "home"]);
$app->router->post('/', [Controller::class, "homePost"]);

$app->run();
