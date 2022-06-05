<?php
include('database.php');
$limit = 20;
if (isset($_GET["page"])) {
    $page_number  = $_GET["page"];
} else {
    $page_number = 1;
};
$initial_page = ($page_number - 1) * $limit;
$sql = "SELECT * FROM vacancies ORDER BY id DESC LIMIT $initial_page, $limit";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
    <div class="card w-100 mb-2">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
            <p class="card-text text-primary"><?php echo $row["salary"]; ?></p>
            <p class="card-text"><?php echo $row["description"]; ?></p>
            <p class="card-text text-muted"><?php echo $row["employer"]; ?></p>
            <a href="#" class="btn btn-primary">Откликнуться</a>
        </div>
    </div>
<?php
};
?>