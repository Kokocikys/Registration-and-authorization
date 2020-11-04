<?php session_start() ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href='stylesheet.css'/>
    <title>Регистрация</title>
</head>
<body>

<div class="container">
    <h1>Регистрация</h1>
    <p>Уже есть аккаунт? <a href="authorizationPage.php">Войдите!</a></p>
    <form action="registration.php" method="post">
        <label>Введите логин</label>
        <input class="form-control" type='text' name='login' placeholder="Логин" id='login' required><br>
        <label>Введите пароль</label>
        <input class="form-control" type='password' name='password' placeholder="Пароль" id='password' required><br>
        <label>Подтвердите пароль</label>
        <input class="form-control" type='password' name='confirmPassword' placeholder="Пароль" id='confirmPassword'
               required><br>
        <? if ($_SESSION['massage']) {
            echo '<span class="msg">' . $_SESSION['massage'] . '</span><br>';
        }
        unset($_SESSION['massage']); ?>
        <label>Введите адрес электронной почты</label>
        <input class="form-control" type='email' name='email' placeholder="Email" id='email' required><br>
        <label>Введите ваше имя</label>
        <input class="form-control" type='text' name='name' placeholder="Имя" id='name' required><br>
        <? if ($_SESSION['unUnique']) {
            echo '<span class="msg">' . $_SESSION['unUnique'] . '</span><br>';
        }
        unset($_SESSION['unUnique']); ?>
        <div class="interactiveBlock">
            <span><input type="checkbox" onclick="visibility(this)">&nbspПоказывать пароль</span>
            <input type="submit" value="Зарегистрироваться" name="insert" id="registration">
        </div>
    </form>
    <br><span id="backToMain"><a href="index.html">Вернуться на главную</a></span>
</div>

<script src="JavaScript/jquery-3.5.1.js"></script>
<script src="JavaScript/passwordVisibility.js"></script>

</body>
</html>