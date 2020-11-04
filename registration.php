<?php

if (isset($_POST['insert'])) {

    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    if ($password === $confirmPassword) {

        $salt = 'ibverbich112';
        $password = $_POST['password'] . $salt;
        $password = sha1($password);

        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('database.xml');

        $coincidence = simplexml_load_file('database.xml')->xpath("//user[login ='$login' or email = '$email']");

        if (count($coincidence) > 0) {
            $_SESSION['unUnique'] = 'Пользователь с таким логином и/или почтой уже существует!';
            header('Location: registrationPage.php');
        } else {
            $rootTag = $xml->getElementsByTagName("root")->item(0);

            $userTag = $xml->createElement("user");

            $loginTag = $xml->createElement("login", $login);
            $passwordTag = $xml->createElement("password", $password);
            $emailTag = $xml->createElement("email", $email);
            $nameTag = $xml->createElement("name", $name);

            $userTag->appendChild($loginTag);
            $userTag->appendChild($passwordTag);
            $userTag->appendChild($emailTag);
            $userTag->appendChild($nameTag);

            $rootTag->appendChild($userTag);

            $xml->save('database.xml');

            header('Location: authorizationPage.php');
        }
    } else {
        $_SESSION['massage'] = 'Пароли не совпадают!';
        header('Location: registrationPage.php');
    }
}