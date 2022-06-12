<?php
include('database.php');
?>
<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_BCRYPT);

$result = mysqli_query($conn, "SELECT 1 FROM users WHERE email LIKE '%" . $email . "%'");

if ($result->num_rows > 0) {
    echo false;
} else {

    if (isset($email) && isset($password)) {
        $signup_query = "INSERT INTO users (name, surname, email, password, signup_time) VALUES ('$name','$surname','$email', '$hash', NOW())";
        mysqli_query($conn, $signup_query);
    }
    session_start();

    $_SESSION['user_group'] = "student";
    $_SESSION['email'] = $email;
    $_SESSION['user'] = $name;
    
    $auth_query = "SELECT id FROM users WHERE email = '$email'";
    $auth_result = mysqli_query($conn, $auth_query);
    $auth_array = mysqli_fetch_array($auth_result);
    $id = $auth_array['id'];
    
    $_SESSION['id'] = $id;

    echo true;
}
?>