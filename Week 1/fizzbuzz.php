<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizzbuzz</title>
</head>
<body>
    <h1>FizzBuzz Finder</h1>

    <table><?php for ($numbs = 1; $numbs <= 100; $numbs++) { ?>
        <tr>
            <td><?php if ($numbs % 2 == 0 && $numbs % 3 ==0) {
                echo $numbs . "FizzBuzz"."\n";
            }
            else if ($numbs % 2 == 0){
                echo $numbs . "Fizz"."\n";
            }
            else if ($numbs % 3 == 0){
                echo $numbs . "Buzz"."\n";
            }
            else {
                echo $numbs."\n";
            }?></td>
        </tr>
    <?php } ?></table>

</body>
</html>