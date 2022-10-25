<?php

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

    static function createToken($length = 15): string
    {
        $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    static function CheckToken()
    {
        if ($_POST) {
            if ($_POST['csrf'] !== $_SESSION['csrf'])  { //не совершать действие
                $_POST = [];
                header('Location: index.php?message=Токены не совпадают. Ваши данные отклонены.');
            }
        } else {
            $_SESSION['csrf'] = self::createToken();
        }
    }
}