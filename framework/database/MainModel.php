<?php

abstract class MainModel
{
    protected Database $db;

    function __construct()
    {
        $this->db = new Database();
    }

    abstract function view(string $sort_column, string $sort_method): array;

    abstract function add(
        string $first_name,
        string $last_name,
        string $birth_date,
        float $salary
    ): void;

    abstract function update(
        string $first_name,
        string $last_name,
        string $birth_date,
        float $salary,
        int $id
    ): void;

    abstract function delete(int $id): void;
}