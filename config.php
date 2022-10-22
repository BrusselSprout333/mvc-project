<?php
//параметры подключения к бд
class config
{
    public $pdo;
    public $dsn;
    public function connect()
    {
        $this->dsn = 'mysql:host=localhost; dbname=justPHP';
        $this->pdo = new PDO($this->dsn, 'root', 'root');
    }
}
