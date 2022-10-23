<?php
//просто запросы к бд

class database
{
    public PDO $pdo;
    public function connect($dsn, $user, $pass)
    {
        $this->pdo = new PDO($dsn, $user, $pass);
    }
    public function select()
    {
        return $this -> pdo -> prepare('SELECT * FROM `employees` ORDER BY `first_name` ASC');
    }
    public function insert()
    {
        return $this -> pdo -> prepare(
            "INSERT INTO `employees` (`first_name`, `last_name`, `date_of_birth`, `salary`) 
                    VALUES (:name, :surname, :date, :salary)");
    }
    public function delete()
    {
        return $this -> pdo -> prepare("DELETE FROM `employees` WHERE `id` = :id");
    }
    public function update()
    {
        return $this -> pdo -> prepare(
            "UPDATE `employees` SET `first_name` = :first_name, `last_name` = :last_name,
                       `date_of_birth` = :date, `salary` = :salary WHERE `employees`.`id` = :id");
    }
}