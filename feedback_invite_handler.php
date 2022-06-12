<?php
include('database.php');
?>
<?php
$answer = $_GET['answer'];
$answer_text = $_GET['answer_text'];
$fb_id = $_GET['fb_id'];
$invite_query = "UPDATE `feedback` SET 
`answer` = '$answer', `answer_text` = '$answer_text' WHERE `feedback`.`id` = '$fb_id'";
mysqli_query($conn, $invite_query);
?>