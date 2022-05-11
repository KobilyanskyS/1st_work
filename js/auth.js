let emailInput = document.getElementById("loginEmail");
let passwordInput = document.getElementById("loginPassword");
let logBtn = document.getElementById('loginBtn');

emailInput.addEventListener('input', () => { emailInput.classList.remove('is-invalid'); });
passwordInput.addEventListener('input', () => { passwordInput.classList.remove('is-invalid'); });
logBtn.addEventListener("click", loadAuth);

function loadAuth() {
    logBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Вход...';
    emailInput.classList.remove('is-invalid');
    passwordInput.classList.remove('is-invalid');
}