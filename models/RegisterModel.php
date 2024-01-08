<?php

namespace app\models;

use app\core\BaseModel;

class RegisterModel extends BaseModel
{
    public string $firstName ='';
    public string $lastName ='';
    public string $login='';
    public string $email='';
    public string $password='';
    public string $password_confirm='';

    public function register()
    {
        echo "creating new user";
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'login' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 32]],
            'password_confirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}