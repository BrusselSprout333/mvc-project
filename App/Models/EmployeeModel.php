<?php
//тут должны быть данные
//application updates to reflect added item

class EmployeeModel extends model
{
    static function view($connect)
    {
        $arr = [];
        $query = $connect -> query('SELECT * FROM `employees` ORDER BY `id` ASC');
        while($row = $query->fetch(PDO::FETCH_OBJ)) {
            $arr[$row->id]['id'] = $row->id;
            $arr[$row->id]['first_name'] = $row->first_name;
            $arr[$row->id]['last_name'] = $row->last_name;
            $arr[$row->id]['date'] = $row -> date_of_birth;
            $arr[$row->id]['salary'] = $row -> salary;
        }
        return $arr;
    }

    static function add($connect, $data):void
    {
        $query = $connect -> prepare("INSERT INTO `employees` (`id`, `first_name`, `last_name`, `date_of_birth`, `salary`)
                                    VALUES (NULL, :name, :surname, :date, :salary)");
        $query->execute(['name' => $data['first-name-add'], 'surname' => $data['last_name'],
                         'date' => $data['day-of-birth'], 'salary' => $data['salary']]);
    }

    static function update($connect, $data):void
    {
        $id = $data['id'];
        $first_name = $data['first-name-update'];
        $last_name = $data['last-name'];
        $date = $data['day-of-birth'];
        $salary = $data['salary'];
        $connect -> query("UPDATE `employees` SET `first_name` = '$first_name', `last_name` = '$last_name',
                           `date_of_birth` = '$date', `salary` = '$salary' WHERE `employees`.`id` = '$id'");
    }

    static function delete($connect, $id):void
    {
        $connect -> query("DELETE FROM `employees` WHERE `id` = '$id'");
    }
}