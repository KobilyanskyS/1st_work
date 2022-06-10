$(document).ready(function () {
    $("#changePass").click(function () {
        var lastPassValue = $('#password_last').val();
        var newPassValue = $('#password_new').val();
        var newPassConfirmValue = $('#password_new_confirm').val();

        $('#password_last').removeClass('is-invalid');
        $('#password_new').removeClass('is-invalid');
        $('#password_new_confirm').removeClass('is-invalid');

        if (newPassValue == newPassConfirmValue) {
            $.ajax({
                url: "employer_change-password_handler.php",
                type: "POST",
                data: {
                    password_last: lastPassValue,
                    password_new: newPassValue
                },
                success: function (dataResult) {
                    console.log(dataResult);
                    if (dataResult == true) {
                        $("#submitBtn").html("Изменить");
                        
                        $('#password_new').val('');
                        $('#password_new_confirm').val('');
                        $('#password_last').val('');

                        $(".warning_pass_change").hide('slow');
                        $(".warning_last_pass_change").hide('slow');
                        $(".success_pass_change").show('slow');
                        setTimeout(function () {
                            $(".success_pass_change").hide('slow');
                        }, 4000);


                        $("#changePass").html("Изменить пароль");
                    }
                    if (dataResult == false) {
                        $("#changePass").html("Изменить пароль");
                        $(".warning_pass_change").hide('slow');
                        $(".warning_last_pass_change").show('slow');
                        $('#password_last').addClass('is-invalid');
                    }
                }
            });
        } else {
            $("#changePass").html("Изменить пароль");
            $(".warning_pass_change").show('slow');
            setTimeout(function () {
                $(".warning_pass_change").hide('slow');
            }, 4000);
            $('#password_new').addClass('is-invalid');
            $('#password_new_confirm').addClass('is-invalid');
        }
    });
});