let input = document.getElementById("email");
input.addEventListener('input', () => { input.classList.remove('is-invalid'); });

let signupBtn = document.getElementById("submitBtn");

signupBtn.addEventListener("click", signUp);

function signUp() {
    signupBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Регистрация...';
}