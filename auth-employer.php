<?php
session_start();
include('database.php');

$log = $_POST['email'];
$pass = $_POST['password'];

$result = mysqli_query($conn, "SELECT 1 FROM employers WHERE email LIKE '%" . $log . "%'");

if ($result->num_rows > 0) {
    $query = "SELECT id, name, email, password FROM employers WHERE email = '$log'";
    $send_query = mysqli_query($conn, $query);
    $user_array = mysqli_fetch_array($send_query);
    $email = $user_array['email'];
    $name = $user_array['name'];
    $hash = $user_array['password'];
    $id = $user_array['id'];
    if(password_verify($pass, $hash)){
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['user'] = $name;
        $_SESSION['user_group'] = 'employer';
        echo true;
    } else {
        echo false;
    }
} else {
    echo false;
};