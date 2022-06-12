function getStatus(id) {
    $.ajax(
        {
            url: "get_feedback_status.php",
            type: "GET",
            data: {
                fb_id: id
            },
            success: function (dataResult) {
                if (dataResult == '') {
                    $('#answerControls').show();
                    $('#statusSuccess').hide();
                    $('#statusWaiver').hide();
                } else if (dataResult == "Приглашение") {
                    $('#answerControls').hide();
                    $('#statusSuccess').show();
                    $('#statusWaiver').hide();
                } else if (dataResult == "Отказ") {
                    $('#answerControls').hide();
                    $('#statusSuccess').hide();
                    $('#statusWaiver').show();
                }
            }
        });
}
$(document).ready(function () {
    var fbIdValue = $('#fb_id').val();
    getStatus(fbIdValue)
});