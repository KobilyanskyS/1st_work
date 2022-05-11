$(document).ready(function () {
    $("#submitBtn").click(function () {
        var nameValue = $('#name').val();
        var surnameValue = $('#surname').val();
        var emailValue = $('#email').val();
        var passwordValue = $('#password').val();
        var passwordConfirmValue = $('#password_confirm').val();

        $('#password').removeClass('is-invalid');
        $('#password_confirm').removeClass('is-invalid');

        if (passwordValue == passwordConfirmValue) {
            $.ajax({
                url: "signup-handler.php",
                type: "POST",
                data: {
                    name: nameValue,
                    surname: surnameValue,
                    email: emailValue,
                    password: passwordValue
                },
                success: function (dataResult) {
                    console.log(dataResult);
                    if (dataResult == true) {
                        $("#submitBtn").html("Зарегистрироваться");
                        $(".password_warning").hide('slow');
                        $(".signup_warning").hide();
                        $(".signup_success").show('slow');
                        $('#name').val('');
                        $('#surname').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#password_confirm').val('');
                        window.location.replace("profile.php");
                        sendBtn.innerHTML = 'Подтвердить'
                    }
                    if (dataResult == false) {
                        $("#submitBtn").html("Зарегистрироваться");
                        $(".signup_warning").show('slow');
                        setTimeout(function () {
                            $(".signup_warning").hide('slow');
                        }, 3000);
                        $('#email').addClass('is-invalid');
                    }
                }
            });
        } else {
            $("#submitBtn").html("Зарегистрироваться");
            $(".password_warning").show('slow');
            setTimeout(function () {
                $(".signup_warning").hide('slow');
            }, 3000);
            $('#password').addClass('is-invalid');
            $('#password_confirm').addClass('is-invalid');
        }
    });
});