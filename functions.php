<?php
// functions.php


// dependency to be used on pages the require login
function check_login($conn) {
    // check if session value is set
    if(isset($_SESSION['user_id'])) {
        $user = $_SESSION['user_id'];

        // read the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $stmt->execute(['user_id' => $user]);
        $user_data = $stmt->fetch();

        if ($user_data) {
            return $user_data;
        }
    }

    // redirect to login
    header("Location: login.php");
    die;
}

// generate user id
function generate_user_id(){ 
    return bin2hex(random_bytes(16));
}