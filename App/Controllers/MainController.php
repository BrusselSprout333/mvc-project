<?php

$controller = new EmployeeController();
Database::getInstance();

session_start();
$data['session']['csrf'] = $_SESSION['csrf'];
$data['post']['csrf'] = $_POST['csrf'];

try {
    $controller->SecurityTest($data); //от csrf атак
} catch (Exception $message) {
    echo "You have a problem: " . $message;
    $_POST = [];
}

foreach ($_GET as &$item) {
    $item = filter_var(trim($item), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

foreach ($_POST as &$item) {
    $item = filter_var(trim($item), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

$controller->validateSort($_GET);

if ($_GET['method'] == 'add') {
    $controller->add();
}

if (!empty($_POST['first-name-add'])) {
    $controller->add_DB($_POST);
}

if ($_GET['method'] == 'delete') {
    $controller->delete($_GET['id']);
}

if ($_GET['method'] == 'update') {
    $controller->update($_GET['id'], $_GET['first_name'],
        $_GET['last_name'], $_GET['date'], $_GET['salary']);
}

if (!empty($_POST['first-name-update'])) {
    $controller->update_DB($_POST);
}

if (empty($_GET['method'])) {
    $controller->view();
}
