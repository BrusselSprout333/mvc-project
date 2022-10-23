<?php

$controller = new EmployeeController();

if($_GET['method'] == 'add')
    $controller -> add();

if(!empty($_POST['first-name-add']))
    $controller->add_DB(model::$db, $_POST);

if($_GET['method'] == 'delete')
    $controller -> delete(model::$db, $_GET['id']);

if($_GET['method'] == 'update')
    $controller -> update($_GET['id'],$_GET['first_name'],
        $_GET['last_name'],$_GET['date'],$_GET['salary']);

if(!empty($_POST['first-name-update'])) {
    $controller->update_DB(model::$db, $_POST);
}

$controller -> view(model::$db);
