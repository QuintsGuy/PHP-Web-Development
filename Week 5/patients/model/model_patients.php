<?php

include (__DIR__ . '/db.php');

function getPatients(){
    //grab $dbo - needs global scope since object is coming from outside the function
    global $db;

    //initialize return dataset
    $results = [];

    //prepare SQL statement
    $sqlString = $db->prepare("SELECT id, patientFirstName, patientLastName, patientBirthDate, patientMarried FROM patients ORDER BY patientLastName");

    //if SQL statement returns results, populate our results array
    if ($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = $sqlString->fetchAll(PDO::FETCH_ASSOC);
    }

    //return results
    return ($results);
}

function addPatient($firstName, $lastName, $birthDate, $married) {
    global $db;

    $birthDate = new DateTimeImmutable($birthDate);

    $results = "";

    $sqlString = $db->prepare("INSERT INTO patients SET patientFirstName = :f, patientLastName =:l, patientBirthDate =:b, patientMarried =:m");

    $binds = array(
        ":f" => $firstName,
        ":l" => $lastName,
        ":b" => $birthDate->format('Y-m-d H:i:s'),
        ":m" => $married
    );

    if ($sqlString->execute($binds) && $sqlString->rowCount() > 0) {
        $results = "Data Added";
    }

    return ($results);
}

function updatePatient ($id, $firstName, $lastName, $birthDate, $married) {
    global $db;

    $birthDate = new DateTimeImmutable($birthDate);

    $results = "";

    $sqlString = $db->prepare("UPDATE patients SET patientFirstName = :f, patientLastName = :l, patientBirthDate = :b, patientMarried = :m WHERE id = :id ");

    $binds = array(
        ":f" => $firstName,
        ":l" => $lastName,
        ":b" => $birthDate->format('Y-m-d H:i:s'),
        ":m" => $married,
        ":id" => $id
    );

    if ($sqlString->execute($binds) && $sqlString->rowCount() > 0) {
        $results = 'Data Added';
    }

    return ($results);
}

function deletePatient ($id) {
    global $db;

    $results = "";

    $sqlString = $db->prepare("DELETE FROM patients WHERE id = :id");

    $sqlString->bindValue(":id", $id);

    if($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = "Data Deleted";
    }

    return ($results);
}

function getPatient($id){
    global $db;

    $results = [];

    $sqlString = $db->prepare("SELECT * FROM patients WHERE id = :id");
    $sqlString->bindValue(':id', $id);

    if ($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = $sqlString->fetch(PDO::FETCH_ASSOC);
    }

    return ($results);
}

?>