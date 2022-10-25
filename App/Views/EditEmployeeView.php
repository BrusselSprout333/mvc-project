<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
<h1>Edit Employee</h1>
<form action="index.php" method="POST">
    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label for="first-name">First Name</label>
        <input type="text" name="first-name-update" value="<?= $first_name ?>"><br>
    <label for="last-name">Last Name</label>
        <input type="text" name="last-name" value="<?= $last_name ?>"><br>
    <label for="day-of-birth">Day of Birth</label>
        <input type="text" name="day-of-birth" value="<?= $date ?>"><br>
    <label for="salary">Salary</label>
        <input type="text" name="salary" value="<?= $salary ?>"><br>

    <button type="submit">Save</button>
</form>
<a href="index.php">
    <button>Cancel</button>
</a>
</body>
</html>