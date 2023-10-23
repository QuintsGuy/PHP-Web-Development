<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>NFL Team Viewer | Tristan Knott</title>
</head>
<body>

    <?php
        include __DIR__ . '/model/model_teams.php';
        $teams = getTeams();
    ?>

    <div class="container">
        <div class="col-sm-12">
            <h1>NFL Teams</h1>
            <a href="add_team.php">Add New Team</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Team Name</th>
                        <th>Division</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($teams as $t): ?>
                        <tr>
                            <td><?= $t['id']; ?></td>
                            <td><?= $t['teamName']; ?></td>
                            <td><?= $t['division']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>