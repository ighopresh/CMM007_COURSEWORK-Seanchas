<?php

session_start();
    
$mysqli = require __DIR__ . "\includes\database.php";

if (empty($_POST["title"])) {
    die("Please input a Title");
}
if (empty($_POST["select1"])) {
    die("Please select a Category");
}
if (empty($_POST["select2"])) {
    die("Please Select A Location");
}
if (empty(basename($_FILES["file1"]["name"]))) {
    die("Please Select a file");
}
if (empty($_POST["desc"])) {
    die("Please input description");
}
if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
$status = 0;

$mysqli = require __DIR__ . "/includes/config.php";
$image = $_FILES["file1"]["name"];
$user_id = $_SESSION["user_id"];
move_uploaded_file($_FILES["file1"]["tmp_name"], "assets/img/postimages/" . $_FILES["file1"]["name"]);

$sql = "INSERT INTO stories (title, cat, loc, img, descript, user_id, stat)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                  $_POST["title"],
                  $_POST["select1"],
                  $_POST["select2"],
                  $image,
                  $_POST["desc"],
                  $user_id,
                  $status);
                  
if ($stmt->execute()) {

    header("Location: manage-post.php");
    exit;
    
} else {
    die($mysqli->error . " " . $mysqli->errno);
}