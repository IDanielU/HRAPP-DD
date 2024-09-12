<?php
session_start();
require 'config.php';

// if (!isset($_SESSION['user'])) {
//     header('Location: login.php');
//     exit();
// }

// Fetch employees
$employees = $conn->query("SELECT id, first_name FROM employees WHERE status = 'active'");

// Process payroll submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $basic_salary = $_POST['basic_salary'];
    $allowances = $_POST['allowances'];
    $deductions = $_POST['deductions'];
    $net_salary = $basic_salary + $allowances - $deductions;
    $month = $_POST['month'];

    $stmt = $conn->prepare("INSERT INTO payroll (employee_id, basic_salary, allowances, deductions, net_salary, month) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("idddds", $employee_id, $basic_salary, $allowances, $deductions, $net_salary, $month);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Payroll processed successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payroll Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Payroll Management</h2>
        <form method="POST" action="payroll.php">
            <div class="form-group">
                <label>Employee:</label>
                <select name="employee_id" class="form-control" required>
                    <?php while ($row = $employees->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['first_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Basic Salary:</label>
                <input type="number" step="0.01" name="basic_salary" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Allowances:</label>
                <input type="number" step="0.01" name="allowances" class="form-control">
            </div>
            <div class="form-group">
                <label>Deductions:</label>
                <input type="number" step="0.01" name="deductions" class="form-control">
            </div>
            <div class="form-group">
                <label>Month:</label>
                <input type="month" name="month" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Process Payroll</button>
        </form>
    </div>
</body>
</html>

if ($stmt->execute()) {
    $last_id = $conn->insert_id;
    echo "<div class='alert alert-success'>Payroll processed successfully! <a href='payslip.php?id=$last_id' target='_blank'>View Payslip</a></div>";
} else {
    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
}
