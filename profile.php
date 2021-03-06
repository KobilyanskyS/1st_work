<?php
session_start();

if (isset($_SESSION['email']) && $_SESSION['user_group'] == "student") {
    include('database.php');

    $current_user = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$current_user'";
    $send_query = mysqli_query($conn, $query);
    $user_array = mysqli_fetch_array($send_query);
    $name = $user_array['name'];
    $surname = $user_array['surname'];
    $email = $user_array['email'];
    $phone = $user_array['phone'];
    $education = $user_array['education'];
    $university = $user_array['university'];
    $date_of_end = $user_array['date_of_end'];
    $specialisation = $user_array['specialisation'];
    $main_skills = $user_array['skills'];
    $qualities = $user_array['qualities'];
    $certificates = $user_array['certificates'];
    $portfolio = $user_array['portfolio'];
    $github = $user_array['github'];
    $other_information = $user_array['other_information'];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Регистрация</title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <?php include 'header.php'; ?>

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
                    <div class="col-md-7 col-sm-12 col-lg-9">
                        <fieldset id="fieldset" disabled>
                            <table class="w-100">
                                <tr>
                                    <td>
                                        <h4>Основная информация</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Имя</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="name" class="form-control" name="name" value="<?php echo $name; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Фамилия</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="surname" class="form-control" name="surname" value="<?php echo $surname; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Email</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="email" id="email" class="form-control" name="email" value="<?php echo $email; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Номер телефона</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="phone" class="form-control" name="phone" value="<?php echo $phone; ?>"></td>
                                </tr>
                                <tr class="pt-3 pb-3">
                                    <td>
                                        <h4 class="">Образование</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Образование</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="education" class="form-control" name="education" value="<?php echo $education; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">ВУЗ</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="university" class="form-control" name="university" value="<?php echo $university; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Дата окончания</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="date" id="date_of_end" class="form-control" name="date_of_end" value="<?php echo $date_of_end; ?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Навыки и качества</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Специализация</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="specialisation" class="form-control" name="specialisation" value="<?php echo $specialisation; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Основные навыки</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50">
                                        <textarea class="form-control" name="main_skills" id="main_skills" cols="30" rows="5"><?php echo $main_skills; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Личные качества</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50">
                                        <textarea class="form-control" name="qualities" id="qualities" cols="30" rows="5"><?php echo $qualities; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Дополнительная информация</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Сертификаты (добавьте ссылку на папку с вашими сертификатами из облачного хранилища)</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="certificates" class="form-control" name="certificates" value="<?php echo $certificates; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Ваше портфолио (добавьте ссылку на ваше портфолио)</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="portfolio" class="form-control" name="portfolio" value="<?php echo $portfolio; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Ссылка на профиль GitHub (при наличии)</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50"><input type="text" id="github" class="form-control" name="github" value="<?php echo $github; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="w-25"><label for="disabledTextInput" class="form-label">Прочая информация</label></td>
                                    <td class="pt-3 pl-3 pb-3 w-50">
                                        <textarea class="form-control" name="other_information" id="other_information" cols="30" rows="5"><?php echo $other_information; ?></textarea>
                                    </td>
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
                        <div class="mt-2"><a href="change-password.php">Изменить пароль</a></div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.html'; ?>

        <script src="js/changeProfile.js"></script>
        <script src="js/changeProfileAjax.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } else header("location: index.php"); ?>