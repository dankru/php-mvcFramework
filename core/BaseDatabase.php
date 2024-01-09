<?php

namespace app\core;

class BaseDatabase
{
    public \PDO $pdo;

    public function __construct(array $config)
    {
        // dsn - domain service name
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}