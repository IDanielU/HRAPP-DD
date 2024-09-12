<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['id'])) {
    echo "Invalid Request";
    exit();
}

$payroll_id = $_GET['id'];
$stmt = $conn->prepare("SELECT p.*, e.name, e.email FROM payroll p JOIN employees e ON p.employee_id = e.id WHERE p.id = ?");
$stmt->bind_param("i", $payroll_id);
$stmt->execute();
$result = $stmt->get_result();
$payslip = $result->fetch_assoc();

if (!$payslip) {
    echo "Payslip not found";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payslip</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .payslip-container { max-width: 800px; margin: auto; border: 1px solid #ccc; padding: 20px; }
        .payslip-header { text-align: center; }
        .payslip-details, .payslip-summary { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="payslip-container">
        <div class="payslip-header">
            <h2>Payslip for <?= date("F Y", strtotime($payslip['month'])) ?></h2>
        </div>
        <div class="payslip-details">
            <p><strong>Employee Name:</strong> <?= $payslip['name'] ?></p>
            <p><strong>Email:</strong> <?= $payslip['email'] ?></p>
            <p><strong>Month:</strong> <?= date("F Y", strtotime($payslip['month'])) ?></p>
        </div>
        <div class="payslip-summary">
            <table class="table">
                <tr>
                    <th>Basic Salary</th>
                    <td><?= number_format($payslip['basic_salary'], 2) ?></td>
                </tr>
                <tr>
                    <th>Allowances</th>
                    <td><?= number_format($payslip['allowances'], 2) ?></td>
                </tr>
                <tr>
                    <th>Deductions</th>
                    <td><?= number_format($payslip['deductions'], 2) ?></td>
                </tr>
                <tr>
                    <th>Net Salary</th>
                    <td><strong><?= number_format($payslip['net_salary'], 2) ?></strong></td>
                </tr>
            </table>
        </div>
        <div class="text-center">
            <button onclick="window.print()" class="btn btn-success">Print Payslip</button>
        </div>
    </div>
</body>
</html>
