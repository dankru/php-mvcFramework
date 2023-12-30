<?php

namespace app\core;

class BaseController
{
    public function render($view, $params = []) {
        return Application::$app->router->renderView($view, $params);
    }

}