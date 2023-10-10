<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays Lab</title>
</head>
<body>
    <ul>
        <li>
            <strong>Name: </strong> <?= $task['title']; ?>
        </li>

        <li>
            <strong>Date: </strong> <?= $task['due']; ?>
        </li>

        <li>
            <strong>Person Responsible: </strong> <?= $task['assigned_to']; ?>
        </li>

        <li>
            <strong>Status: </strong> <?= $task['completed'] ? '&#9989' : 'Incomplete'; ?>
        </li>
    </ul>
</body>
</html>