<?php

include 'config.php';

$msg = "";

if (isset($_POST['submit'])) {
    $naam = mysqli_escape_string($connect, $_POST['naam']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $password = mysqli_escape_string($connect, md5($_POST['password']));
    $confirm_password = mysqli_escape_string($connect, md5($_POST['confirm_password']));

    if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'style='font-weight:bold; color:#58a3db; font-size:11px; ;' ;>{$email} - Email adres bestaat al.</div>";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users ('naam', 'email', 'password', 'confirm_password') VALUES (''{$naam}'',''{$email}'',''{$password}'',''{$confirm_password}'')";
            $result = mysqli_query($connect, $sql);

            if ($result) {
               header(Location: login.php);
            } else {
                $msg = "<div class='alert alert-danger' style='font-weight: bold; color:#c80000; font-size:13px;; margin:10px; ';> ERROR, probeert het opnieuw.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger' style='font-weight: bold; color:#c80000; font-size:13px; margin:10px; ';> Wachtwoord / Herhaal Wachtwoord niet gelijk.</div>";
        }
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broodkruimels - Register Page</title>
    <link rel="stylesheet" href="register.css"/>
</head>
<body>
<div class="container">
        <h2>Bakery Registration</h2>
        <form action="" method="POST">
            <div class="form-group">


                <label for="username">Username:</label>
                <input type="text" id="naam" name="naam" pattern="[A-Za-z]{0-9}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" minlength="6" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" minlength="6" required>
            </div>

            <?php echo $msg ?>;

            <input type="submit" id="submit" name="submit" value="Register">
        </form>
    </div>
</body>
</html>