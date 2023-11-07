<?php

include (__DIR__ . '/db.php');

function getUsers(){
    //grab $dbo - needs global scope since object is coming from outside the function
    global $db;

    //initialize return dataset
    $results = [];

    //prepare SQL statement
    $sqlString = $db->prepare("SELECT id, userFirstName, userLastName, userBirthDate, userMarried FROM users ORDER BY userLastName");

    //if SQL statement returns results, populate our results array
    if ($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = $sqlString->fetchAll(PDO::FETCH_ASSOC);
    }

    //return results
    return ($results);
}

function addUser($firstName, $lastName, $birthDate, $married) {
    global $db;

    $birthDate = new DateTimeImmutable($birthDate);

    $results = "";

    $sqlString = $db->prepare("INSERT INTO users SET userFirstName = :f, userLastName =:l, userBirthDate =:b, userMarried =:m");

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

function updateUser ($id, $firstName, $lastName, $birthDate, $married) {
    global $db;

    $birthDate = new DateTimeImmutable($birthDate);

    $results = "";

    $sqlString = $db->prepare("UPDATE users SET userFirstName = :f, userLastName = :l, userBirthDate = :b, userMarried = :m WHERE id = :id ");

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

function deleteUser ($id) {
    global $db;

    $results = "";

    $sqlString = $db->prepare("DELETE FROM users WHERE id = :id");

    $sqlString->bindValue(":id", $id);

    if($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = "Data Deleted";
    }

    return ($results);
}

function getUser($id){
    global $db;

    $results = [];

    $sqlString = $db->prepare("SELECT * FROM users WHERE id = :id");
    $sqlString->bindValue(':id', $id);

    if ($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = $sqlString->fetch(PDO::FETCH_ASSOC);
    }

    return ($results);
}

function searchUsers($firstName, $lastName, $married){
    global $db;
    $binds = array();
    $results = array();

    $sqlString = "SELECT * FROM users WHERE 0=0";

    if ($firstName != "") {
        $sqlString .= " AND userFirstName LIKE :first";
        $binds['first'] = '%'.$firstName.'%';
    }

    if ($lastName != "") {
        $sqlString .= " AND userLastName LIKE :last";
        $binds['last'] = '%'.$lastName.'%';
    }

    if ($married != "") {
        $sqlString .= " AND userMarried = :married";
        $binds['married'] = $married;
    }

    $sqlStmt = $db->prepare($sqlString);
    if ($sqlStmt->execute($binds) && $sqlStmt->rowCount() > 0) {
        $results = $sqlStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return ($results);
}

function login($userName, $passWord) {
    global $db;

    $results = [];

    $sqlString = $db->prepare("SELECT * FROM userUsers WHERE userUsername = :user AND userPassword = sha1(:pass)");
    $sqlString->bindValue(':user', $userName);
    $sqlString->bindValue(':pass', $passWord);

    if ($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = $sqlString->fetch(PDO::FETCH_ASSOC);
    }
    return ($results);
}

?>