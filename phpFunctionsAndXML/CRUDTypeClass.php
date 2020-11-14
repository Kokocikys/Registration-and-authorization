<?php

class CRUDTypeClass
{
    static $xmlDatabaseURL = 'database.xml';

    public function createUser($login, $password, $email, $name)
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load(self::$xmlDatabaseURL);

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

        $xml->save(self::$xmlDatabaseURL);
    }

    public function read($login)
    {
        $read = simplexml_load_file(self::$xmlDatabaseURL)->xpath("//user[login ='$login']");
        foreach ($read as $item) {
            $userDataArray = [
                $item->login->__toString(),
                $item->password->__toString(),
                $item->email->__toString(),
                $item->name->__toString()];
        }
        return $_SESSION['userData'] = $userDataArray;
    }

    public function update($oldLogin, $newLogin, $newPassword, $newEmail, $newName) //должна быть еще одна форма в кабинете юзера, которая будет обновлять данные. $oldLogin передавать как сессию.
    {
        $update = simplexml_load_file(self::$xmlDatabaseURL)->xpath("//user[login ='$oldLogin']");
        foreach ($update as $item) {
            $item->login = $newLogin;
            $item->password = $newPassword;
            $item->email = $newEmail;
            $item->name = $newName;
            $update->asXML(self::$xmlDatabaseURL);
        }
    }

    public function delete($login)
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load(self::$xmlDatabaseURL);

        $xpath = new DOMXpath($xml);

        $nodeList = $xpath->query("//user[login ='$login']", $xml->documentElement);
        foreach ($nodeList as $dataNode) {
            if ($dataNode->parentNode === null) {
                continue;
            }
            $dataNode->parentNode->removeChild($dataNode);
        }
        $xml->save(self::$xmlDatabaseURL);
    }
}