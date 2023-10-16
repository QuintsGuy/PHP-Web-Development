<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles.css">

    <title>Tristan Knott | Patient Form</title>
</head>
<body>
    <?php 
        include __DIR__ . '/../include/header.php';
        include __DIR__ . '/../include/functions.php';
    ?>

    <!--<?php var_dump($_POST); ?>-->

    <h1>Patient Intake Form</h1>

    <form name="patient" method="POST">

        <div class="wrapper">
            <div class="item">
                <label>First Name: </label>
                <input type="text" name="firstName" value="<?= $firstName; ?>">
            </div>

            <div class="item">
                <label>Last Name: </label>
                <input type="text" name="lastName" value="<?= $lastName; ?>">
            </div>

            <div class="item">
                <label>Married: </label>
                <input type="radio" name="married" value="yes" <?= $married=="yes"?"checked":""?>> Yes
                <input type="radio" name="married" value="no" <?= $married=="no"?"checked":""?>> No
            </div>

            <!--<div class="item">
                <label>Conditions: </label>
                <input type="checkbox" name="conditions" value="High Blood Pressure"> High Blood Pressure
                <input type="checkbox" name="conditions" value="Diabetes"> Diabetes
                <input type="checkbox" name="conditions" value="Heart Condition"> Heart Condition
                <input type="checkbox" name="conditions" value="Flu Like Symptoms"> Flu Like Symptoms
            </div>-->

            <div class="item">
                <label>Birth Date: </label>
                <input type="date" name="birthDay" value="<?= $birthDay; ?>">
            </div>

            <div class="item">
                <label>Height: </label>
                <input type="text" name="ft" value="<?= $heightFeet; ?>" style="width:40px;"> Feet
                <input type="text" name="inches" value="<?= $heightInches; ?>" style="width:40px;"> Inches
            </div>

            <div class="item">
                <label>Weight (pounds): </label>
                <input type="text" name="weight" value="<?= $weight; ?>">
            </div>

            <br />

            <div>
                <input type="submit" name="submitForm" value="Store Patient Information">
            </div>
        </div>

    </form>
    

    <?php if (isset($_POST['submitForm']) && empty($error)): ?>

        <h2>Form successfully submitted.</h2>
        <p><strong>First Name: </strong> <?php echo $firstName; ?></p>
        <p><strong>Last Name: </strong> <?php echo $lastName; ?></p>
        <p><strong>Marital Status: </strong> <?php echo $married; ?></p>
        <p><strong>Birth Date: </strong> <?php echo $birthDay; ?></p>
        <p><strong>Age: </strong> <?php echo $age; ?></p>
        <p><strong>BMI: </strong> <?php echo $bmi; ?></p>
        <p><strong>BMI Classification: </strong> <?= $bmiStatus; ?></p>

        <?php else: ?>
            <ul>
                <?= $error; ?>
            </ul>

    <?php endif; ?>
    
    <?php include __DIR__ . '/../include/footer.php' ?>

</body>
</html>