<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    // Sample database connection (adjust credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dd_hr_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert employee data
    $sql = "INSERT INTO users (name, email, phone, position, department, salary)
            VALUES ('$name', '$email', '$phone', '$position', '$department', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "New employee registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
