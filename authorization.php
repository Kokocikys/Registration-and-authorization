<?php
session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();

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
            $CREATE->read($login);
            echo json_encode($errors);
        }
    } else echo json_encode($errors);
}