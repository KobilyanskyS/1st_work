const box = document.querySelector("#target-content");
box.addEventListener("click", function (e) {
    let targetItem = e.target;
    if (targetItem.closest(".feedback-btn")) {
        targetItem.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Отклик...'
        let req = targetItem.dataset.req
        $.ajax({
            url: 'feedback-handler.php',
            type: 'POST',
            data: {
                feedback: req
            },
            success: function (dataResult) {
                if (dataResult == 1) {
                    targetItem.innerHTML = "Вы откликнулись"
                    targetItem.disabled = true;
                } else if (dataResult == 2) {
                    targetItem.innerHTML = "Откликнуться"
                    myModal.show()
                } else if (dataResult == 0) {
                    targetItem.innerHTML = "Откликнуться"
                    alert("Вы работодатель")
                }
            }
        })
    }
})