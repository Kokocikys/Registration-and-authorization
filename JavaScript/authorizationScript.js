$(document).ready(function () {
    $('#authorization').click(function (event) {
        let login = $('#login').val();
        let password = $('#password').val();
        event.preventDefault();
        console.log('0');
        $.ajax({
            url: 'authorization.php',
            method: 'POST',
            data: {
                'login': login,
                'password': password
            },
            dataType: 'JSON',
            success: function (data) {
                console.log('1');
                if (data.length != 0) {
                    console.log('2');
                    data.loginError ? $('#loginError').text(data.loginError) : $('#loginError').text('');
                    data.passwordError ? $('#passwordError').text(data.passwordError) : $('#passwordError').text('');
                    data.signInError ? $('#signInError').text(data.signInError) : $('#signInError').text('');
                } else {
                    console.log('3');
                    window.location.href = 'userPage.php';
                }
            }
        })
    })
})