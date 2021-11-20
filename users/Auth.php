<?php
class Auth {
static function add_user_to_session($user) { // Статическая функция - не требуется создавать экземпляр класса, чтобы вызвать функцию.
if (!empty($user)){
$users = $_SESSION["users"];
$users[]= $user;
$_SESSION["users"] = $users;
}
return $users;
}
    

}
?>


