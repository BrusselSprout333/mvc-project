<?php
//вывод основной страницы
//получаем инфу из модели - массив данных - и перебираем + выводим
?>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date Of Birth</th>
        <th>Salary</th>
    </tr>
    <tr>
        <td>$row->first_name</td>
        <td>$row->last_name</td>
        <td>$row->date_of_birth</td>
        <td>$row->salary</td>
        <td><button>Edit</button></td>
        <td><button>Delete</button></td>
    </tr>
</table>
<button>+ Add New</button>
