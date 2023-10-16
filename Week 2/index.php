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

    <h1>Patient Intake Form</h1>

    <form name="patient" method="POST" action="patient.php">

        <div class="wrapper">
            <div class="item">
                <label>First Name: </label>
                <input type="text" name="first_name" value="">
            </div>

            <div class="item">
                <label>Last Name: </label>
                <input type="text" name="last_name" value="">
            </div>

            <div class="item">
                <label>Married: </label>
                <input type="radio" name="married" value="yes"> Yes
                <input type="radio" name="married" value="no"> No
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
                <input type="date" name="birth_date" value="">
            </div>

            <div class="item">
                <label>Height: </label>
                <input type="text" name="ft" value="" style="width:40px;"> Feet
                <input type="text" name="inches" value="" style="width:40px;"> Inches
            </div>

            <div class="item">
                <label>Weight (pounds): </label>
                <input type="text" name="weight" value="">
            </div>

            <br />

            <div>
                <input type="submit" name="submitForm" value="Store Patient Information" >
            </div>
        </div>

    </form>
    <p></p>
    
    <?php include __DIR__ . '/../include/footer.php' ?>

</body>
</html>