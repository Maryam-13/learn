<?php

require_once("classes/User.php");

$user = new User();
$database = new Database;

if ($user->name_and_pass_exists()) {
    if ($user->pass == $user->pass_conf) {
        $user->user_insert();
      //  header("Location: register.php");
      print_r($user) ;
    }
}
?>