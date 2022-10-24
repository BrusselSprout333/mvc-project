<?php
//тут должны быть данные
//application updates to reflect added item

class EmployeeModel extends model
{
    static function view($db): array
    {
        if(empty($_GET['sort_column'])) {
            $_GET['sort_column'] = 'first_name';
            $_GET['sort_method'] = 'asc';
        }
        $query = $db -> select($_GET['sort_column'], strtoupper($_GET['sort_method']));
        $arr = [];
        $query -> execute();
        while($row = $query->fetch(PDO::FETCH_OBJ)) {
            $arr[$row->id]['id'] = $row->id;
            $arr[$row->id]['first_name'] = $row->first_name;
            $arr[$row->id]['last_name'] = $row->last_name;
            $arr[$row->id]['date'] = $row -> date_of_birth;
            $arr[$row->id]['salary'] = $row -> salary;
        }
        return $arr;
    }

    static function add($db, $data):void
    {
        $query = $db -> insert();
        $query -> execute(['name' => $data['first-name-add'], 'surname' => $data['last_name'],
                         'date' => $data['day-of-birth'], 'salary' => $data['salary']]);
    }

    static function update($db, $data):void
    {
        $query = $db -> update();
        $query -> execute(['first_name' => $data['first-name-update'], 'last_name' => $data['last-name'],
                           'date' => $data['day-of-birth'], 'salary' => $data['salary'], 'id' => $data['id']]);
    }

    static function delete($db, $id):void
    {
        $query = $db -> delete();
        $query -> execute(['id' => $id]);
    }
}