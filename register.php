<?php
session_start();
if(isset($_SESSION['user']) != ""){
    header("Location: home.php");
}

include_once 'database_connection.php';

if(isset($_POST['signup_btn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($crud->registerUser($username, $password, $email)){
        echo("Registration Successful");
    }
    else{
        echo("Registration Failed");
    }

}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/login&register.css">
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <div class="login-form">
        <div class="login-page">
            <form method="post">
                <input type="text" name="username" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email Address" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit" name="signup_btn">Sign Up</button>
                <button><a href="index.php">Cancel</a></button>
            </form>
        </div>
    </div>
</body>
</html>