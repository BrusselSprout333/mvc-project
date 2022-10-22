<?php
//просто запросы к бд

class database
{
    public PDO $pdo;
    public function connect($dsn, $user, $pass)
    {
        $this->pdo = new PDO($dsn, $user, $pass);
    }
}