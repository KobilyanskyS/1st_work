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
    $query = "UPDATE `employers` SET `contact_name` = '$name', `contact_surname` = '$surname', `email` = '$email', `phone` = '$phone' WHERE `employers`.`email` = '$current_user';";
    mysqli_query($conn, $query);
}

$select = "SELECT name, email FROM employers WHERE email = '$email'";
$send_query = mysqli_query($conn, $select);
$user_array = mysqli_fetch_array($send_query);
$name = $user_array['name'];
$email = $user_array['email'];
session_reset();
$_SESSION['user'] = $name;
$_SESSION['email'] = $email;
$_SESSION['user_group'] = 'employer';


echo $_SESSION['user'];
?>