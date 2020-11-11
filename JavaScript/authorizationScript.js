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
                if (data.length != 0) {
                    data.loginError ? ($('#loginLabel').text('').text(data.loginError).addClass('errorAlert')) : $('#loginLabel').text('Введите логин').removeClass('errorAlert');
                    data.passwordError ? ($('#passwordLabel').text('').text(data.passwordError).addClass('errorAlert')) : $('#passwordLabel').text('Введите пароль').removeClass('errorAlert');
                    data.signInError ? $('#signInError').text(data.signInError) : $('#signInError').text('');
                } else {
                    window.location.href = 'userPage.php';
                }
            }
        })
    })
})