<?php

require_once("classes/Auth.php");
require_once("classes/User.php");

$user = new User(); // Шаг 1. Получить данные пользователя

if ($user->name_and_pass_exists()) { // Шаг 2. Проверить пришли данные
    $row = $user->load(); // Шаг 3. Получить пользователя из БД
    Auth::add_user_to_session($row["id"]);// Шаг 4. Добавить пользователя в сессию. // Вызов статической функции.
    header("Location: posts.html");
};
?>

<!doctype html>
<html>
<head>
    <title>Авторизация</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="text"> Мой блог
</div>
<form class="form" method="post">
    <input class="box" type="text" name="name" placeholder="имя">
    <input class="box" type="password" name="password" placeholder="пароль">
    <input class="button" type="submit" value="Войти">
    <a href="register.php" class="link"> <input class="button" type="button" value="Регистрация"> </a>
</form>
</body>
</html>