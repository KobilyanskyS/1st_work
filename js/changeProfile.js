let stopBtn = document.getElementById("stop-btn");
let sendBtn = document.getElementById("send-btn");
let changeBtn = document.getElementById("change-btn");

changeBtn.addEventListener("click", undisableFieldset);
stopBtn.addEventListener("click", disableField);
sendBtn.addEventListener("click", sendData);

function sendData() {
    sendBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Изменение...';
    changeBtn.classList.add('remove');
    stopBtn.classList.remove('active');
}

function disableField() {
    document.getElementById("fieldset").disabled = true;
    changeBtn.classList.remove('remove');
    sendBtn.classList.remove('active');
    stopBtn.classList.remove('active');
}

function undisableFieldset() {
    document.getElementById("fieldset").disabled = false;
    stopBtn.classList.add('active');
    sendBtn.classList.add('active');
    changeBtn.classList.add('remove');
}