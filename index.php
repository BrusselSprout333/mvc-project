<?php
error_reporting(E_ALL);
require 'autoloader.php';
$connect = new config();
$connect->connect();

$db = new database();
$db->view($connect);

/*
$query = $pdo->query('SELECT * FROM `employees` ORDER BY `id`');
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
    echo '<tr>
             <td>'.$row->first_name.'</td>
             <td>'.$row->last_name.'</td>
             <td>'.$row->date_of_birth.'</td>
             <td>'.$row->salary .'</td>
             <td>Edit</td>
             <td>Delete</td>
          </tr>';
}
echo '</table>';

echo "+ Add New";
/*
include "framework/database/database.php";
database::view();

/*
 spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj  = new MyClass1();
$obj2 = new MyClass2();



от sql
<?php
$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
$stmt->execute([$_GET['name']]);
foreach ($stmt as $row) {
  print_r($row);
}
 */