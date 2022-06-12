$(document).ready(function () {
    $("#sendInviteBtn").click(
        function () {
            $("#sendInviteBtn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Отправка...');
            var fbIdValue = $('#fb_id').val();
            var answerValue = "Приглашение";
            var inviteMessageValue = $('#invite_message').val();

            $.ajax({
                url: "feedback_invite_handler.php",
                type: "GET",
                data: {
                    fb_id: fbIdValue,
                    answer: answerValue,
                    answer_text: inviteMessageValue
                },
                success: function () {
                    getStatus(fbIdValue);
                    $('#invitemodal').modal("hide");
                    $("#sendInviteBtn").html("Сообщение отправлено");
                    $(".invite_success").addClass('active');
                }
            });
        });
});