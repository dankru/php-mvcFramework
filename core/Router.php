<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }
    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }
    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("not_found");
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }
        return call_user_func($callback, $this->request);
    }
    public function renderView($view, $params = []) {
        $layout = $this->getLayout($view);
        $content = $this->getContent($view, $params);
        return str_replace('{{content}}', $content, $layout);
    }

    protected function getLayout() {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function getContent($view, $params) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/views/{$view}.php";
        return ob_get_clean();
    }
}