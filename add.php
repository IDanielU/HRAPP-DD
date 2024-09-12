<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department_id = $_POST['department_id'];
    $date_of_joining = $_POST['date_of_joining'];

    $stmt = $conn->prepare("INSERT INTO employees (name, email, phone, department_id, date_of_joining) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $name, $email, $phone, $department_id, $date_of_joining);

    if ($stmt->execute()) {
        echo "Employee added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
