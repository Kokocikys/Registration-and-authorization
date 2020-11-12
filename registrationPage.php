<? session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href='css/stylesheet.css'/>
    <title>Регистрация</title>
</head>
<body>

<div class="col-4">
    <div class="containerReg">
        <h1>Регистрация</h1>
        <p>Уже есть аккаунт? <a href="authorizationPage.php">Войдите!</a></p>
        <form>
            <label id="loginLabel">Введите логин</label>
            <input class="form-control" type='text' name='login' placeholder="Логин" id='login'><br>
            <label id="passwordLabel">Введите пароль</label>
            <input class="form-control" type='password' name='password' placeholder="Пароль" id='password'><br>
            <label id="confirmPasswordLabel">Подтвердите пароль</label>
            <input class="form-control" type='password' name='confirmPassword' placeholder="Пароль"
                   id='confirmPassword'><br>
            <label id="emailLabel">Введите адрес электронной почты</label>
            <input class="form-control" type='email' name='email' placeholder="Email" id='email'><br>
            <label id="nameLabel">Введите ваше имя</label>
            <input class="form-control" type='text' name='name' placeholder="Имя" id='name'><br>
            <span class="errorAlert" id="uniquenessError"></span><span class="errorAlert" id="samePasswordError"></span>
            <div class="interactiveBlock">
                <span><input type="checkbox" onclick="visibility(this)">&nbspПоказывать пароль</span>
                <input type="submit" value="Зарегистрироваться" id="registration">
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
<script src="JavaScript/passwordVisibility.js"></script>
<script src="JavaScript/registrationScript.js"></script>

<?
if (empty($_SESSION)) {
    echo "<script>$('.containerUser').addClass('hideContainer');</script>";
} else {
    echo "<script>$('.containerReg').addClass('hideContainer');</script>";
}
?>

</body>
</html>