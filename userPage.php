<?php session_start();
require_once 'CRUD.php';
$CREATE = new CRUD(); ?>

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

<div class="container col-4">
    <h1>Добро пожаловать, <? echo $_SESSION['userData'][3]; ?>!</h1><br>
    <div class="functionality">
        <a href="delete.php">Нажмите здесь, чтобы удалить аккаунт</a><br>
        <a href="logout.php">Выйти из аккаунта</a><br>
    </div>
    <br><span id="backToMain"><a href="index.html">Вернуться на главную</a></span>
</div>

<script src="JavaScript/jquery-3.5.1.js"></script>

</body>
</html>