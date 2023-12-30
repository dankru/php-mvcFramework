<?php

namespace app\core;
use app\controllers\Controller;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public BaseController $controller;

    public function getController(): BaseController
    {
        return $this->controller;
    }

    public function setController(BaseController $controller): void
    {
        $this->controller = $controller;
    }

    public function __construct($ROOT_DIR)
    {
        self::$ROOT_DIR = $ROOT_DIR;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }
}