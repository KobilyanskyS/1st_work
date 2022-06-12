<?php
include('database.php');
?>
<?php
$fb_id = $_GET['fb_id'];
$status_query = "SELECT answer FROM feedback WHERE id = '$fb_id'";
$status = mysqli_fetch_array(mysqli_query($conn, $status_query));
echo $status['answer'];
?>