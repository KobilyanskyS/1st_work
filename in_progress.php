<?php
session_start();
?>
<?php
if (isset($_SESSION['email']) && $_SESSION['user_group'] == "student") {
include('database.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В ожидании</title>
    <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'header.php' ?>

    <section class="content content_scroll">
        <div class="container" id="target-content">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $user = $_SESSION['id'];
                    $in_progress_vacancies = "SELECT v.id as vac_id, v.name as vacancy_name, v.category, v.salary, v.currency, v.description, emp.name as emp_name, MONTH(fb.feedback_time) as month, DAYOFMONTH(fb.feedback_time) as day, TIME_FORMAT(fb.feedback_time, '%k:%i') as time FROM feedback fb LEFT JOIN employers emp ON fb.employer_id = emp.id LEFT JOIN vacancies v ON fb.vacancy_id = v.id WHERE fb.answer IS NULL AND fb.user_id = '$user' ORDER BY fb.feedback_time DESC";
                    $in_progress_query = mysqli_query($conn, $in_progress_vacancies);
                    $_monthsList = array(
                        1 => "янв.",
                        2 => "фев.",
                        3 => "мар.",
                        4 => "апр.",
                        5 => "мая",
                        6 => "июн.",
                        7 => "июл.",
                        8 => "авг.",
                        9 => "сен.",
                        10 => "окт.",
                        11 => "ноя.",
                        12 => "дек."
                    );
                    while ($in_progress_array = mysqli_fetch_array($in_progress_query)) {
                    ?>
                        <div class="card w-100 mb-2">
                            <div class="card-body">
                                <a class="vacancy_link" href="vacancy.php?vacancy=<?php echo $in_progress_array["vac_id"]; ?>">
                                    <h5 class="card-title"><?php echo $in_progress_array["vacancy_name"]; ?></h5>
                                </a>
                                <p class="card-text text-primary"><?php echo $in_progress_array["salary"] . ' ' . $in_progress_array["currency"]; ?></p>
                                <p class="card-text"><?php echo $in_progress_array["description"]; ?></p>
                                <p class="card-text text-muted"><?php echo $in_progress_array["emp_name"]; ?></p>
                                <p class="card-text">Время отклика: <span class="text-muted"><?php echo $in_progress_array["day"] . ' ' . $_monthsList[$in_progress_array["month"]] . " в " . $in_progress_array["time"]; ?></span></p>
                                <p class="card-text">Сфера деятельности: <span class="text-muted"><?php echo $in_progress_array["category"]; ?></span></p>
                            </div>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.html'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sendFeedBackAjax.js"></script>
</body>

</html>
<?php } else header("location: index.php"); ?>