<?php
session_start();
?>
<?php
include('database.php');
if (isset($_GET['vacancy'])) {
    $vacancy_id = $_GET['vacancy'];
    $sql = "SELECT v.id as vac_id, v.name as vacancy_name, v.salary, v.description, v.full_description, v.employer_id as emp_id, emp.city, emp.name as emloyer_name FROM vacancies v LEFT JOIN employers emp ON v.employer_id = emp.id WHERE v.id = '$vacancy_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($_SESSION['id']) && $_SESSION['user_group'] == 'student') {
        $user_id = $_SESSION['id'];
        $existing_vacancies = array();
        $check_result = mysqli_query($conn, "SELECT vacancy_id FROM feedback WHERE user_id = '$user_id'");
        while ($myrow = mysqli_fetch_assoc($check_result)) {
            $existing_vacancies[] = $myrow['vacancy_id'];
        }
    } else {
        $existing_vacancies = array(0);
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Главная</title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php include 'header.php'; ?>
        <section class="content">
            <div class="container" id="target-content">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="card-title"><?php echo $row["vacancy_name"]; ?></h5>
                        <p class="card-text text-primary"><?php echo $row["salary"]; ?></p>
                        <p class="card-text"><?php echo $row["city"]; ?></p>
                        <p class="card-text"><?php echo $row["full_description"]; ?></p>
                        <p class="card-text text-muted"><?php echo $row["emloyer_name"]; ?></p>
                        <?php if (isset($_SESSION['id'])) { ?>
                            <button class="btn btn-primary feedback-btn" data-req="<?php echo $row["vac_id"]; ?>" <?php if (in_array($row["vac_id"], $existing_vacancies)) {
                                                                                                                        echo "disabled";
                                                                                                                    } ?>>Откликнуться</button>
                            <?php if (in_array($row["vac_id"], $existing_vacancies)) {
                                echo '<p class="card-text text-muted mt-2">Вы откликнулись</p>';
                            } ?>
                        <?php } else { ?>
                            <a class="btn btn-primary" href="index.php#loginmodal" data-req="<?php echo $row["vac_id"]; ?>">Откликнуться</a>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.html'; ?>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/sendFeedBackAjax.js"></script>
    </body>

    </html>

<?php } else {
    header("location: index.php");
} ?>