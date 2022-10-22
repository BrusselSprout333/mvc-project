<?php

class EmployeeController
{
    public function view($connect)
    {
        $query = $connect->pdo->query('SELECT * FROM `employees` ORDER BY `id`');

        echo '<table>';
        while($row = $query->fetch(PDO::FETCH_OBJ))
        {
            ?>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date Of Birth</th>
                <th>Salary</th>
            </tr>
            <?php
            echo
                '<tr>
                  <td>'.$row->first_name.'</td>
                  <td>'.$row->last_name.'</td>
                  <td>'.$row->date_of_birth.'</td>
                  <td>'.$row->salary .'</td>
                  <td><a href="delete.php?id='.$row->id.'"><button>Edit</button></a></td>
                  <td><a href="delete.php?id='.$row->id.'"><button>Delete</button></a></td>
               </tr>';
        }
        echo '</table>';
    }

    protected function add()
    {
        // TODO: Implement add() method.
    }

    protected function update()
    {
        // TODO: Implement update() method.
    }

    protected function delete()
    {
        // TODO: Implement delete() method.
    }
}