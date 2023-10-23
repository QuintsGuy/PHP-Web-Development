<?php

    include __DIR__ . '/../../include/header.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_patients.php';

    $error = "";
    $firstName = "";
    $lastName = "";
    $birthDate = "";
    $married = "";

    if(isset($_POST['submitPatient'])) {
        $firstName = filter_input(INPUT_POST, 'first_name');
        $lastName = filter_input(INPUT_POST, 'last_name');
        $birthDate = filter_input(INPUT_POST, 'birth_date');
        $married = filter_input(INPUT_POST, 'is_married');

        if ($firstName == "") $error .= "<li>Please provide the patient's first name. </li>";
        if ($lastName == "") $error .= "<li>Please provide the patient's last name. </li>";
        if ($birthDate == "") $error .= "<li>Please provide the patient's birth date. </li>";
        if ($married == "") $error .= "<li>Please provide the patient's marital status. </li>";
    }

    if(isset($_POST['submitPatient']) && $error == "") {
        addPatient($firstName, $lastName, $birthDate, $married);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Add Patient | Tristan Knott</title>
</head>
<body>
    <div class="container">
        <div class="col-sm-12">
            <?php if(isset($_POST['submitPatient']) && $error == ""): ?>
                <h2>Patient was added</h2>

                <ul>
                    <li>First Name: <?= $firstName; ?></li>
                    <li>Last Name: <?= $lastName; ?></li>
                    <li>Birth Date: <?= $birthDate; ?></li>
                    <li>Married: <?= $married==0?"No":"Yes"; ?></li>
                </ul>

                <a href="view_patients.php">View all Patients</a>

                <h2>Add new Patient</h2>
            <?php endif; ?>

            <form name="newPatient" action="add_patient.php" method="POST">
                <div class="wrapper">
                    <div>
                        <label for="first_name" class="label">First Name: </label>
                        <input type="text" name="first_name" value="<?= $firstName; ?>">
                    </div>
                    <div>
                        <label for="last_name" class="label">Last Name: </label>
                        <input type="text" name="last_name" value="<?= $lastName; ?>">
                    </div>
                    <div>
                        <label for="birth_date" class="label">Birth Date: </label>
                        <input type="date" name="birth_date" placeholder="YYYY-MM-DD" value="<?= $birthDate ?>">
                    </div>
                    <div>
                        <label for="is_married" class="label">Married: </label>
                        <input type="radio" name="is_married" value=1 <?= $married=="yes"?"checked":""?>> Yes
                        <input type="radio" name="is_married" value=0 <?= $married=="no"?"checked":""?>> No
                    </div>

                    <br />

                    <input type="submit" name="submitPatient" value="Save Patient Information">
                </div>
            </form>
        </div>
    </div>
</body>
</html>