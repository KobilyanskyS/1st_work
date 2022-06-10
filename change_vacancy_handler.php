<?php
session_start();
?>
<?php
include('database.php');

$name = $_POST['name'];
$vac_id = $_POST['vac_id'];
$salary = $_POST['salary'];
$currency = $_POST['currency'];
$description = $_POST['description'];
$full_description = $_POST['full_description'];

$current_user = $_SESSION['id'];

if (isset($name) && isset($salary) && isset($currency) && isset($description) && isset($full_description)) {
    $query = "UPDATE `vacancies` SET 
    `name` = '$name', `salary` = '$salary', `currency` = '$currency', `description` = '$description', 
    `full_description` = '$full_description' WHERE `vacancies`.`id` = '$vac_id' AND `vacancies`.`employer_id` = '$current_user'";
    mysqli_query($conn, $query);
}
?>