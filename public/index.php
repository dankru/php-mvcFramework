<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\Controller;
use app\controllers\AuthController;


$ROOT_DIR = dirname(__DIR__);

$app = new Application($ROOT_DIR);

$app->router->get('/', [Controller::class, "home"]);
$app->router->post('/', [Controller::class, "handleHome"]);

$app->router->get('/login', [AuthController::class, "login"]);
$app->router->get('/register', [AuthController::class, "register"]);
$app->router->post('/login', [AuthController::class, "login"]);
$app->router->post('/register', [AuthController::class, "register"]);

$app->run();
