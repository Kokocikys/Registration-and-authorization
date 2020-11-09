<?php
session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();

if (isset($_POST['login'], $_POST['password'], $_POST['confirmPassword'], $_POST['email'], $_POST['name'])) {
    $errors = array();
    if (empty($_POST['login'])) {
        $errors['loginError'] = 'Вы не ввели логин!';
    }
    if (empty($_POST['password'])) {
        $errors['passwordError'] = 'Вы не ввели пароль!';
    }
    if (empty($_POST['confirmPassword'])) {
        $errors['confirmPasswordError'] = 'Вы не ввели пароль повторно!';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'Вы не ввели email!';
    }
    if (empty($_POST['name'])) {
        $errors['nameError'] = 'Вы не ввели имя!';
    }
    if (!count($errors)) {

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        if ($password == $confirmPassword) {
            $coincidence = simplexml_load_file('database.xml')->xpath("//user[login ='$login' or email = '$email']");
            if (!count($coincidence)) {
                $salt = 'ibverbich112';
                $password = $_POST['password'] . $salt;
                $password = sha1($password);

                $CREATE->createUser($login, $password, $email, $name);
            } else {
                $errors['uniquenessError'] = 'Пользователь с таким логином и/или почтой уже существует!';
                echo json_encode($errors);
            }
        } else {
            $errors['samePasswordError'] = 'Пароли не совпадают!';
            echo json_encode($errors);
        }
    } else echo json_encode($errors);
}