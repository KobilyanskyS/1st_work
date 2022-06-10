$(document).ready(function () {
    $("#submitBtn").click(function () {
        var nameValue = $('#name').val();
        var salaryValue = $('#salary').val();
        var currencyValue = $('#currency').val();
        var descriptionValue = $('#description').val();
        var fullDescriptionValue = $('#full_description').val();
        var sphereValue = $('#sphere').val();


        if (nameValue != "" && salaryValue != "" && descriptionValue != "" && fullDescriptionValue != "") {
            $.ajax({
                url: "create_vacancy_handler.php",
                type: "POST",
                data: {
                    name: nameValue,
                    salary: salaryValue,
                    currency: currencyValue,
                    description: descriptionValue,
                    full_description: fullDescriptionValue,
                    category: sphereValue
                },
                success: function (dataResult) {
                    console.log(dataResult);
                    if (dataResult == true) {
                        $("#submitBtn").html("Зарегистрироваться");
                        $(".vacancy_warning").hide('slow');
                        $(".vacancy_success").show();
                        $('#name').val('');
                        $('#salary').val('');
                        $('#description').val('');
                        $('#full_description').val('');
                        window.location.replace("employer_profile.php");
                        $("#submitBtn").html("Разместить вакансию");
                    }
                    if (dataResult == false) {
                        $(".vacancy_unknown_warning").show();
                    }
                }
            });
        } else {
            $("#submitBtn").html("Разместить вакансию");
            $(".vacancy_warning").show();
            setTimeout(function () {
                $(".vacancy_warning").hide('slow');
            }, 3000);
        }
    });
});