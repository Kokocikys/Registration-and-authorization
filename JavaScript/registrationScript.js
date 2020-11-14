$(document).ready(function () {
    $('#registration').click(function (event) {
        let login = $('#login').val();
        let password = $('#password').val();
        let confirmPassword = $('#confirmPassword').val();
        let email = $('#email').val();
        let name = $('#name').val();
        event.preventDefault();
        $.ajax({
            url: '/phpFunctionsAndXML/registration.php',
            cache: false,
            method: 'POST',
            data: {
                'login': login,
                'password': password,
                'confirmPassword': confirmPassword,
                'email': email,
                'name': name
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.length != 0) {
                    data.loginError ? ($('#loginLabel').text('').text(data.loginError).addClass('errorAlert')) : $('#loginLabel').text('Введите логин').removeClass('errorAlert');
                    data.passwordError ? ($('#passwordLabel').text('').text(data.passwordError).addClass('errorAlert')) : $('#passwordLabel').text('Введите пароль').removeClass('errorAlert');
                    data.confirmPasswordError ? ($('#confirmPasswordLabel').text('').text(data.confirmPasswordError).addClass('errorAlert')) : $('#confirmPasswordLabel').text('Подтвердите пароль').removeClass('errorAlert');
                    data.emailError ? ($('#emailLabel').text('').text(data.emailError).addClass('errorAlert')) : $('#emailLabel').text('Введите email').removeClass('errorAlert');
                    data.nameError ? ($('#nameLabel').text('').text(data.nameError).addClass('errorAlert')) : $('#nameLabel').text('Введите Ваше имя').removeClass('errorAlert');
                    data.uniquenessError ? $('#uniquenessError').text(data.uniquenessError) : $('#uniquenessError').text('');
                    data.samePasswordError ? $('#samePasswordError').text(data.samePasswordError) : $('#samePasswordError').text('');
                } else {
                    window.location.href = 'authorizationPage.php';
                }
            }
        })
    })
})