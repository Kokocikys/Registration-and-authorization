// window.onload = function () {
//     document.getElementById("login").onchange = validateLogin;
// }
// function validateLogin() {
//     let login = document.getElementById("login");
//     if (login.value != '') login.setCustomValidity("Логин ");
//     else login.setCustomValidity('');
// }
//document.getElementById("email").setCustomValidity('Email должен содержать @!');
//document.getElementById("name").setCustomValidity('Имя не должно быть короче 2 символов!');

//Сравнение паролей
window.onload = function () {
    document.getElementById("password").onchange = validatePassword;
    document.getElementById("confirmPassword").onchange = validatePassword;
}
function validatePassword() {
    let password = document.getElementById("password");
    let confirmPassword = document.getElementById("confirmPassword");
    if (password.value !== confirmPassword.value) confirmPassword.setCustomValidity("Пароли не совпадают");
    else confirmPassword.setCustomValidity('');
}