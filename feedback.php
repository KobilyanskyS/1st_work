<?php
session_start();
?>
<?php
include('database.php');
if (isset($_GET['feedback']) && isset($_GET['check_status']) && $_SESSION['user_group'] == 'employer') {
    $feedback_id = $_GET['feedback'];
    $check_status = $_GET['check_status'];
    $chek_sql = "UPDATE feedback SET check_status = '$check_status' WHERE id = '$feedback_id'";
    mysqli_query($conn, $chek_sql);
    
    $select_sql = "SELECT 
    v.name as vacancy_name, 
    users.name as username, 
    users.surname as usersurname, 
    MONTH(fb.feedback_time) as month, 
    DAYOFMONTH(fb.feedback_time) as day, 
    TIME_FORMAT(fb.feedback_time, '%k:%i') as time, 
    users.email, 
    users.phone, 
    users.education, 
    users.specialisation, 
    users.skills, 
    users.qualities, 
    users.certificates, 
    users.portfolio, 
    users.github,
    users.other_information
    FROM feedback fb LEFT JOIN vacancies v ON v.id = fb.vacancy_id LEFT JOIN users ON users.id = fb.user_id WHERE fb.id = '$feedback_id'";
    $result = mysqli_query($conn, $select_sql);
    $row = mysqli_fetch_array($result);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Отклик <?php echo $row["username"]." ".$row["usersurname"]; ?></title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php include 'employer_header.php'; ?>
        <section class="content">
            <div class="container" id="target-content">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="card-title">На вашу вакансию <?php echo $row["vacancy_name"]; ?> откликнулись</h5>
                        <p class="card-text text-dark"><?php echo $row["username"]." ".$row["usersurname"]; ?></p>
                        
                        <h5 class="card-title">Основная информация</h5>
                        <p class="card-text">Образование: <?php echo $row["education"]; ?></p>
                        <p class="card-text">Специализация: <?php echo $row["specialisation"]; ?></p>
                        <p class="card-text">Основные навыки:</p>
                        <p class="card-text"><?php echo nl2br($row["skills"]); ?></p>
                        <p class="card-text">Личные качества:</p>
                        <p class="card-text"><?php echo nl2br($row["qualities"]); ?></p>
                        
                        <h5 class="card-title">Дополнительная информация</h5>
                        <p class="card-text">Сертификаты: <a href="<?php echo $row["certificates"]; ?>"><?php echo $row["certificates"]; ?></a></p>
                        <p class="card-text">Портфолио: <a href="<?php echo $row["portfolio"]; ?>"><?php echo $row["portfolio"]; ?></a></p>
                        <p class="card-text">Профиль GitHub: <a href="<?php echo $row["github"]; ?>"><?php echo $row["github"]; ?></a></p>
                        <p class="card-text">Прочая информация:</p>
                        <p class="card-text"><?php echo nl2br($row["other_information"]); ?></p>

                        <h5 class="card-title">Контакты</h5>
                        <p class="card-text">Электронная почта: <?php echo $row["email"]; ?></p>
                        <p class="card-text">Контактный телефон: <a href="tel:<?php echo $row["phone"]; ?>"><?php echo $row["phone"]; ?></a></p>
                        <a class="btn btn-primary" href="index.php">Отправить приглашение</a>
                        <a class="btn btn-outline-danger" href="index.php">Отказ</a>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.html'; ?>

        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php } else {
    header("location: index.php");
} ?>