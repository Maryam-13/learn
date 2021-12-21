<?php

require_once("classes/Auth.php");
require_once("classes/User.php");

$user = new User(); // Шаг 1. Получить данные пользователя

if ($user->name_and_pass_exists()) { // Шаг 2. Проверить пришли данные
    $row = $user->load(); // Шаг 3. Получить пользователя из БД
    Auth::add_user_to_session($row["id"]); // Шаг 4. Добавить пользователя в сессию. // Вызов статической функции.
    //header("Location: posts.html");
};
?>