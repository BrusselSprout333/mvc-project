<?php
//namespace Main;
error_reporting(E_ALL);
require 'autoloader.php';

//связь с бд
model::$db = new database();
model::$db -> connect(config::$dsn, config::$user, config::$pass);

$controller = new EmployeeController();

if($_GET['method'] == 'add')
    $controller -> add();

if(!empty($_POST['first-name-add']))
    $controller->add_DB(model::$db->pdo, $_POST);

if($_GET['method'] == 'delete')
    $controller -> delete(model::$db->pdo, $_GET['id']);

if($_GET['method'] == 'update')
    $controller -> update($_GET['id'],$_GET['first_name'],
        $_GET['last_name'],$_GET['date'],$_GET['salary']);

if(!empty($_POST['first-name-update'])) {
    $controller->update_DB(model::$db->pdo, $_POST);
}

$controller -> view(model::$db->pdo);


/*
от sql
<?php
$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
$stmt->execute([$_GET['name']]);
foreach ($stmt as $row) {
  print_r($row);
}
 */