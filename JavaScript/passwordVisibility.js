function visibility(checkbox) {
    let passwordType = document.getElementById('password');
    let confirmPasswordType = document.getElementById('confirmPassword');
    if (checkbox.checked) {
        passwordType.type = "text";
        if (confirmPasswordType != undefined) {
            confirmPasswordType.type = "text";
        }
    } else {
        passwordType.type = "password";
        if (confirmPasswordType != undefined) {
            confirmPasswordType.type = "password";
        }
    }
}