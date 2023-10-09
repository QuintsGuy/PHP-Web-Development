<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays Lab</title>
</head>
<body>
    <ul>
        <?php foreach ($task as $key => $feature) : ?>
            <li><strong><?= $key, ': ', $feature; ?></strong></li>
        <?php endforeach ?>
    </ul>
</body>
</html>