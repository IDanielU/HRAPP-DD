<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Employee Registration Form</h2>

<form action="submission.php" method="POST">
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" required>

    <label for="position">Position:</label>
    <input type="text" id="position" name="position" required>

    <label for="department">Department:</label>
    <select id="department" name="department">
        <option value="HR">HR</option>
        <option value="Finance">Finance</option>
        <option value="IT">IT</option>
        <option value="Marketing">Marketing</option>
    </select>

    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" required>

    <input type="submit" value="Register Employee">
</form>

</body>
</html>
