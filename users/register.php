<?php

require_once("classes/User.php");

$user = new User();
$database = new Database;

if ($user->name_and_pass_exists()) {
    if ($user->pass == $user->pass_conf) {
        $user->user_insert();
        header("Location: register.php");
    }
}
?>

<!doctype html>
<html>
<head>
    <title>Регистрация</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="text"> Мой блог
</div>
<form class="form" method="post">
    <input class="box" type="text" name="name" placeholder="имя">
    <input class="box" type="password" name="password" placeholder="пароль">
    <input class="box" type="password" name="password-conf" placeholder="подтверждение пароля">
    <input class="box" type="text" name="e-mail" placeholder="e-mail">
    <input class="button" type="submit" value="Регистрация">
</form>
</body>
</html>