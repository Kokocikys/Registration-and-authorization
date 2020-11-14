<?php
session_start();
require_once 'CRUDTypeClass.php';
$CREATE = new CRUDTypeClass();

foreach($_POST as $key=>$item){
    $_POST[$key]= htmlspecialchars($item);  //mysql_real_escape_string
}

if (isset($_POST['login'], $_POST['password'])) {
    $errors = array();
    if (empty($_POST['login'])) {
        $errors['loginError'] = 'Вы не ввели логин!';
    }
    if (empty($_POST['password'])) {
        $errors['passwordError'] = 'Вы не ввели пароль!';
    }

    if (empty($errors)) {

        $login = $_POST['login'];
        $salt = 'ibverbich112';
        $password = $_POST['password'] . $salt;
        $password = sha1($password);

        $user = simplexml_load_file('database.xml')->xpath("//user[login ='$login' and password = '$password']");
        if (empty($user)) {
            $errors['signInError'] = 'Ошибка входа! Проверьте введенные данные!';
            echo json_encode($errors);
        } else {
            if (isset($_POST['rememberMe'])) {
               setcookie('login', $login, time() + 60 * 60 * 24 * 7, '/');
               setcookie('password', $_POST['password'], time() + 60 * 60 * 24 * 7, '/');
            }
            $CREATE->read($login);
            echo json_encode($errors);
        }
    } else echo json_encode($errors);
}