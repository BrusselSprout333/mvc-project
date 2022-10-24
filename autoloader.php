<?php
spl_autoload_register(function ($class) {
    preg_match('#(.+)\\\\(.+?)$#', $class, $match);
    $found = search_file(__DIR__, $class . '.php');

    if (file_exists($found[0])) {
        require $found[0];
    } else {
        echo "something went wrong";
    }
});


function search_file($folderName, $fileName)
{
    $found = array();
    $folderName = rtrim($folderName, '/');
    $dir = opendir($folderName); // открываем текущую папку

    // перебираем папку, пока есть файлы
    while (($file = readdir($dir)) !== false) {
        $file_path = "$folderName/$file";

        if ($file == '.' || $file == '..') {
            continue;
        }

        // echo $file." | ".$fileName."<br>";
        // это файл проверяем имя
        if (is_file($file_path)) {
            // если имя файла искомое, то вернем путь до него
            if (false !== strpos($file, $fileName)) {
                $found[] = $file_path;
            }
        } // это папка, то рекурсивно вызываем search_file
        elseif (is_dir($file_path)) {
            $res = search_file($file_path, $fileName);
            $found = array_merge($found, $res);
        }
    }
    closedir($dir); // закрываем папку
    return $found;
}
