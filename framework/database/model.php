<?php

abstract class model
{
    static object $db;

    abstract static function view($db);

    abstract static function add($db, $data);

    abstract static function update($db, $data);

    abstract static function delete($db, $id);
}