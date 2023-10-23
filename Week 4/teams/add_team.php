<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_teams.php';

    $error = "";
    $teamName = "";
    $division = "";
    $feedback = "";

    if(isset($_POST['submitTeam'])) {
        $teamName = filter_input(INPUT_POST, 'team_name');
        $division = filter_input(INPUT_POST, 'division');

        if ($teamName == "") $error .= "<li>Please provide team name</li>";
        if ($division == "") $error .= "<li>Please provide team's division</li>";
        $feedback == $error;
    }

    
    if(isset($_POST['submitTeam']) && $error == "") {
        addTeam($teamName, $division);
        $feedback == "Form submitted successfully";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Add NFL Team | Tristan Knott</title>
</head>
<body>
    <div class="container">
        <div class="col-sm-12">
            <?php if(isset($_POST['submitTeam']) && $error == ""): ?>
                <h2>Team was added</h2>
                
                <ul>
                    <li><?= "Team Name: $teamName"; ?></li>
                    <li><?= "Division: $division"; ?></li>
                </ul>
                
                <a href="view_teams.php">View all NFL Teams</a>
                
                <h2>Add New NFL Team</h2>
            <?php endif; ?>

            <form name="team" action="add_team.php" method="POST">
                <div class="wrapper">
                    <div class="label"><label>Team Name: </label></div>
                    <div><input type="text" name="team_name" value="<?= $teamName; ?>"></div>
                    <div class="label"><label>Division: </label></div>
                    <div><input type="text" name="division" value="<?= $division; ?>"></div>
                    <br />
                    <div><input type="submit" name="submitTeam" value="Save Team"></div>
                    <div><p><?= $feedback; ?></p></div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>