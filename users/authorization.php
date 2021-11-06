<?php
require_once("User.php");

session_start();

//if (!empty ($_REQUEST[user->name])){

     $connection = mysqli_connect("localhost","root","","users");
          mysqli_set_charset($connection, "utf8mb4"); 
    
//$name = $_REQUEST["name"];
//$pass = $_REQUEST["password"];

$users = [];  
    
if (!empty($user->name)) { 
      if (!empty($user->pass)){
          
         

          $resource = mysqli_query($connection,"SELECT `id` FROM `users` WHERE name LIKE '$user->name' and password like MD5($user->pass) ");
          
          $row = mysqli_fetch_assoc($resource);
          
          if (!empty($row)){
              
          $users = $_SESSION["users"];
              
          $users[]= $row;
          
          $_SESSION["users"] = $users; 
          }
              
          }
         
      }

//}

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
   <input class = "box" type="password" name="password" placeholder="пароль">
    
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