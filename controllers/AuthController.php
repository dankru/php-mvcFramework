<?php

namespace app\controllers;

use app\core\BaseController;
use app\core\Request;

class AuthController extends BaseController
{
    public function login() {
        $this->layout = 'auth';
        return $this->render('login');
    }

    public function register(Request $request) {
        if ($request->isPost()) {
            return "handling post";
        }
        return $this->render('register');
    }
}