<?php
//login.php

session_start();

include "db.php";
include "functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        $db = DB::get();
        $user_data = $db->row("SELECT * FROM users where email = :email LIMIT 1", [
            "email"=> $email,
        ]);

        if ($user_data && password_verify($password, $user_data["password"])) {
            $_SESSION["user_id"] = $user_data["user_id"];
            header("Location: dashboard.php");
            exit;
        } else {
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
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="auth-container">
        <div class="logo">
            <h1>📚 BookBase</h1>
            <p>Digital Library System</p>
        </div>

        <form class="auth-form" method="POST">
            <h2 class="form-title">Welcome Back</h2>

            <div class="user-type">
                <label>Login as:</label>
                <div class="user-type-options">
                    <div class="user-type-option active" onclick="selectUserType('student', event)">
                        <input type="radio" name="userType" value="student" checked>
                        <div>👨‍🎓 Student</div>
                    </div>
                    <div class="user-type-option" onclick="selectUserType('admin', event)">
                        <input type="radio" name="userType" value="admin">
                        <div>👩‍🏫 Admin</div>
                    </div>
                </div>
            </div>

            <!-- display error -->
            <?php if(!empty($error)): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>

            <?php endif; ?>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="submit-btn" value="Login">Login</button>

            <div class="auth-links">
                <a href="#" onclick="showForgotPassword()">Forgot Passowrd?</a>
                <div class="divider">•</div>
                <a href="signup.php">Don't have an account? Sign Up</a>
            </div>
        </form>
    </div>
    <script src="assets/js/login.js"></script>
</body>
</html>