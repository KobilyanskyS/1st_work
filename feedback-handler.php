<?php
session_start();
?>
<?php
include('database.php');
$feedback = $_POST['feedback'];
settype($feedback, 'integer');

if (isset($_SESSION['user_group']) && $_SESSION['user_group'] == 'student'){
    $current_user_id = $_SESSION['id'];
    $feedback_query = "INSERT INTO feedback (user_id, vacancy_id) VALUES ('$current_user_id', '$feedback')";
    mysqli_query($conn, $feedback_query);
    echo 1;
} elseif (isset($_SESSION['user_group']) && $_SESSION['user_group'] == 'employer'){
    echo 0;
} else {
    echo 2;
}
?>