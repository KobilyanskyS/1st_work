$(document).ready(function () {
    $("#loginBtn").click(function () {
        var emailValue = $('#loginEmail').val();
        var passwordValue = $('#loginPassword').val();
        $.ajax({
            url: "auth-employer.php",
            type: "POST",
            data: {
                email: emailValue,
                password: passwordValue
            },
            success: function (dataResult) {
                console.log(dataResult);
                if (dataResult == true) {
                    $("#loginBtn").html("Войти");
                    $(".login_success").show();
                    $('#loginEmail').val('');
                    $('#loginPassword').val('');
                    window.location.replace("index.php");
                }
                else {
                    $("#loginBtn").html("Войти");
                    $(".login_warning").show('slow');
                    setTimeout(function () {
                        $(".login_warning").hide('slow');
                    }, 3000);
                    $('#loginEmail').addClass('is-invalid');
                    $('#loginPassword').addClass('is-invalid');
                }
            }
        });
    });
});