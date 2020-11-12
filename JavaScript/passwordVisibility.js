function visibility(checkbox) {
    let passwordType = document.getElementById('password');
    if (checkbox.checked) {
        passwordType.type = "text";
    } else {
        passwordType.type = "password";
    }
}