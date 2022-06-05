<?php
session_start();
?>
<?php
include('database.php');
?>
<?php
$name = $_POST['name'];
$category = $_POST['category'];
$salary = $_POST['salary'];
$description = $_POST['description'];
$full_description = $_POST['full_description'];
$employer = $_SESSION['user'];

$signup_query = "INSERT INTO vacancies (name, category, salary, description, full_description, employer, create_time) VALUES ('$name', '$category', '$salary','$description', '$full_description', '$employer', NOW())";
mysqli_query($conn, $signup_query);
echo true;
?>