<?php 

include (__DIR__ . '/db.php');
//var_dump($db);
//exit;

function getTeams(){
    //grab $dbo - needs global scope since object is coming from outside the function
    global $db;

    //initialize return dataset
    $results = [];

    //prepare SQL statement
    $sqlString = $db->prepare("SELECT id, teamName, division FROM teams ORDER BY teamName");

    //if SQL statement returns results, populate our results array
    if ($sqlString->execute() && $sqlString->rowCount() > 0) {
        $results = $sqlString->fetchAll(PDO::FETCH_ASSOC);
    }

    //return results
    return ($results);
}

function addTeams($teamName, $division) {
    //grab $dbo
    global $db;

    $results = "";

    $sqlString = $db->prepare("INSERT INTO teams SET teamName = :t, division =:d");

    $binds = array(
        ":t" => $teamName,
        ":d" => $division
    );

    if ($sqlString->execute($binds) && $sqlString->rowCount() > 0) {
        $results = "Data Added";
    }

    return ($results);
}

?>