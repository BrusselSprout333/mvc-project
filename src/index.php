<?php

error_reporting(E_ALL);
session_start();
require 'autoloader.php';
echo "you did it! <br>";
/*
const DB_NAME = 'justPHP';
const DSN = 'mysql:host=mysql; dbname=' . DB_NAME;
const USER = 'root';
const PASS = 'root';
$conn = get();

$query = $conn->query('SELECT * FROM `employees`');
echo '<ul>';
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    ?>
    <li>
        <p><?= $row->id ?>
            <b> <?= $row->first_name ?></b><?= $row->last_name ?>
            <b><?= $row->date_of_birth ?></b> <?= $row->salary ?></p>
    </li>
    <?php
}

function get(): PDO
{
    return new PDO(DSN, USER, PASS);
}
*/
require "App/Controllers/MainController.php";
