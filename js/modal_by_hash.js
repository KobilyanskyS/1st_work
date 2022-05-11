let myModal = new bootstrap.Modal(document.getElementById('loginmodal'), {
    keyboard: false
});
if (window.location.hash === '#loginmodal') {
    myModal.show()
};