<?php
session_start();
?>
<?php
include('database.php');
$feedback = $_POST['feedback'];

if (isset($_SESSION['user_group']) && $_SESSION['user_group'] == 'student'){
    $current_user_id = $_SESSION['id'];
    $sql = "INSERT INTO feedback (user_id, vacancy_id) VALUES ('$current_user_id', '$feedback')";
}
?>