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
$currency = $_POST['currency'];
$description = $_POST['description'];
$full_description = $_POST['full_description'];
$employer = $_SESSION['id'];
$signup_query = "INSERT INTO vacancies (name, category, salary, currency, description, full_description, employer_id, create_time) VALUES ('$name', '$category', '$salary','$currency','$description', '$full_description', '$employer', NOW())";
mysqli_query($conn, $signup_query);
echo true;
?>