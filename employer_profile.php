<?php
session_start();

if (isset($_SESSION['email'])) {
    include('database.php');

    $current_user = $_SESSION['email'];
    $query = "SELECT * FROM employers WHERE email = '$current_user'";
    $send_query = mysqli_query($conn, $query);
    $user_array = mysqli_fetch_array($send_query);
    $name = $user_array['contact_name'];
    $surname = $user_array['contact_surname'];
    $email = $user_array['email'];
    $phone = $user_array['phone'];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_SESSION['user'];?></title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <?php include 'employer_header.php'; ?>

        <section class="content">
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
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-lg-6">
                        <fieldset id="fieldset" disabled>
                            <table class="w-100">
                                <tr>
                                    <td class="w-25"><label class="form-label">Имя</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="name" class="form-control" name="name" value="<?php echo $name; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label class="form-label">Фамилия</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="surname" class="form-control" name="surname" value="<?php echo $surname; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label class="form-label">Email</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="email" id="email" class="form-control" name="email" value="<?php echo $email; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label class="form-label">Номер телефона</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="phone" class="form-control" name="phone" value="<?php echo $phone; ?>"></td>
                                </tr>
                            </table>
                        </fieldset>
                        <button type="button" id="change-btn" class="btn btn-primary change-btn">Изменить данные</button>
                        <button type="button" id="stop-btn" class="btn btn-secondary stop-btn">Отмена</button>
                        <button type="submit" id="send-btn" class="btn btn-success send-btn">Подтвердить</button>
                        <div class="success">
                            <div class="mt-3 alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    Данные успешно изменены!
                                </div>
                            </div>
                        </div>
                        <div class="mt-2"><a href="employer_change_password.php">Изменить пароль</a></div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <h2>Ваши вакансии</h2>
            </div>
            <div class="container" id="target-content">
                <?php
                $_monthsList = array(
                    1 => "января",
                    2 => "февраля",
                    3 => "марта",
                    4 => "апреля",
                    5 => "мая",
                    6 => "июня",
                    7 => "июля",
                    8 => "августа",
                    9 => "сентября",
                    10 => "октября",
                    11 => "ноября",
                    12 => "декабря"
                  );
                $employer = $_SESSION['user'];
                $select_vacancies = "SELECT v.id vac_id, v.name as vacancy_name, v.category, v.salary, v.currency, v.description, emp.id as emp_id, emp.name, MONTH(v.create_time) as month, DAYOFMONTH(v.create_time) as day, TIME_FORMAT(v.create_time, '%k:%i') as time FROM vacancies v LEFT JOIN employers emp ON v.employer_id = emp.id WHERE emp.name = '$employer' ORDER BY v.create_time DESC";
                $vacancies_query = mysqli_query($conn, $select_vacancies);
                while ($vacancies_array = mysqli_fetch_array($vacancies_query)) {
                ?>
                    <div class="card w-100 mb-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $vacancies_array["vacancy_name"]; ?></h5>
                            <p class="card-text text-primary"><?php echo $vacancies_array["salary"].' '.$vacancies_array["currency"]; ?></p>
                            <p class="card-text"><?php echo $vacancies_array["description"]; ?></p>
                            <p class="card-text text-muted"><?php echo $vacancies_array["name"]; ?></p>
                            <p class="card-text">Размещено <span class="text-muted"><?php echo $vacancies_array["day"].' '.$_monthsList[$vacancies_array["month"]]." в ".$vacancies_array["time"]; ?></span></p>
                            <p class="card-text">Сфера деятельности: <span class="text-muted"><?php echo $vacancies_array["category"]; ?></span></p>
                            <a href="change_vacancy.php?vac_id=<?php echo $vacancies_array["vac_id"];?>&emp_id=<?php echo $vacancies_array["emp_id"];?>" class="btn btn-outline-success">Изменить вакансию</a>
                        </div>
                    </div>
                <?php
                };
                ?>
            </div>
        </section>

        <?php include 'footer.html'; ?>

        <script src="js/changeProfile.js"></script>
        <script src="js/changeEmployerProfileAjax.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } else header("location: index.php"); ?>