<?php
//просто запросы к бд

class Connection
{
    public static function get(): PDO
    {
        return new PDO(Config::DSN, Config::USER, Config::PASS);
    }
}

class Database
{
    private PDO $pdo;
    private static ?Database $instance = null;

    private function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function getInstance(): ?Database
    {
        if (self::$instance == null) {
            self::$instance = new Database(Connection::get());
        }
        return self::$instance;
    }

    public function prepare($string)
    {
        return $this->pdo->prepare($string);
    }

    public function execute($query, $params = [])
    {
        $query->execute($params);
    }

    public function fetch($query)
    {
        return $query->fetch(PDO::FETCH_OBJ);
    }
}