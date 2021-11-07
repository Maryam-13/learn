<?php

require_once("User.php");
$user = new User();

$user->name = $_REQUEST["name"];
$user->pass = $_REQUEST["password"];
$user->pass_conf = $_REQUEST['password-conf'];
$user->mail = $_REQUEST["e-mail"];

require_once("Database.php");
$database = new Database;

if (!empty($user->name)) { 
      if (!empty($user->mail)){
          if ($user->pass == $user->pass_conf){
               
              $connection = $database->connect(); 
              
              mysqli_set_charset($connection, "utf8mb4");
              
              $database->query($database->connect(),"INSERT INTO `users`(`name`, `password`, `e-mail`) VALUES ('$user->name', MD5('$user->pass'),'$user->mail')");

              }
      }

}



//header("Location: register.php");
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
<form class = "form" method="post">
   <input class = "box" type="text" name="name" placeholder="имя">
   <input class = "box" type="password" name="password" placeholder="пароль">
   <input class = "box" type="password" name="password-conf" placeholder="подтверждение пароля"> 
   <input class = "box" type="text" name="e-mail" placeholder="e-mail">
    
   <input class = "button" type="submit" value="Регистрация">
</form>
</body>
</html>