$(document).ready(function () {
    $('.send-btn').on('click', function () {
        var nameValue = $('#name').val();
        var surnameValue = $('#surname').val();
        var emailValue = $('#email').val();
        var phoneValue = $('#phone').val();

        $.ajax({
            method: "POST",
            url: "employer-change-handler.php",
            data: {
                name: nameValue,
                surname: surnameValue,
                email: emailValue,
                phone: phoneValue,
            }
        }).done(function (dataResult) {
            $(".session_name").html(dataResult);
            $(".success").show('slow');
            setTimeout(function () {
                $(".success").hide('slow');
            }, 3000);
            sendBtn.classList.remove('active')
            sendBtn.innerHTML = 'Подтвердить'
            disableField();
        });
    })
});