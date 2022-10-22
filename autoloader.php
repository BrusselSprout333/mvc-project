<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

spl_autoload_register(function ($class_name) {
    include 'framework/database/'.$class_name . '.php';
});
