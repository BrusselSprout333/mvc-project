<?php
//основные методы
//namespace App\Controllers;
//присылаем данные для изменения - > манипулирует моделью

class EmployeeController
{
    private $view;
    function __construct()
    {
        $this -> view = new ViewClass('App/Views');
    }

    public function view($connect)
    {
        $data = EmployeeModel::view($connect); //получили данные
        $this -> view -> render('ViewTemplateStart');
        $this -> view -> render('ListEmployeeView', $data);
        $this -> view -> render('ViewTemplateEnd');
    }

    public function add()
    {
        $this -> view -> render('AddEmployeeView');
    }

    public function add_DB($connect, $data)
    {
        EmployeeModel::add($connect, $data); //получили данные
    }

    public function update($id, $first_name, $last_name, $date, $salary)
    {
        $data[0] = ['id' => $id, 'first_name' => $first_name, 'last_name' => $last_name,
                'date' => $date, 'salary' => $salary];
        $this -> view -> render('EditEmployeeView', $data);
    }

    public function update_DB($connect, $data)
    {
        EmployeeModel::update($connect, $data); //получили данные
    }

    public function delete($connect, $id)
    {
        EmployeeModel::delete($connect, $id); //получили данные
    }
}