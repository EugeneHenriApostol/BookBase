<?php
//connection.php

$dbhost = 'localhost';
$dbname = 'bookbase';
$dbuser = 'root';
$dbpass = '';

try {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch (PDOException $err) {
    echo "Database connection problem". $err->getMessage();
    exit();
}