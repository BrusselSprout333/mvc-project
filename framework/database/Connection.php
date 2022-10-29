<?php

class Connection
{
    private static array $instances = [];

    function __construct()
    {
        try {
            Database::$pdo = new PDO(Config::DSN, Config::USER, Config::PASS);
        } catch (PDOException $exc) {
            die("Could not connect to the database: " . $exc->getMessage());
        }
    }

    static function getInstance()
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}