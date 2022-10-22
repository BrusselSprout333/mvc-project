<?php
//namespace Main;
error_reporting(E_ALL);

require "config.php";
require "framework/database/database.php";
require "framework/database/model.php";

model::$db = new database();
model::$db -> connect(config::$dsn, config::$user, config::$pass);
//получили объект pdo
var_dump(model::$db->pdo);
//$pdo =& model::$db->pdo;

$query = model::$db->pdo->query('SELECT * FROM `employees` ORDER BY `id`');
while($row = $query->fetch(PDO::FETCH_OBJ))
{
    ?>
    <p><?=$row->first_name ?></p>
    <?php
}

require 'autoloader.php';

$list = new EmployeeController();
echo 2;

$list->view(model::$db->pdo);

/*

require "config.php";

$connect = new config();
$connect->connect();
var_dump($connect);
/*
require 'autoloader.php';

$db = new EmployeeController();
$db->view($connect);






/*
от sql
<?php
$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
$stmt->execute([$_GET['name']]);
foreach ($stmt as $row) {
  print_r($row);
}
 */