$(document).ready(function () {
    $("#sendWaiverBtn").click(
        function () {
            $("#sendWaiverBtn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Отправка...');
            var fbIdValue = $('#fb_id').val();
            var answerValue = "Отказ";
            var WaiverMessageValue = $('#waiver_message').val();

            $.ajax({
                url: "feedback_invite_handler.php",
                type: "GET",
                data: {
                    fb_id: fbIdValue,
                    answer: answerValue,
                    answer_text: WaiverMessageValue
                },
                success: function () {
                    getStatus(fbIdValue);
                    // var waiverModal = new bootstrap.Modal(document.getElementById('waivermodal'), {
                    //     keyboard: false
                    // })
                    // waiverModal.hide();
                    $('#waivermodal').modal("hide");
                    $("#sendWaiverBtn").html("Сообщение отправлено");
                    $(".waiver_success").addClass('active');
                }
            });
        });
});