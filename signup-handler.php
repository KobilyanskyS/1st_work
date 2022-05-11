<?php
include('database.php');
?>
<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_group = 'student';

$hash = password_hash($password, PASSWORD_BCRYPT);

$result = mysqli_query($conn, "SELECT 1 FROM users WHERE email LIKE '%" . $email . "%'");

if ($result->num_rows > 0) {
    echo false;
} else {

    if (isset($email) && isset($password)) {
        $signup_query = "INSERT INTO users (name, surname, email, password, signup_time, user_group) VALUES ('$name','$surname','$email', '$hash', NOW(), '$user_group')";
        mysqli_query($conn, $signup_query);
    }
    session_start();

    $_SESSION['user_group'] = $user_group;
    $_SESSION['email'] = $email;
    $_SESSION['user'] = $name;
    echo true;
}
?>