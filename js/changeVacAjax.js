$(document).ready(function () {
    $('.send-btn').on('click', function () {
        var nameValue = $('#name').val();
        var vacIdValue = $('#vac_id').val();
        var salaryValue = $('#salary').val();
        var currencyValue = $('#currency').val();
        var descriptionValue = $('#description').val();
        var fullDescriptionValue = $('#full_description').val();

        $.ajax({
            method: "POST",
            url: "change_vacancy_handler.php",
            data: {
                name: nameValue,
                vac_id: vacIdValue,
                salary: salaryValue,
                currency: currencyValue,
                description: descriptionValue,
                full_description: fullDescriptionValue,
            }
        }).done(function () {
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