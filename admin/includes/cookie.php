<?php
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "\database.php";
    
    $sql = "SELECT * FROM u_admin
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>