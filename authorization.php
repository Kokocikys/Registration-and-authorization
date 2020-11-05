<?php
session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();

if (isset($_POST['login'], $_POST['password'])) {

    $errors = array();
    if (empty($_POST['login'])) {
        $errors['login'] = 'Вы не ввели логин!';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Вы не ввели пароль!';
    }

    if (!count($errors)) {

        $login = $_POST['login'];

        $salt = 'ibverbich112';
        $password = $_POST['password'] . $salt;
        $password = sha1($password);

        $user = simplexml_load_file('database.xml')->xpath("//user[login ='$login' and password = '$password']");

        if (!count($user)) {
            $errors['signInError'] = 'Ошибка входа! Проверьте введенные данные!';
            header('Location: authorizationPage.php');
        } else {
//            $CREATE->update($login);
//            header('Location: userPage.php');
            $CREATE->delete();
        }
    }
}
