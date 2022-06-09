<?php
session_start();
include('database.php');
$limit = 20;
if (isset($_GET["page"])) {
    $page_number  = $_GET["page"];
} else {
    $page_number = 1;
};
if (isset($_SESSION['id']) && $_SESSION['user_group'] == 'student') {
    $user_id = $_SESSION['id'];
    $existing_vacancies = array();
    $check_result = mysqli_query($conn,"SELECT vacancy_id FROM feedback WHERE user_id = '$user_id'");
    while($myrow = mysqli_fetch_assoc($check_result)) {
    $existing_vacancies[] = $myrow['vacancy_id'];
    }
} else {
    $existing_vacancies = array(0);
}

$initial_page = ($page_number - 1) * $limit;
$sql = "SELECT v.id as vac_id, v.name as vacancy_name, v.salary, v.description, v.employer_id as emp_id, emp.city, emp.name as emloyer_name FROM vacancies v LEFT JOIN employers emp ON v.employer_id = emp.id ORDER BY v.id";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
?>
    <div class="card w-100 mb-2">
        <div class="card-body">
            <a class="vacancy_link" href="vacancy.php?vacancy=<?php echo $row["vac_id"]; ?>"><h5 class="card-title"><?php echo $row["vacancy_name"]; ?></h5></a>
            <p class="card-text text-primary"><?php echo $row["salary"]; ?></p>
            <p class="card-text"><?php echo $row["description"]; ?></p>
            <p class="card-text"><?php echo $row["city"]; ?></p>
            <p class="card-text text-muted"><?php echo $row["emloyer_name"]; ?></p>
            <button class="btn btn-primary feedback-btn" data-req="<?php echo $row["vac_id"]; ?>" <?php if (in_array($row["vac_id"],$existing_vacancies)){ echo "disabled";} ?>>Откликнуться</button>
            <?php if (in_array($row["vac_id"],$existing_vacancies)){ echo '<p class="card-text text-muted mt-2">Вы откликнулись</p>';} ?>
        </div>
    </div>
<?php
};
?>