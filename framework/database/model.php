<?php

abstract class model
{
    static $db;
    abstract static function view($connect);
    abstract static function add($connect, $data);
    abstract static function update($connect, $data);
    abstract static function delete($connect, $id);
}