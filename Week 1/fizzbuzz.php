<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizzbuzz</title>
</head>
<body>
    <h1>FizzBuzz Finder</h1>

    <!--Loop through $numbs 100 times-->
    <table><?php for ($numbs = 1; $numbs <= 100; $numbs++) { ?>
        <tr>
            <!--Check whether numbs is divisible by 2 or 3; Print the corresponding statements-->
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