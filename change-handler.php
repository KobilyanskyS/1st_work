<?php
session_start();
?>
<?php
include('database.php');

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$current_user = $_SESSION['email'];

if(isset($name) && isset($surname) && isset($email) && isset($phone) && isset($password)){
    $query = "UPDATE `users` SET `name` = '$name', `surname` = '$surname', `email` = '$email', `phone` = '$phone' WHERE `users`.`email` = '$current_user';";
    mysqli_query($conn, $query);
}

$select = "SELECT name, email FROM users WHERE email = '$email'";
$send_query = mysqli_query($conn, $select);
$user_array = mysqli_fetch_array($send_query);
$name = $user_array['name'];
$email = $user_array['email'];
session_reset();
$_SESSION['user'] = $name;
$_SESSION['email'] = $email;

echo $_SESSION['user'];
?>