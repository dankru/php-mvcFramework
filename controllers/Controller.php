<?php

namespace app\controllers;

use app\core\Application;

class Controller
{
    public function home() {
        $params =[
            "name" => "Danila"
        ];
        return Application::$app->router->renderView("home", $params);
    }
    public function homePost() {

        return "handling post";
    }
}