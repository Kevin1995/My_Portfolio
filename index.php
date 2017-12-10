<?php
session_start();

include_once 'database_connection.php';

if(isset($_COOKIE["user"])){
    $_SESSION['cart'] = [];
    header("Location: home.php");
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $row = $crud->getUser($email);

    if ($row['password'] == $password) {
        $_SESSION['user'] = $row['username'];
        $_SESSION['cart'] = [];
        $setcookie = setcookie('user', $_SESSION['user'], time() + (10 * 365 * 24 * 60 * 60), '/');
        header("Location: home.php");
    } else {
        echo("Wrong Credentials");
    }

}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/login&register.css">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <div class="login-form">
        <div class="login-page">
            <form method="post">
                <input type="text" name="email" placeholder="Your Email" required/>
                <input type="password" name="password" placeholder="Your Password" required/>
                <button type="submit" name="login_btn">Sign In</button>
                <button><a href="register.php">Register</a></button>
            </form>
        </div>
    </div>
</body>
</html>