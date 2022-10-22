<?php

abstract class model
{
    static $db;
    abstract function view($connect);
    abstract function add();
    abstract function update();
    abstract function delete();
}