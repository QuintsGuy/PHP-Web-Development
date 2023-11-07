<?php

    session_start();

    include __DIR__ . '/../Week 6/patients/model/model_patients.php';
    
    if(isset($_POST['logoutButton'])){
        unset($_SESSION['user']);
    }

    if(isset($_POST['loginButton'])){
        $userName = filter_input(INPUT_POST, 'loginUsername');
        $passWord = filter_input(INPUT_POST, 'loginPassword');

        $user = login($userName, $passWord);

        if(count($user)>0){
            $_SESSION['user'] = $userName;

        } else {
            session_unset();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5 mb-3">
        <a class="navbar-brand" href="#">PHP Web Development</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/PHP-Web-Development/site/index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                
            <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="assignmentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Assignments</a>
                        <div class="dropdown-menu" aria-labelledby="assignmentsDropdown">
                            <a class="dropdown-item" href="/PHP-Web-Development/Week%201/fizzbuzz.php">FizzBuzz</a>
                            <a class="dropdown-item" href="/PHP-Web-Development/Week%204/patients/view_patients.php">Patient View & Add</a>
                            <a class="dropdown-item" href="/PHP-Web-Development/Week%205/patients/view_patients.php">Patient Edit & Delete</a>
                            <a class="dropdown-item" href="/PHP-Web-Development/Week%206/patients/view_patients.php">Patient Search & Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Other</a>
                        </div>
                    </li>
                </ul>
                
                <div class="nav-item text-secondary my-2 my-lg-0">
                    <a class="nav-link">Welcome <?= $_SESSION['user']; ?> </a>
                </div>

                <div class="nav-item my-2 my-lg-0">
                    <form method="POST">
                        <button name="logoutButton" type="submit" class="btn btn-dark">Logout</button>
                    </form>
                </div>
                
            <?php else: ?>
                </ul>
                <div class="nav-item dropdown text-light my-2 my-lg-0">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                    <div class="dropdown-menu" style="margin-left: -15rem; width: 18rem;" aria-labelledby="loginDropdown">
                        <form method="POST" class="px-4 py-3">
                            <div class="form-group">
                                <label for="usernameDropdown">Username</label>
                                <input name="loginUsername" type="text" class="form-control" id="usernameDropdown" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="passwordDropdown">Password</label>
                                <input name="loginPassword" type="password" class="form-control" id="passwordDropdown" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">Remember me</label>
                            </div>
                            <button name="loginButton" type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">New around here? Sign up</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>