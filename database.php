<?php
    date_default_timezone_set('Europe/Moscow');
    $server_name = "localhost";
    $user_name = "username";
    $password = "password";
    $db="a0681276_work";
    $conn = mysqli_connect($server_name, $user_name, $password,$db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>