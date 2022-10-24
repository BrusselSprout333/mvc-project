<?php
//<script>alert("You've been hacked! This is an XSS attack!")</script>
$controller = new EmployeeController();
foreach ($_GET as &$item) {
    $item = filter_var(trim($item), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

foreach ($_POST as &$item) {
    $item = filter_var(trim($item), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if ($_GET['method'] == 'add') {
    $controller->add();
}

if (!empty($_POST['first-name-add'])) {
    $controller->add_DB(model::$db, $_POST);
}

if ($_GET['method'] == 'delete') {
    $controller->delete(model::$db, $_GET['id']);
}

if ($_GET['method'] == 'update') {
    $controller->update($_GET['id'], $_GET['first_name'],
        $_GET['last_name'], $_GET['date'], $_GET['salary']);
}

if (!empty($_POST['first-name-update'])) {
    $controller->update_DB(model::$db, $_POST);
}

print_r($_GET['method']);
if (empty($_GET['method'])) {
    $controller->view(model::$db);
}
