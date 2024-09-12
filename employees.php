<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .add-job {
            cursor: pointer;
            color: green;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
<?php
include 'nav.php';
?>
    <div class="container">
        <div class="form-container">
            <h4 class="text-center mb-4">Employee Information</h4>
            <form action="reg_form.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="lastName">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
        </div>
    </div>
    <div class="form-group">
        <label for="gender">Gender <span class="text-danger">*</span></label>
        <select id="gender" name="gender" class="form-control" required>
            <option selected>Choose...</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="birthDate">Birth Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="birthDate" name="birthDate" required>
    </div>
    <div class="form-group">
        <label for="nationality">Nationality <span class="text-danger">*</span></label>
        <select id="nationality" name="nationality" class="form-control" required>
            <option selected>Nigeria</option>
            <option>Ghana</option>
            <option>Kenya</option>
            <option>South Africa</option>
            <option>Other</option>
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nationalId">National ID <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nationalId" name="nationalId" placeholder="National ID" required>
        </div>
        <div class="form-group col-md-6">
            <label for="passport">Passport</label>
            <input type="text" class="form-control" id="passport" name="passport" placeholder="Passport (optional)">
        </div>
    </div>
    <div class="form-group">
        <label for="jobPosition">Job Position <span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" id="jobPosition" name="jobPosition" placeholder="Job Position" required>
            <div class="input-group-append">
                <span class="input-group-text add-job">+</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email (for Employee Web Account invitation)</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
