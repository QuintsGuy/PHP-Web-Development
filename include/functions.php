<?php 

function age($birthDay) {
    $date = new DateTime($birthDay);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}

function bmi($heightFeet, $heightInches, $weightPounds)
{
    $bodyMassIndex = $weightPounds / pow(($heightFeet * 12 + $heightInches), 2) * 703;
    return ($bodyMassIndex);
}

function bmiDescription($bmi) {
    if ($bmi < 18.5) {
        return 'Underweight';
    }
    else if ($bmi >= 18.5 && $bmi < 25) {
        return 'Healthy';
    }
    else if ($bmi >= 25 && $bmi < 30) {
        return 'Overweight';
    }
    else if ($bmi >= 30) {
        return 'Obese';
    }
}

$firstName = "";
$lastName = "";
$married = "";
$birthDay = "";
$heightFeet = "";
$heightInches = "";
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
        $error .= "<li>First name not provided</li>";
    }
    if (empty($lastName)) {
        $error .= "<li>Last name not provided</li>";
    }
    if (empty($married)) {
        $error .= "<li>Marital status not provided</li>";
    }
    if (empty($birthDay)) {
        $error .= "<li>Incorrect birth date format</li>";
    }
    if (empty($heightFeet) || empty($heightInches)) {
        $error .= "<li>Height not provided</li>";
    }
    if (empty($weight) || !$weight) {
        $error .= "<li>Weight not provided or not a number</li>";
    }

    if (empty($error)) {
        $age = age($birthDay);
        $bmi = bmi($heightFeet, $heightInches, $weight);
        $bmiStatus = bmiDescription($bmi);

    }
    else {
        $error = "<p>$error</p>";
    }
}
?>