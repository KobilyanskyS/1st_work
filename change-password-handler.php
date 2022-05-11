<?php
session_start();
include('database.php');

$last_pass = $_POST['password_last'];
$new_pass = $_POST['password_new'];

$current_user = $_SESSION['email'];

$query = "SELECT password FROM users WHERE email = '$current_user'";
$send_query = mysqli_query($conn, $query);
$res = mysqli_fetch_array($send_query);
$hash = $res['password'];

if(password_verify($last_pass, $hash)){
    $new_hash = password_hash($new_pass, PASSWORD_BCRYPT);
    $update_query = "UPDATE `users` SET `password` = '$new_hash' WHERE `users`.`email` = '$current_user';";
    mysqli_query($conn, $update_query);
    echo true;
} else {
    echo false;
}
