<?php session_start();
require_once 'CRUD.php';
$CREATE = new CRUD();?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href='stylesheet.css'/>
    <title>Авторизация</title>
</head>
<body>

<div>
    <h1>Добро пожаловать, <? echo $_SESSION['userData'][3]; ?>!</h1>
    <a href="delete.php"><h3>Нажмите здесь, чтобы удалить аккаунт!</h3></a>
    <a href="logout.php"><h3>Выход!</h3></a>
</div>

</body>
</html>