<?php

namespace app\controllers;

use app\core\BaseController;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends BaseController
{
    public function login()
    {
        $this->layout = 'auth';
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'success';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}