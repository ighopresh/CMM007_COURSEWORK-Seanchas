<?php

if (empty($_POST["fname"])) {
    die("Name is required");
}
if (empty($_POST["lname"])) {
    die("Name is required");
}
if (strlen($_POST["pswd1"]) < 8) {
    die("Password must be at least 8 characters");
}
if ($_POST["pswd1"] !== $_POST["pswd2"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["pswd1"], PASSWORD_DEFAULT);
$status = 0;

$mysqli = require __DIR__ . "/includes/config.php";

$sql = "INSERT INTO users (f_name, l_name, email, password_hash, stat)
        VALUES (?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss",
                  $_POST["fname"],
                  $_POST["lname"],
                  $_POST["email"],
                  $password_hash,
                  $status);
                  
if ($stmt->execute()) {

    header("Location: login.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}