<?php

if (isset($_POST['insert'])) {

    $login = $_POST['login'];
    $salt = 'ibverbich112';
    $password = $_POST['password'].$salt;
    $password = sha1($password);
    $email = $_POST['email'];
    $name = $_POST['name'];

    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('database.xml');

    $users = simplexml_load_file('database.xml');

    $coincidence = $users->xpath("//user[login ='$login' or email = '$email']");
        if (count($coincidence) > 0 ) {
            echo 'Пользователь с таким логином или почтой уже существует!';
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
        }
}