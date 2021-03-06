<? session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href='css/stylesheet.css'/>
    <title>Авторизация</title>
</head>
<body>

<div class="col-4">
    <div class="containerAuth">
        <h1>Авторизация</h1>
        <p>Не зарегистрированны? <a href="registrationPage.php">Создайте аккаунт!</a></p>
        <form>
            <label id="loginLabel">Введите логин</label>
            <input class="form-control" type='text' name='login' placeholder="Логин" id='login'><br>
            <label id="passwordLabel">Введите пароль</label>
            <input class="form-control" type='password' name='password' placeholder="Пароль" id='password'><br>
            <span class="errorAlert" id="signInError"></span>
            <div class="interactiveBlock">
                <span><input type="checkbox" name='rememberMe' id="rememberMe">&nbspЗапомнить данные</span>
                <input type="submit" name="insert" value="Войти" id="authorization">
            </div>
        </form>
    </div>
    <div class="containerUser">
        <h1>Вы вошли как <? echo $_SESSION['userData'][0]; ?>!</h1><br>
        <div class="functionality">
            <a href="userPage.php">Зайти в кабинет пользователя</a><br>
        </div>
    </div>
    <br><span id="backToMain"><a href="index.html">Вернуться на главную</a></span>
</div>

<script src="JavaScript/jquery-3.5.1.js"></script>
<script src="JavaScript/authorizationScript.js"></script>

<?
if (isset($_COOKIE['login']) and isset($_COOKIE['password'])) {
    $cookieLogin = $_COOKIE['login'];
    $cookiePassword = $_COOKIE['password'];
    echo "<script>
document.getElementById('login').value = '$cookieLogin';
document.getElementById('password').value = '$cookiePassword';</script>";
}

if (empty($_SESSION)) {
    echo "<script>$('.containerUser').addClass('hideContainer');</script>";
} else {
    echo "<script>$('.containerAuth').addClass('hideContainer');</script>";
}
?>

</body>
</html>

