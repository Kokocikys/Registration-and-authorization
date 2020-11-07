<?php

class CRUD

{
    public function createUser($login, $password, $email, $name)
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('database.xml');

        $usersTag = $xml->getElementsByTagName("users")->item(0);

        $userTag = $xml->createElement("user");
        $userTag->setAttribute('id', $xml->getElementsByTagName('user')->length);

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

    public function read($login)
    {
        $read = simplexml_load_file('database.xml')->xpath("//user[login ='$login']");
        foreach ($read as $item) {
            $userDataArray = [
                $item->login->__toString(),
                $item->password->__toString(),
                $item->email->__toString(),
                $item->name->__toString()];
            return $_SESSION['userData'] = $userDataArray;
        }
    }

    public function update($oldLogin, $newLogin, $newPassword, $newEmail, $newName) //должна быть еще одна форма в кабинете юзера, которая будет отправлять измененные данные
    {
        $update = simplexml_load_file('database.xml')->xpath("//user[login ='$oldLogin']");
        foreach ($update as $item) {
            $item->login = $newLogin;
            $item->password = $newPassword;
            $item->email = $newEmail;
            $item->name = $newName;
            $update->asXML('database.xml');
        }
    }

    public function delete($login)
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('database.xml');

        $xpath = new DOMXpath($xml);

        $nodeList = $xpath->query("//user[login ='$login']", $xml->documentElement);
        foreach ($nodeList as $dataNode) {
            if ($dataNode->parentNode === null) {
                continue;
            }
            $dataNode->parentNode->removeChild($dataNode);
            $xml->save('database.xml');
        }
    }
}
