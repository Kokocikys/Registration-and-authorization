$(document).ready(function () {
    $('#registration').click(function (event) {
        let login = $('#login').val();
        let password = $('#password').val();
        let confirmPassword = $('#confirmPassword').val();
        let email = $('#email').val();
        let name = $('#name').val();
        event.preventDefault();
        $.ajax({
            url: 'registration.php',
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
                if (data != 'success') {
                    if (data === undefined) {
                        window.location.href = 'authorizationPage.php';
                    } else {
                        data.loginError ? $('#loginError').text(data.loginError) : $('#loginError').text('');
                        data.passwordError ? $('#passwordError').text(data.passwordError) : $('#passwordError').text('');
                        data.confirmPasswordError ? $('#confirmPasswordError').text(data.confirmPasswordError) : $('#confirmPasswordError').text('');
                        data.emailError ? $('#emailError').text(data.emailError) : $('#emailError').text('');
                        data.nameError ? $('#nameError').text(data.nameError) : $('#nameError').text('');
                        data.uniquenessError ? $('#uniquenessError').text(data.uniquenessError) : $('#uniquenessError').text('');
                        data.samePasswordError ? $('#samePasswordError').text(data.samePasswordError) : $('#samePasswordError').text('');
                    }
                }
            }
        })
    })
})