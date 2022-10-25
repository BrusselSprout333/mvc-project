<?php

error_reporting(E_ALL);
require 'autoloader.php';

//связь с бд
model::$db = new database();
model::$db->connect(config::$dsn, config::$user, config::$pass);
echo $_GET['message'];

require "App/Controllers/MainController.php";

