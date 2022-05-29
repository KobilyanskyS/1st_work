$(document).ready(function () {
    $("#submitBtn").click(function () {
        var companyNameValue = $('#company_name').val();
        var companyInnValue = $('#company_inn').val();
        var cityValue = $('#city').val();
        var contactNameValue = $('#contact_name').val();
        var contactSurnameValue = $('#contact_surname').val();
        var contactEmailValue = $('#contact_email').val();
        var contactPhoneValue = $('#contact_phone').val();
        var passwordValue = $('#password').val();
        var passwordConfirmValue = $('#password_confirm').val();

        $('#password').removeClass('is-invalid');
        $('#password_confirm').removeClass('is-invalid');

        if (passwordValue == passwordConfirmValue) {
            $.ajax({
                url: "employer_signup_handler.php",
                type: "POST",
                data: {
                    company_name: companyNameValue,
                    company_inn: companyInnValue,
                    city: cityValue,
                    contact_name: contactNameValue,
                    contact_surname: contactSurnameValue,
                    contact_email: contactEmailValue,
                    contact_phone: contactPhoneValue,
                    password: passwordValue
                },
                success: function (dataResult) {
                    console.log(dataResult);
                    if (dataResult == true) {
                        $("#submitBtn").html("Зарегистрироваться");
                        $(".password_warning").hide('slow');
                        $(".signup_warning").hide();
                        $(".signup_success").show('slow');
                        $('#password_confirm').val('');
                        window.location.replace("employer_profile.php");
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