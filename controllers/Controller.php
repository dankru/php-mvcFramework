<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\core\Request;

class Controller extends BaseController
{
    public function home() {
        $params =[
            "name" => "Danila"
        ];
        return $this->render('home', $params);
    }
    public function handleHome(Request $request) {
        $body = $request->getBody();
        var_dump($body);
        return "post";
    }
}