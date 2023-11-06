<?php

    include __DIR__ . '/../../include/header.php';

    if(!isset($_SESSION['user'])){
        header('Location: /se266/PHP-Web-Development/include/restricted.php');
    }

    $error = "";

    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'patientId');

        if($action == "Update"){
            $patient = getPatient($id);
            $firstName = $patient['patientFirstName'];
            $lastName = $patient['patientLastName'];
            $birthDate = $patient['patientBirthDate'];
            $married = $patient['patientMarried']==0?"no":"yes";
        } else {
            $firstName = "";
            $lastName = "";
            $birthDate = "";
            $married = "";
        }

    } elseif(isset($_POST['Update_patient'])) {
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'patient_id');
        $firstName = filter_input(INPUT_POST, 'first_name');
        $lastName = filter_input(INPUT_POST, 'last_name');
        $birthDate = filter_input(INPUT_POST, 'birth_date');
        $married = filter_input(INPUT_POST, 'is_married');

        updatePatient($id, $firstName, $lastName, $birthDate, $married);
        header('Location: view_patients.php');

    } elseif (isset($_POST['Add_patient'])) {
        $action = filter_input(INPUT_POST, 'action');
        $firstName = filter_input(INPUT_POST, 'first_name');
        $lastName = filter_input(INPUT_POST, 'last_name');
        $birthDate = filter_input(INPUT_POST, 'birth_date');
        $married = filter_input(INPUT_POST, 'is_married');

        addPatient($firstName, $lastName, $birthDate, $married);
        header('Location: view_patients.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Patients | Tristan Knott</title>
</head>
<body>
    <div class="container">
        <div class="col-sm-12">
            <h2><?= $action; ?> Patient</h2>
            <form name="patient" action="edit_patient.php" method="POST">
                <div class="wrapper">

                    <input type="hidden" name="patient_id" value="<?= $id; ?>" />

                    <div class="item">
                        <label">First Name: </label>
                        <input type="text" name="first_name" value="<?= $firstName; ?>" />
                    </div>

                    <div class="item">
                        <label">Last Name: </label>
                        <input type="text" name="last_name" value="<?= $lastName; ?>" />
                    </div>

                    <div class="item">
                        <label for="birth_date" class="label">Birth Date: </label>
                        <input type="date" name="birth_date" value="<?= $birthDate ?>">
                    </div>

                    <div class="item">
                        <label for="is_married" class="label">Married: </label>
                        <input type="radio" name="is_married" value=1 <?= $married=="yes"?"checked":""?>> Yes
                        <input type="radio" name="is_married" value=0 <?= $married=="no"?"checked":""?>> No
                    </div>

                    <input type="submit" name="<?= $action; ?>_patient" value="<?= $action; ?> Patient Information" />
                </div>
            </form>
        </div>
    </div>

    <?php include __DIR__ . '/../../include/footer.php'; ?>

</body>
</html>