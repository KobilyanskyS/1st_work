<?php session_start(); ?>
<?php if (isset($_SESSION['user']) && $_SESSION['user_group'] == "employer") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Создать вакансию</title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.6.0.min.js"></script>
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
        <?php include 'employer_header.php'; ?>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Создать вакансию</h2>
                        <div class="mt-4 form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Должность</label>
                                <input type="text" class="form-control" id="name" onchange="classList.remove('is-invalid')" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Сфера</label>
                                <select class="form-select form-select-sm" id="sphere" name="sphere">
                                    <option value="Системное администрирование">Системное администрирование</option>
                                    <option value="Разработка сайтов">Разработка сайтов</option>
                                    <option value="Сетевое администрирование">Сетевое администрирование</option>
                                    <option value="Разработка iOS приложений">Разработка iOS приложений</option>
                                    <option value="Разработка Android приложений">Разработка Android приложений</option>
                                    <option value="Другое" selected>Другое</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Зарплата</label>
                                <input type="text" class="form-control" id="salary" onchange="classList.remove('is-invalid')" name="salary">
                                <label for="salary" class="form-label">Валюта</label>
                                <select type="text" class="form-select form-select-sm" id="currency" onchange="classList.remove('is-invalid')" name="currency">
                                    <option value="₽">Рубль</option>
                                    <option value="$">Доллар</option>
                                    <option value="€">Евро</option>
                                    <option value="" selected>Не определено</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Краткое описание</label>
                                <textarea class="form-control" id="description" onchange="classList.remove('is-invalid')" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="full_description" class="form-label">Полное описание</label>
                                <textarea class="form-control" id="full_description" onchange="classList.remove('is-invalid')" name="full_description" cols="30" rows="5"></textarea>
                            </div>
                            <button type="submit" id="submitBtn" class="btn btn-primary">Разместить вакансию</button>
                        </div>
                        <div class="vacancy_success">
                            <div class="mt-3 alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    Вакансия успешно опубликована!
                                </div>
                            </div>
                        </div>
                        <div class="vacancy_warning">
                            <div class="mt-3 alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    Все поля должны быть заполнены
                                </div>
                            </div>
                        </div>
                        <div class="vacancy_unknown_warning">
                            <div class="mt-3 alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    Непредвиденная ошибка
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.html'; ?>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script>
            let showPassword = document.querySelectorAll('.password-checkbox');
            showPassword.forEach(item =>
                item.addEventListener('click', toggleType)
            );

            function toggleType() {
                let input = document.getElementById('password');
                let input_confirm = document.getElementById('password_confirm');

                if (input.type == 'password') {
                    input.type = 'text';
                } else {
                    input.type = 'password';
                }
                if (input_confirm.type == 'password') {
                    input_confirm.type = 'text';
                } else {
                    input_confirm.type = 'password';
                }
            }
        </script>
        <script src="js/createVacancyAjax.js"></script>
        <script src="js/createVacancy.js"></script>
    </body>

    </html>
<?php } else {
    header("location: index.php");
} ?>