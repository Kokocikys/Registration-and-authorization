<?php
session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();

if (isset($_POST['login'], $_POST['password'], $_POST['confirmPassword'], $_POST['email'], $_POST['name'])) {

    $errors = array();

    if (empty($_POST['login'])) {
        $errors['login'] = 'Вы не ввели логин!';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Вы не ввели пароль!';
    }
    if (empty($_POST['confirmPassword'])) {
        $errors['confirmPassword'] = 'Вы не ввели пароль повторно!';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Вы не ввели email!';
    }
    if (empty($_POST['name'])) {
        $errors['name'] = 'Вы не ввели имя!';
    }

    if (!count($errors)) {

        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        if ($password == $confirmPassword) {
            $coincidence = simplexml_load_file('database.xml')->xpath("//user[login ='$login' or email = '$email']");
            if (!count($coincidence)) {
                $salt = 'ibverbich112';
                $password = $_POST['password'] . $salt;
                $password = sha1($password);

                $CREATE->createUser($login, $password, $email, $name);
                header('Location: authorizationPage.php');
                exit();
            } else {
                $errors['uniqueness'] = 'Пользователь с таким логином и/или почтой уже существует!';
                header('Location: registrationPage.php');
            }
        } else {
            $errors['confirmPassword'] = 'Пароли не совпадают!';
            header('Location: registrationPage.php');
        }
    }
}