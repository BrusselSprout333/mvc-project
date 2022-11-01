<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <style>
        .content {
            display: grid;
            grid-template-columns: 115px 110px 130px 70px 50px 30px;
        }

        span {
            margin: 5px 0 5px 5px;
        }
    </style>
</head>
<body>
<p><?= $message ?></p>
<div>
    <b>
    <span>First Name
            <a href="index.php?sort_column=first_name&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=first_name&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
    </span>
        <span>Last Name
            <a href="index.php?sort_column=last_name&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=last_name&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
        </span>
        <span>Date Of Birth
            <a href="index.php?sort_column=date_of_birth&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=date_of_birth&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
        </span>
        <span>Salary
            <a href="index.php?sort_column=salary&sort_method=asc"
               style="text-decoration: none">&#8595;</a>
            <a href="index.php?sort_column=salary&sort_method=desc"
               style="text-decoration: none">&#8593;</a>
        </span>
    </b>
</div>