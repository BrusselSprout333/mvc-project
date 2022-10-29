<?php

class EmployeeController
{
    private ViewClass $view;
    private EmployeeModel $model;
    private array $sorts;
    private array $security_data;

    function __construct()
    {
        $this->model = new EmployeeModel();
        $this->view = new ViewClass('App/Views');
    }

    function SecurityTest()
    {
        session_start();
        $this->security_data['post'] = &$_POST;
        $this->security_data['session'] = &$_SESSION;
        $this->security_data = SecurityHelper::CheckToken($this->security_data);
    }

    public function view()
    {
        $message[0]['message'] = $this->security_data['message'];
        $data = $this->model->view($this->sorts); //получили данные
        $this->view->render('ViewTemplateStart', $message);
        $this->view->render('ListEmployeeView', $data);
        $this->view->render('ViewTemplateEnd');
    }

    public function add()
    {
        $this->view->render('AddEmployeeView');
    }

    public function add_DB($data)
    {
        $this->model->add($data);
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

    public function update_DB($data)
    {
        $this->model->update($data); //получили данные
    }

    public function delete($id)
    {
        $this->model->delete($id);
    }

    public function validateSort($sorts)
    {
        $sorts1 = ['first_name', 'last_name', 'date_of_birth', 'salary'];
        $sorts2 = ['asc', 'desc'];
        if (!in_array($sorts['sort_column'], $sorts1)
            || !in_array($sorts['sort_method'], $sorts2)
        ) {
            $this->sorts['sort_column'] = 'first_name';
            $this->sorts['sort_method'] = 'asc';
        }
        else
        {
            $this->sorts['sort_method'] = strtoupper($sorts['sort_method']);
            $this->sorts['sort_column'] = $sorts['sort_column'];
        }
    }

    public function createTable()
    {
        $this->model->create();
    }
}