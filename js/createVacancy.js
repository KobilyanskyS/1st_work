let createVacancyBtn = document.getElementById("submitBtn");

createVacancyBtn.addEventListener("click", signUp);

function signUp() {
    createVacancyBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Размещение вакансии...';
}