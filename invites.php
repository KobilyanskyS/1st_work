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
        <title>Приглашения</title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>
        <?php include 'header.php' ?>

        <section class="content content_scroll">
            <div class="container" id="target-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $user = $_SESSION['id'];
                        $invites_vacancies = "SELECT v.id as vac_id, v.name as vacancy_name, v.category, v.salary, v.currency, v.description, emp.name as emp_name, MONTH(fb.feedback_time) as month, DAYOFMONTH(fb.feedback_time) as day, TIME_FORMAT(fb.feedback_time, '%k:%i') as time, fb.answer_text FROM feedback fb LEFT JOIN employers emp ON fb.employer_id = emp.id LEFT JOIN vacancies v ON fb.vacancy_id = v.id WHERE fb.answer = 'Приглашение' AND fb.user_id = '$user' ORDER BY fb.feedback_time DESC";
                        $invites_query = mysqli_query($conn, $invites_vacancies);
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
                        while ($invites_array = mysqli_fetch_array($invites_query)) {
                        ?>
                            <div class="card w-100 mb-2">
                                <div class="card-body">
                                    <a class="vacancy_link" href="vacancy.php?vacancy=<?php echo $invites_array["vac_id"]; ?>">
                                        <h5 class="card-title"><?php echo $invites_array["vacancy_name"]; ?></h5>
                                    </a>
                                    <p class="card-text text-primary"><?php echo $invites_array["salary"] . ' ' . $invites_array["currency"]; ?></p>
                                    <p class="card-text"><?php echo $invites_array["description"]; ?></p>
                                    <p class="card-text text-muted"><?php echo $invites_array["emp_name"]; ?></p>
                                    <p class="card-text">Время отклика: <span class="text-muted"><?php echo $invites_array["day"] . ' ' . $_monthsList[$invites_array["month"]] . " в " . $invites_array["time"]; ?></span></p>
                                    <p class="card-text">Сфера деятельности: <span class="text-muted"><?php echo $invites_array["category"]; ?></span></p>
                                    <p class="card-text text-muted"><?php echo $invites_array["emp_name"]; ?></p>
                                    <p class="card-text">Сообщение от работодателя:</p>
                                    <div class="card bg-light p-2">
                                        <p class="card-text"><?php echo nl2br($invites_array["answer_text"]); ?></p>
                                    </div>
                                    <div class="danger_status">
                                        <div class="mt-3 alert alert-success d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                                <use xlink:href="#check-circle-fill" />
                                            </svg>
                                            <div>
                                                Приглашение
                                            </div>
                                        </div>
                                    </div>
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