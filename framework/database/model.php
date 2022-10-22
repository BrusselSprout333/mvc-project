<?php

abstract class model
{
    public int $db;
    abstract  function view($connect);
    abstract protected function add();
    abstract protected function update();
    abstract protected function delete();
}