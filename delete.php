<?php session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();

$login = $_SESSION['userData'][0];
$CREATE->delete($login);
session_destroy();
if(isset($_COOKIE['login']) and isset($_COOKIE['password'])){
    setcookie('login', '', time()-3600);
    setcookie('password', '', time()-3600);
}
header('Location: index.html');