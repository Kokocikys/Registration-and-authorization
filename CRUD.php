<?php

class CRUD

{
    public function createUser($login, $password, $email, $name)
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('database.xml');

        $usersTag = $xml->getElementsByTagName("users")->item(0);

        $userTag = $xml->createElement("user");

        $loginTag = $xml->createElement("login", $login);
        $passwordTag = $xml->createElement("password", $password);
        $emailTag = $xml->createElement("email", $email);
        $nameTag = $xml->createElement("name", $name);

        $userTag->appendChild($loginTag);
        $userTag->appendChild($passwordTag);
        $userTag->appendChild($emailTag);
        $userTag->appendChild($nameTag);

        $usersTag->appendChild($userTag);

        $xml->save('database.xml');
    }

    public function read()
    {
        $users = simplexml_load_file('database.xml');
        $users->asXML();
        foreach ($users->user as $item) {
            $login = $item->login;
            $password = $item->password;
            $email = $item->email;
            $name = $item->name;
            echo $login . ', ' . $password . ', ' . $email . ', ' . $name . '<br>';
        }
    }

    public function update($login)
    {
        $coincidence = simplexml_load_file('database.xml')->xpath("//user[login ='$login']");
        foreach ($coincidence as $item) {
            $userDataArray = [
                $login = $item->login->asXML(),
                $password = $item->password->asXML(),
                $email = $item->email->asXML(),
                $name = $item->name->asXML()];
            $_SESSION['userData'] = $userDataArray;
            return $_SESSION;
        }
    }
}
