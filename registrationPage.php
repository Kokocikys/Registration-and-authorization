<? session_start(); ?>
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
    <form>
        <label>Введите логин</label><span class="errorAlert" id="loginError"></span>
        <input class="form-control" type='text' name='login' placeholder="Логин" id='login' required
               pattern="[A-Za-z0-9]{6,}"><br>
        <label>Введите пароль</label><span class="errorAlert" id="passwordError"></span>
        <input class="form-control" type='password' name='password' placeholder="Пароль" id='password' required
               pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$"
        ><br>
        <label>Подтвердите пароль</label><span class="errorAlert" id="confirmPasswordError"></span>
        <input class="form-control" type='password' name='confirmPassword' placeholder="Пароль" id='confirmPassword'
               required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$"
        ><br>
        <label>Введите адрес электронной почты</label><span class="errorAlert" id="emailError"></span>
        <input class="form-control" type='email' name='email' placeholder="Email" id='email' required><br>
        <label>Введите ваше имя</label><span class="errorAlert" id="nameError"></span>
        <input class="form-control" type='text' name='name' placeholder="Имя" id='name' required
               pattern="[A-Za-zА-Яа-яЁё]{2,}"><br>
        <span class="errorAlert" id="uniquenessError"></span><span class="errorAlert" id="samePasswordError"></span>
        <div class="interactiveBlock">
            <span><input type="checkbox" onclick="visibility(this)">&nbspПоказывать пароль</span>
            <input type="submit" value="Зарегистрироваться" id="registration">
        </div>
    </form>
    <br><span id="backToMain"><a href="index.html">Вернуться на главную</a></span>
</div>

<script src="JavaScript/jquery-3.5.1.js"></script>
<script src="JavaScript/passwordVisibility.js"></script>
<script src="JavaScript/registrationScript.js"></script>

</body>
</html>