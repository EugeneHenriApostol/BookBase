<?php
// signup.php

include "db.php";
include "functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['firstName'];  
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    if(
        !empty( $first_name) && 
        !empty( $last_name) && 
        !empty($email) && 
        !empty($password) &&
        $password == $confirm_password &&
        !is_numeric($email)
    ) {
        // check password length
        if (strlen($password) < 8) {
            $error = "Password must be atleast 8 characters long";
        }

        // validate, check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        if ($stmt->rowCount() > 0) {
            $error = "Email already exists.";
        }


        if (empty($error)) {
            $user_id = generate_user_id(); 

            // hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // save to database
            $stmt = $conn->prepare("INSERT INTO users (user_id, first_name, last_name, email, password)
            VALUES (:user_id, :first_name, :last_name, :email, :password)");

            $stmt->execute([
                'user_id' => $user_id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email'=> $email,
                'password'=> $hashed_password,
            ]);

            header("Location: login.php");
            exit;
        }
    } else {   
        $error = "Please enter valid information and make sure passwords match";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
    <div class="box">
        <form method="POST">
            <div class="signup">
                SignUp
            </div>
            <!-- display error -->
            <?php if(!empty($error)) :?>
                <div class="error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <input type="text" name="firstName" placeholder="First Name" class="text" required><br><br>
            <input type="text" name="lastName" placeholder="Last Name" class="text" required><br><br>
            <input type="email" name="email" placeholder="Email" class="text" required><br><br>
            <input type="password" name="password" placeholder="Password" class="text" required><br><br>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" class="text" required><br><br>

            <input class="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>
</html>