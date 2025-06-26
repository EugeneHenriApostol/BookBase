<?php
//login.php

session_start();

include "connection.php";
include "functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        //query to the database
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // check password using password verify
            if (password_verify($password, $user_data["password"])) {
                // password is correct, set session
                $_SESSION["user_id"] =  $user_data["user_id"];
                header("Location: dashboard.php");
                exit;   
            } else {
                $error = "Incorrect email or password";
            }
        } else  {
            $error = "Incorrect email or password";
        }
    } else {
        $error = "Incorrect email or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="static/css/login.css">
</head>
<body>
    <div class="box">
        <form method="POST">
            <div class="login">
                Login
            </div>

            <!-- display error -->
            <?php if(!empty($error)): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>

            <?php endif; ?>

            <input type="email" name="email" class="text"><br><br>
            <input type="password" name="password" class="text"><br><br>

            <input class="button" type="submit" value="Login"><br><br>

            <a href="signup.php">SignUp</a><br><br>
        </form>
    </div>
</body>
</html>