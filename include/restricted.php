<?php 

include __DIR__ . '/../include/header.php';

if(isset($_POST['loginButton'])){
    $userName = filter_input(INPUT_POST, 'loginUsername');
    $passWord = filter_input(INPUT_POST, 'loginPassword');

    $user = login($userName, $passWord);

    if(count($user)>0){
        session_start();
        $_SESSION['user'] = $userName;
        header('Location: /se266/PHP-Web-Development/site/index.php');
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
    <title>Login Page</title>
</head>
<body>
    <div style="text-align: center; margin-top: 10px;">
        <h1>Welcome to my PHP Web Development Site</h1>
        <p>Please login above to view patient information.</p>
    </div>
</body>
</html>

<?php include __DIR__ . '/../include/footer.php';