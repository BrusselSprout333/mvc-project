<?php

class EmployeeModel extends MainModel
{
    function view(string $sort_column, string $sort_method): array
    {
        $query = $this->db->prepare('SELECT * FROM `employees` ORDER BY `'
            . $sort_column . '` ' . $sort_method);
        $arr = [];
        $this->db->execute($query);
        while ($row = $this->db->fetch($query)) {
            $arr[$row->id]['id'] = $row->id;
            $arr[$row->id]['first_name'] = $row->first_name;
            $arr[$row->id]['last_name'] = $row->last_name;
            $arr[$row->id]['date'] = $row->date_of_birth;
            $arr[$row->id]['salary'] = $row->salary;
        }
        return $arr;
    }

    function add(
        string $first_name,
        string $last_name,
        string $birth_date,
        float $salary
    ): void {
        $query = $this->db->prepare(
            "INSERT INTO `employees` (`first_name`, `last_name`, `date_of_birth`, `salary`) 
                    VALUES (:name, :surname, :date, :salary)");
        $this->db->execute($query, [
            'name'    => $first_name,
            'surname' => $last_name,
            'date'    => $birth_date,
            'salary'  => $salary
        ]);
    }

    function update(
        string $first_name,
        string $last_name,
        string $birth_date,
        float $salary,
        int $id
    ): void {
        $query = $this->db->prepare(
            "UPDATE `employees` SET `first_name` = :first_name, `last_name` = :last_name,
                       `date_of_birth` = :date, `salary` = :salary WHERE `employees`.`id` = :id");
        $this->db->execute($query, [
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'date'       => $birth_date,
            'salary'     => $salary,
            'id'         => $id
        ]);
    }

    function delete(int $id): void
    {
        $query = $this->db->prepare("DELETE FROM `employees` WHERE `id` = :id");
        $this->db->execute($query, ['id' => $id]);
        $_GET['method'] = '';
    }
}