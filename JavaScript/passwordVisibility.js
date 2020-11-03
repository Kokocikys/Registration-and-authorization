function showOrHide() {
    let passwordType = document.getElementById('password');
    let confirmPasswordType = document.getElementById('confirmPassword');
    if (passwordType.type === "password") {
        passwordType.type = "text";
        confirmPasswordType.type = "text";
    } else {
        passwordType.type = "password";
        confirmPasswordType.type = "password";
    }
}