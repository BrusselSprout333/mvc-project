<?php

class EmployeeModel extends MainModel
{
    function create()
    {
        $this->db->query(
            'CREATE TABLE IF NOT EXISTS `employees` (
            `id` int(8) NOT NULL,
            `first_name` varchar(30) NOT NULL,
            `last_name` varchar(30) NOT NULL,
            `date_of_birth` date NOT NULL,
            `salary` float UNSIGNED DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

            ALTER TABLE `employees`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `employees` CHANGE `id` 
            `id` INT(8) NOT NULL AUTO_INCREMENT;');
    }

    function view($sorts): array
    {
        $query = $this->db->prepare('SELECT * FROM `employees` ORDER BY `'
            . $sorts['sort_column'] . '` ' . $sorts['sort_method']);
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

    function add($data): void
    {
        settype($data['salary'], 'float');
        $query = $this->db->prepare(
            "INSERT INTO `employees` (`first_name`, `last_name`, `date_of_birth`, `salary`) 
                    VALUES (:name, :surname, :date, :salary)");
        $this->db->execute($query, [
            'name' => $data['first-name-add'],
            'surname' => $data['last_name'],
            'date' => $data['day-of-birth'],
            'salary' => $data['salary']
        ]);
    }

    function update($data): void
    {
        settype($data['salary'], 'float');
        $query = $this->db->prepare(
            "UPDATE `employees` SET `first_name` = :first_name, `last_name` = :last_name,
                       `date_of_birth` = :date, `salary` = :salary WHERE `employees`.`id` = :id");
        $this->db->execute($query, [
            'first_name' => $data['first-name-update'],
            'last_name'  => $data['last-name'],
            'date'       => $data['day-of-birth'],
            'salary'     => $data['salary'],
            'id'         => $data['id']
        ]);
    }

    function delete($id): void
    {
        $query = $this->db->prepare("DELETE FROM `employees` WHERE `id` = :id");
        $this->db->execute($query, ['id' => $id]);
        $_GET['method'] = '';
    }
}