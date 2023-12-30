<?php

namespace app\core;

class BaseController
{
    public string $layout = 'main';
    public function render($view, $params = []) {
        return Application::$app->router->renderView($view, $params);
    }

}