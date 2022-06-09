<?php
session_start();
include('database.php');
$limit = 20;
if (isset($_GET["page"])) {
    $page_number  = $_GET["page"];
} else {
    $page_number = 1;
};
// if (isset($_SESSION['id']) && $_SESSION['user_group'] == 'student') {
//     $feedbacked = array();
//     $user_id = $_SESSION['id'];
//     $check_sql = "SELECT vacancy_id FROM feedback WHERE user_id = '$user_id'";
//     $check_result = mysqli_query($conn, $check_sql);
//     $array = mysqli_fetch_array($check_result);
// }
$initial_page = ($page_number - 1) * $limit;
$sql = "SELECT v.id as vac_id, v.name as vacancy_name, v.salary, v.description, v.employer_id as emp_id, emp.city, emp.name as emloyer_name FROM vacancies v LEFT JOIN employers emp ON v.employer_id = emp.id ORDER BY v.id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
    <div class="card w-100 mb-2">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row["vacancy_name"]; ?></h5>
            <p class="card-text text-primary"><?php echo $row["salary"]; ?></p>
            <p class="card-text"><?php echo $row["description"]; ?></p>
            <p class="card-text"><?php echo $row["city"]; ?></p>
            <p class="card-text text-muted"><?php echo $row["emloyer_name"]; ?></p>
            <button class="btn btn-primary feedback-btn" data-req="<?php echo $row["vac_id"]; ?>">Откликнуться</button>
        </div>
    </div>
<?php
};
?>