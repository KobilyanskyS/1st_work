$(document).ready(function () {
    $('.send-btn').on('click', function () {
        var nameValue = $('#name').val();
        var surnameValue = $('#surname').val();
        var emailValue = $('#email').val();
        var phoneValue = $('#phone').val();
        var educationValue = $('#education').val();
        var dateOfEndValue = $('#date_of_end').val();
        var universityValue = $('#university').val();
        var specialisationValue = $('#specialisation').val();
        var skillsValue = $('#main_skills').val();
        var qualitiesValue = $('#qualities').val();
        var certificatesValue = $('#certificates').val();
        var portfolioValue = $('#portfolio').val();
        var gitHubValue = $('#github').val();
        var otherInformationValue = $('#other_information').val();

        $.ajax({
            method: "POST",
            url: "change-handler.php",
            data: {
                name: nameValue,
                surname: surnameValue,
                email: emailValue,
                phone: phoneValue,
                education: educationValue,
                date_of_end: dateOfEndValue,
                university: universityValue,
                specialisation: specialisationValue,
                skills: skillsValue,
                qualities: qualitiesValue,
                certificates: certificatesValue,
                portfolio: portfolioValue,
                github: gitHubValue,
                other_information: otherInformationValue,
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