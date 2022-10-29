<?php
//просто запросы к бд

class Database
{
    static PDO $pdo;
    private Connection $connect;

    function __construct()
    {
        $this->connect = Connection::getInstance();
    }

    public function prepare($string)
    {
        return self::$pdo->prepare($string);
    }

    public function query($string)
    {
        self::$pdo->query($string);
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