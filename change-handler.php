<?php
session_start();
?>
<?php
include('database.php');

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$education = $_POST['education'];
$university = $_POST['university'];
$date_of_end = $_POST['date_of_end'];
$specialisation = $_POST['specialisation'];
$skills = $_POST['skills'];
$qualities = $_POST['qualities'];
$certificates = $_POST['certificates'];
$portfolio = $_POST['portfolio'];
$github = $_POST['github'];
$other_information = $_POST['other_information'];

$current_user = $_SESSION['email'];

if (isset($name) && isset($surname) && isset($email) && isset($phone) && isset($password)) {
    $query = "UPDATE `users` SET 
    `name` = '$name', `surname` = '$surname', `email` = '$email', `phone` = '$phone', 
    `education` = '$education', `university` = '$university', `date_of_end` = '$date_of_end', `specialisation` = '$specialisation',
    `skills` = '$skills', `qualities` = '$qualities', `certificates` = '$certificates', `portfolio` = '$portfolio', `github` = '$github',
    `other_information` = '$other_information' WHERE `users`.`email` = '$current_user';";
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
$_SESSION['user_group'] = 'student';

echo $_SESSION['user'];
?>