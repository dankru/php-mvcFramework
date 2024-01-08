<?php

namespace app\models;

use app\core\BaseModel;

class RegisterModel extends BaseModel
{
    public string $firstName;
    public string $lastName;
    public string $login;
    public string $password;
    public string $password_confirm;

    public function register() {
        echo "creating new user";
    }

    public function rules(): array
    {
        return [

        ];
    }
}