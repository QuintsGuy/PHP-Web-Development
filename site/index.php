<?php 

include __DIR__ . '/../include/header.php';

if(!isset($_SESSION['user'])){
    header('Location: ../include/restricted.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Assignment Page | Tristan Knott</title>
</head>
<body>
    <div class="container">
        <h1>PHP & MySQL - Tristan Knott</h1>

        <p>Welcome to my PHP & MySQL page. You can find an overview of all my working PHP projects along with my code.</p>

        <p>Original Author: Tristan Knott</p>

        <h2>Assignment List</h2>

        <ul>
            <li><a href="../Week 1/fizzbuzz.php">Week 1 - Fizz Buzz</a></li>
            <li><a href="../Week 1/index.php">Week 1 - Video Lab Assignments</a></li>
            <li><a href="../Week 2/index.php">Week 2 - Patient</a></li>
            <li><a href="../Week 3/index.php">Week 3 - ATM</a></li>
            <li><a href="../Week 4/teams/view_teams.php">Week 4 - NFL Teams</a></li>
            <li><a href="../Week 4/patients/view_patients.php">Week 4 - Patients</a></li>
            <li><a href="../Week 5/patients/view_patients.php">Week 5 - Patient Full CRUD</a></li>
            <li><a href="../Week 6/patients/view_patients.php">Week 6 - Patient Search & Login</a></li>
            <li><a href="../Week 6/index.php">Week 6 - Schools</a></li>
            <li><a href="../Week 8/index.php">Week 8 - Disney Votes</a></li>
        </ul>

        <br>
    </div>
</body>
</html>

<?php include __DIR__ . '/../include/footer.php' ?>
