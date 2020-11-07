<?php session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();

$login = $_SESSION['userData'][0];
$CREATE->delete($login);
session_destroy();
header('Location: index.html');
