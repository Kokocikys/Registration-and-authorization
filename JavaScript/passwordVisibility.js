function visibility(checkbox) {
    let passwordType = document.getElementById('password');
    let confirmPasswordType = document.getElementById('confirmPassword');

    if (checkbox.checked) {
        passwordType.type = "text";
        confirmPasswordType.type = "text";

    } else {
        passwordType.type = "password";
        confirmPasswordType.type = "password";
    }
}