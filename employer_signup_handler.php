<?php
include('database.php');
?>
<?php
$company_name = $_POST['company_name'];
$company_inn = $_POST['company_inn'];
$city = $_POST['city'];
$contact_name = $_POST['contact_name'];
$contact_surname = $_POST['contact_surname'];
$contact_email = $_POST['contact_email'];
$contact_phone = $_POST['contact_phone'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_BCRYPT);

$result = mysqli_query($conn, "SELECT 1 FROM employers WHERE email LIKE '%" . $contact_email . "%'");

if ($result->num_rows > 0) {
    echo false;
} else {
    if (isset($contact_email) && isset($password)) {
        $signup_query = "INSERT INTO employers (name, inn, city, contact_name, contact_surname, email, phone, password, signup_time) 
        VALUES ('$company_name','$company_inn','$city', '$contact_name','$contact_surname', '$contact_email','$contact_phone', '$hash', NOW())";
        mysqli_query($conn, $signup_query);
    }
    session_start();

    $_SESSION['user_group'] = 'employer';
    $_SESSION['email'] = $contact_email;
    $_SESSION['user'] = $company_name;

    $auth_query = "SELECT id FROM employers WHERE email = '$contact_email'";
    $auth_result = mysqli_query($conn, $auth_query);
    $auth_array = mysqli_fetch_array($auth_result);
    $id = $auth_array['id'];

    $_SESSION['id'] = $id;

    echo true;
}
?>