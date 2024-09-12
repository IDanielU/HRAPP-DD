<?php
// Include the database connection file (adjust the path as needed)
include 'config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birthDate']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $national_id = mysqli_real_escape_string($conn, $_POST['nationalId']);
    $passport = !empty($_POST['passport']) ? mysqli_real_escape_string($conn, $_POST['passport']) : NULL;
    $job_position = mysqli_real_escape_string($conn, $_POST['jobPosition']);
    $email = !empty($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : NULL;

    // SQL query to insert the data into the employees table
    $sql = "INSERT INTO employees (first_name, last_name, gender, birth_date, nationality, national_id, passport, job_position, email)
            VALUES ('$first_name', '$last_name', '$gender', '$birth_date', '$nationality', '$national_id', '$passport', '$job_position', '$email')";

    // Execute the query and check if successful
    if (mysqli_query($conn, $sql)) {
        // Redirect to a success page or display a success message
        header("Location: success.php"); // Assuming you have a success page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
