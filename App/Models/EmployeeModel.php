<?php
//тут должны быть данные
//application updates to reflect added item

class EmployeeModel extends model
{
    static function view($db): array
    {
        $sorts1 = ['first_name', 'last_name', 'date-of-birth', 'salary'];
        $sorts2 = ['asc', 'desc'];
        if(empty($_GET['sort_column']) || !in_array($_GET['sort_column'], $sorts1) || !in_array($_GET['sort_method'], $sorts2)) {
            $_GET['sort_column'] = 'first_name';
            $_GET['sort_method'] = 'asc';
        }
        print_r($_GET);
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
        settype($data['salary'], 'int');
        $query = $db -> insert();
        $query -> execute(['name' => $data['first-name-add'], 'surname' => $data['last_name'],
                         'date' => $data['day-of-birth'], 'salary' => $data['salary']]);
    }

    static function update($db, $data):void
    {
        /*var_dump($data);
        foreach ($data as &$item) {
            $item = htmlspecialchars(trim($item));
            $db->pdo->quote($item);
        }*/
        settype($data['salary'], 'int');
        $query = $db -> update();
        $query -> execute(['first_name' => $data['first-name-update'], 'last_name' => $data['last-name'],
                           'date' => $data['day-of-birth'], 'salary' => $data['salary'], 'id' => $data['id']]);
    }

    static function delete($db, $id):void
    {
        $query = $db -> delete();
        $query -> execute(['id' => $id]);
        $_GET['method'] = '';
    }
}