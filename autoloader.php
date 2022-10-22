<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

spl_autoload_register(function ($class_name) {
    include 'framework/database/'.$class_name . '.php';
});


/*
 * spl_autoload_register(function($class) {
		preg_match('#(.+)\\\\(.+?)$#', $class, $match);
	$nameSpace = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($match[1]));
		$className = $match[2];

		$path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $nameSpace . DIRECTORY_SEPARATOR . $className . '.php';

 */