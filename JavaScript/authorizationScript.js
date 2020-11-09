$(document).ready(function () {
    $('#authorization').click(function (event) {
        let login = $('#login').val();
        let password = $('#password').val();
        event.preventDefault();
        $.ajax({
            url: 'authorization.php',
            method: 'POST',
            data: {
                'login': login,
                'password': password
            },
            dataType: 'JSON',
            success: function (data) {
                if (data != 'success') {
                    if (data === undefined) {
                        window.location.href = 'userPage.php';
                    } else {
                        data.loginError ? $('#loginError').text(data.loginError) : $('#loginError').text('');
                        data.passwordError ? $('#passwordError').text(data.passwordError) : $('#passwordError').text('');
                        data.signInError ? $('#signInError').text(data.signInError) : $('#signInError').text('');
                    }
                }
            }
        })
    })
})