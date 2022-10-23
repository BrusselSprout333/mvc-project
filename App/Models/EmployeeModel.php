<?php
//тут должны быть данные
//application updates to reflect added item
//include "../../framework/database/model.php";

class EmployeeModel extends model
{
    static function view($connect)
    {
        $arr = [];
        $query = $connect -> query('SELECT * FROM `employees` ORDER BY `id` ASC');
        while($row = $query->fetch(PDO::FETCH_OBJ)) {
            $arr[$row->id]['first_name'] = $row->first_name;
            $arr[$row->id]['last_name'] = $row->last_name;
            $arr[$row->id]['date'] = $row -> date_of_birth;
            $arr[$row->id]['salary'] = $row -> salary;
        }
        return $arr;
    }

    function add()
    {
        // TODO: Implement add() method.
    }

    function update()
    {
        // TODO: Implement update() method.
    }

    function delete()
    {
        // TODO: Implement delete() method.
    }
}