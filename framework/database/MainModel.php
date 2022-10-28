<?php

abstract class MainModel
{
    protected Database $db;

    function __construct() {
        $this->db = new Database();
    }

    abstract function view($sorts);

    abstract function add($data);

    abstract function update($data);

    abstract function delete($id);
}