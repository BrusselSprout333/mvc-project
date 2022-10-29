<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
<p><?= $message ?></p>
<table>
    <tr>
        <th>First Name
            <a href="index.php?sort_column=first_name&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=first_name&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
        </th>
        <th>Last Name
            <a href="index.php?sort_column=last_name&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=last_name&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
        </th>
        <th>Date Of Birth
            <a href="index.php?sort_column=date_of_birth&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=date_of_birth&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
        </th>
        <th>Salary
            <a href="index.php?sort_column=salary&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=salary&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
        </th>
    </tr>
