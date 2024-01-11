<?php

namespace app\controllers;

use app\core\BaseController;
use app\core\Request;
use app\models\User;

class AuthController extends BaseController
{
    public function login()
    {
        $this->layout = 'auth';
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                return 'success';
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }
}