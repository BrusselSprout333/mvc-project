<?php

class EmployeeController
{
    private ViewClass $view;
    private EmployeeModel $model;
    private array $sorts;

    function __construct()
    {
        $this->model = new EmployeeModel();
        $this->view = new ViewClass('App/Views');
    }

    function SecurityTest()
    {
        $sessionToken = $_SESSION['csrf'] ?? '';
        $requestToken = $_POST['csrf'] ?? '';

        if (empty($sessionToken) && !empty($requestToken)) {
            throw new Exception("Session token wasn't created. Unable to complete request.");
        }
        if (!empty($requestToken)) {
            $_SESSION['csrf'] = SecurityHelper::sessionToken($sessionToken,
                $requestToken);
        }
    }

    public function view()
    {
        $data = $this->model->view($this->sorts['sort_column'],
            $this->sorts['sort_method']);
        $this->view->render('ViewTemplateStart');
        $this->view->render('ListEmployeeView', $data);
        $this->view->render('ViewTemplateEnd');
    }

    public function add()
    {
        $this->view->render('AddEmployeeView');
    }

    public function add_DB($data)
    {
        $this->model->add($data['first-name-add'], $data['last-name'],
            $data['day-of-birth'], $data['salary']);
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
        $this->model->update($data['first-name-update'], $data['last-name'],
            $data['day-of-birth'], $data['salary'], $data['id']);
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
        } else {
            $this->sorts['sort_method'] = strtoupper($sorts['sort_method']);
            $this->sorts['sort_column'] = $sorts['sort_column'];
        }
    }
}