<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

            <table>
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