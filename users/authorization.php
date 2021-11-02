<?php

session_start();

if (!empty ($_REQUEST["name"])){
    
$name = $_REQUEST["name"];
$pass = $_REQUEST["password"];

$users = [];  
    
if (!empty($name)) { 
      if (!empty($pass)){
          
          $connection = mysqli_connect("localhost","root","","users");

          $resource = mysqli_query($connection,"SELECT `id` FROM `users` WHERE name LIKE '$name' and password like $pass ");
          
          $row = mysqli_fetch_assoc($resource);
          
          if (!empty($row)){
              
          $users = $_SESSION["users"];
              
          $users[]= $row;
          
          $_SESSION["users"] = $users; 
          }
              
          }
         
      }

}

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
   
<form class = "form" method="post">
   <input class = "box" type="text" name="name" placeholder="имя">
   <input class = "box" type="text" name="password" placeholder="пароль">
    
   <input class = "button" type="submit" value="Войти">       
   <a href = "register.php" class="link"> <input class = "button" type="button" value="Регистрация"> </a>
 
</form>
    
     <div>
    <?php
    if (!empty($name)) {     
    echo "<pre>";
    print_r($users);
    }
    ?>
    </div>
</body>
</html>