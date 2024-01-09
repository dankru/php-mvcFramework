<?php
use app\core\Application;
use app\controllers\Controller;
use app\controllers\AuthController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$ROOT_DIR = dirname(dirname(__DIR__));

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application($ROOT_DIR, $config);

$app->router->get('/', [Controller::class, "home"]);
$app->router->post('/', [Controller::class, "handleHome"]);

$app->router->get('/login', [AuthController::class, "login"]);
$app->router->get('/register', [AuthController::class, "register"]);
$app->router->post('/login', [AuthController::class, "login"]);
$app->router->post('/register', [AuthController::class, "register"]);

$app->run();
