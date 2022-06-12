<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['user_group'] == "student") {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Изменить пароль</title>
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
                    <div class="col-md-7 col-lg-6 col-sm-12">
                        <table>
                            <tr>
                                <td class="w-25"><label for="disabledTextInput" class="form-label">Введите старый пароль</label></td>
                                <td class="pt-3 pl-3 pb-3 w-50"><input type="password" id="password_last" class="form-control" name="password_last"></td>
                            </tr>
                            <tr>
                                <td class="w-25"><label for="disabledTextInput" class="form-label">Введите новый пароль</label></td>
                                <td class="pt-3 pl-3 pb-3 w-50"><input type="password" id="password_new" class="form-control" name="password"></td>
                            </tr>
                            <tr>
                                <td class="w-25"><label for="disabledTextInput" class="form-label">Подтвердите новый пароль</label></td>
                                <td class="pt-3 pl-3 pb-3 w-50"><input type="password" id="password_new_confirm" class="form-control" name="password_confirm"></td>
                            </tr>
                        </table>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input password-checkbox" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Показать пароли</label>
                        </div>
                        <button type="submit" id="changePass" class="btn btn-success pass-btn">Изменить пароль</button>
                        <div class="success_pass_change">
                            <div class="mt-3 alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    Пароль успешно изменён!
                                </div>
                            </div>
                        </div>
                        <div class="warning_pass_change">
                            <div class="mt-3 alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    Новые пароли не совпадают!
                                </div>
                            </div>
                        </div>
                        <div class="warning_last_pass_change">
                            <div class="mt-3 alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    Старый пароль неверен!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.html'; ?>

        <script>
            let input_new = document.getElementById('password_new');
            let input_confirm = document.getElementById('password_new_confirm');
            let input_last = document.getElementById('password_last');
            let changePassBtn = document.getElementById('changePass');
            let showPassword = document.querySelectorAll('.password-checkbox');
            
            changePassBtn.addEventListener("click", loadChangePass);

            showPassword.forEach(item =>
                item.addEventListener('click', toggleType)
            );

            function loadChangePass() {
                changePassBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Изменение...';
                input_last.classList.remove('is-invalid');
                input_new.classList.remove('is-invalid');
                input_confirm.classList.remove('is-invalid');
            }

            function toggleType() {

                if (input_new.type == 'password') {
                    input_new.type = 'text';
                } else {
                    input_new.type = 'password';
                }
                if (input_confirm.type == 'password') {
                    input_confirm.type = 'text';
                } else {
                    input_confirm.type = 'password';
                }
                if (input_last.type == 'password') {
                    input_last.type = 'text';
                } else {
                    input_last.type = 'password';
                }
            }
        </script>
        <script src="js/changePassAjax.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } else header("location: index.php"); ?>