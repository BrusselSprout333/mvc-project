<?php
//namespace Main;
error_reporting(E_ALL);
require 'autoloader.php';

//связь с бд
model::$db = new database();
model::$db -> connect(config::$dsn, config::$user, config::$pass);


//в views
$list = new EmployeeController();
$list -> view(model::$db->pdo);



/*
$arr = new EmployeeModel();
print_r($arr -> view(model::$db->pdo));


/*
от sql
<?php
$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
$stmt->execute([$_GET['name']]);
foreach ($stmt as $row) {
  print_r($row);
}
 */