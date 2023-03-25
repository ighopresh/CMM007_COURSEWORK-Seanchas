<?php

session_start();
    
$mysqli = require __DIR__ . "\includes\config.php";

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
$id = $_POST["post_id"];
$title = $_POST["title"];
$cat = $_POST["select1"];
$location = $_POST["select2"];
$image = $_FILES["file1"]["name"];
$description = $_POST["desc"];
$user_id = $_SESSION["user_id"];
$status = 0;
move_uploaded_file($_FILES["file1"]["tmp_name"], "assets/img/postimages/" . $_FILES["file1"]["name"]);

$sql = "UPDATE `stories` SET title= '$title', cat= '$cat', loc= '$location', img= '$image', descript= '$description', user_id= '$user_id', stat= '$status' WHERE stories.id=$id";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}



                  
if ($stmt->execute()) {

    header("Location: manage-post.php");
    exit;
    
} else {
    die($mysqli->error . " " . $mysqli->errno);
}