<?php
session_start();

class Auth
{
    static function add_user_to_session($user)
    { // Статическая функция - не требуется создавать экземпляр класса, чтобы вызвать функцию.
        if (!empty($user)) {
            $_SESSION["id"] = $user;
        }
    }
}

?>

