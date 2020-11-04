<?php

if (isset($_POST['insert'])) {

    session_start();

    $login = $_POST['login'];
    $salt = 'ibverbich112';
    $password = $_POST['password'] . $salt;
    $password = sha1($password);

    $user = simplexml_load_file('database.xml')->xpath("//user[login ='$login' and password = '$password']");

    if (count($user) > 0) {
        $_SESSION['login'] = $login;
        header('Location: userPage.php');
    } else {
        $_SESSION['signInError'] = 'Ошибка входа! Проверьте введенные данные!';
        header('Location: authorizationPage.php');
    }
}
