<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta >
    <title>Add</title>
</head>
<body>
<h1>Add Employee</h1>
<form action="index.php" method="POST">
    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
    <label for="first-name-add">First Name</label>
        <input type="text" name="first-name-add"><br>
    <label for="last-name">Last Name</label>
        <input type="text" name="last_name"><br>
    <label for="day-of-birth">Day of Birth</label>
        <input type="text" name="day-of-birth"><br>
    <label for="salary">Salary</label>
        <input type="text" name="salary"><br>

    <button type="submit">Save</button>
</form>
<a href="index.php">
    <button>Cancel</button>
</a>
</body>
</html>
