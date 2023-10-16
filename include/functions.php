<?php 

function age($birthDay) {
    $date = new DateTime($birthDay);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}

function isDate($dt) {
    $date_arr  = explode('-', $dob);
    return checkdate($date_arr[1], $date_arr[2], $date_arr[0]);
}

function bmi($heightFeet, $heightInches, $weightPounds)
{
    $bodyMassIndex = $weightPounds / pow(($heightFeet * 12 + $heightInches), 2) * 703;
    return ($bodyMassIndex);
}

function bmiDescription($bmi) {
    if ($bmi < 18.5) {
        return 'underweight';
    }
    else if ($bmi >= 18.5 && $bmi < 25) {
        return 'healthy';
    }
    else if ($bmi >= 25 && $bmi < 30) {
        return 'overweight';
    }
    else if ($bmi >= 30) {
        return 'obese';
    }
}

$firstName = "";
$lastName = "";
$married = "";
$conditions = [];
$birthDay = "";
$height = "";
$weight = "";
$error = "";

if (isset($_POST['submitForm'])) 
{
    $firstName = filter_input(INPUT_POST, 'firstName'); 
    $lastName = filter_input(INPUT_POST, 'lastName');
    $married = filter_input(INPUT_POST, 'married');
    $birthDay = filter_input(INPUT_POST, 'birthDay');
    $heightFeet = filter_input(INPUT_POST, 'ft', FILTER_VALIDATE_INT);
    $heightInches = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_INT);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_INT);
    
    if (empty($firstName )) {
        $error .= "First name not provided ";
    }
    if (empty($lastName)) {
        $error .= "Last name not provided ";
    }
    if (empty($married)) {
        $error .= "Marital status not provided ";
    }
    if (!isDate($birthDay)) {
        $error .= "Incorrect birth date format";
    }

    if (empty($error)) {
        $age = age($birthDay)
        $bmi = bmi($heightFeet, $heightInches, $weight)
        $bmiStatus = bmiDescription($bmi) 

        echo "<h2>Form successfully submitted.</h2>";
        echo "<p><strong>First Name: </strong> $firstName</p>";
        echo "<p><strong>Last Name: </strong> $lastName</p>";
        echo "<p><strong>Marital Status: </strong> $married</p>";
        echo "<p><strong>Birth Date: </strong> $birthDay</p>";
        echo "<p><strong>Age: </strong> $age</p>";
        echo "<p><strong>BMI: </strong> $bmi</p>";
        echo "<p><strong>BMI Classification: </strong> $bmiStatus</p>";
    }
} 

else {
    echo "Not yet submitted";

    foreach($error as $error){
        echo "<p>$error</p>"
    }
}
?>