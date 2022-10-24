<?php
//присылаем данные для изменения - > манипулирует моделью

class EmployeeController
{
    private ViewClass $view;

    function __construct()
    {
        $this->view = new ViewClass('App/Views');
    }

    public function view($db)
    {
        $data = EmployeeModel::view($db); //получили данные
        $this->view->render('ViewTemplateStart');
        $this->view->render('ListEmployeeView', $data);
        $this->view->render('ViewTemplateEnd');
    }

    public function add()
    {
        $this->view->render('AddEmployeeView');
    }

    public function add_DB($db, $data)
    {
        EmployeeModel::add($db, $data); //получили данные
    }

    public function update($id, $first_name, $last_name, $date, $salary)
    {
        $data[0] = [
            'id'         => $id,
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'date'       => $date,
            'salary'     => $salary
        ];
        $this->view->render('EditEmployeeView', $data);
    }

    public function update_DB($db, $data)
    {
        EmployeeModel::update($db, $data); //получили данные
    }

    public function delete($db, $id)
    {
        EmployeeModel::delete($db, $id); //получили данные
    }
}