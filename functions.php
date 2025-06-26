<?php
// functions.php


// dependency to be used on pages the require login
function check_login($conn) {
    // check if session value is set
    if(isset($_SESSION['user_id'])) {
        $user = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$user' LIMIT 1";

        // read the database
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
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