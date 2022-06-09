<?php
session_start();
?>
<?php
include('database.php');
$vacancy_id = $_POST['vacancy_id'];
$employer_id = $_POST['employer_id'];
settype($feedback, 'integer');
settype($employer_id, 'integer');

if (isset($_SESSION['user_group']) && $_SESSION['user_group'] == 'student'){
    $current_user_id = $_SESSION['id'];
    $feedback_query = "INSERT INTO feedback (user_id, vacancy_id, employer_id, feedback_time) VALUES ('$current_user_id', '$vacancy_id', '$employer_id', NOW())";
    mysqli_query($conn, $feedback_query);
    echo 1;
} elseif (isset($_SESSION['user_group']) && $_SESSION['user_group'] == 'employer'){
    echo 0;
} else {
    echo 2;
}
?>