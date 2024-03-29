<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DBModel;

class User extends DBModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;


    public string $firstName = '';
    public string $lastName = '';
    public string $login = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $password_confirm = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function register()
    {
        return $this->save();
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'login' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 32]],
            'password_confirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['firstName', 'lastName', 'email', 'password', 'status'];
    }

    public function labels(): array
    {
        return [
            'firstName' => 'First name',
            'lastName' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirm' => 'Confirm password'
        ];
    }
}