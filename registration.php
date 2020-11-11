<?php
session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();

if (isset($_POST['login'], $_POST['password'], $_POST['confirmPassword'], $_POST['email'], $_POST['name'])) {
    $errors = array();

    if (empty($_POST['login'])) {
        $errors['loginError'] = 'Вы не ввели логин!';
    } else {
        if (!preg_match("/^[A-Za-z0-9]{6,}/", $_POST["login"])) {
            $errors['loginError'] = "Логин должен состоять минимум из 6 символов, допустимы только из буквы и цифры!";
        }
    }

    if (empty($_POST['password'])) {
        $errors['passwordError'] = 'Вы не ввели пароль!';
    } else {
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}/", $_POST["password"])) {
            $errors['passwordError'] = "Пароль должен состоять минимум из 6 символов, содержать цифру, буквы в разных регистрах и специальный символ!";
        }
    }

    if (empty($_POST['confirmPassword'])) {
        $errors['confirmPasswordError'] = 'Вы не ввели пароль повторно!';
    } else {
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}/", $_POST["confirmPassword"])) {
            $errors['confirmPasswordError'] = "Пароль должен состоять минимум из 6 символов, содержать цифру, буквы в разных регистрах и специальный символ!";
        }
    }

    if (empty($_POST['email'])) {
        $errors['emailError'] = 'Вы не ввели email!';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['emailError'] = "Неверный формат email!";
        }
    }

    if (empty($_POST['name'])) {
        $errors['nameError'] = 'Вы не ввели имя!';
    } else {
        if (!preg_match("/[A-Za-zА-Яа-яЁё0-9]{2,}/", $_POST["name"])) {
            $errors['nameError'] = "Имя должно состоять минимум из 2 символов, допустимы только из буквы и цифры!";
        }
    }

    if (empty($errors)) {
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        if ($password == $confirmPassword) {
            $coincidence = simplexml_load_file('database.xml')->xpath("//user[login ='$login' or email = '$email']");
            if (empty($coincidence)) {
                $salt = 'ibverbich112';
                $password = $_POST['password'] . $salt;
                $password = sha1($password);
                $CREATE->createUser($login, $password, $email, $name);
                echo json_encode($errors);
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