<?php
//основные методы
//namespace App\Controllers;
//присылаем данные для изменения - > манипулирует моделью

class EmployeeController
{
    public function view($connect)
    {
        $data = EmployeeModel::view($connect); //получили данные
        //print_r($data);
        $view = new ViewClass('App/Views'); //создаем представление
        $view->render('ViewTemplateStart');
        $view->render('ListEmployeeView', $data);
        $view->render('ViewTemplateEnd');
    }

    protected function add()
    {
        // TODO: Implement add() method.
    }

    protected function update()
    {
        // TODO: Implement update() method.
    }

    protected function delete()
    {
        // TODO: Implement delete() method.
    }
}