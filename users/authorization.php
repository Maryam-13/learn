<?php
require_once("User.php");
$user = new User();

require_once("Database.php");
$database = new Database;

session_start();

//if (!empty ($_REQUEST[$user->name])){
$connection =  $database->connect();  
mysqli_set_charset($connection, "utf8mb4"); 
    
$user->name = $_REQUEST["name"];
$user->pass = $_REQUEST["password"];

$users = [];  
 
     
if (!empty($user->name)) { 
      if (!empty($user->pass)){
          
          $pass = MD5($user->pass);
          
          $resource = $database->get_query($connection,"SELECT `id` FROM `users` WHERE name LIKE '$user->name' and password LIKE '$pass' ");
                  
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
    require_once("User.php");
    $user = new User();
         
    if (!empty($user->name)) {     
    echo "<pre>";
    print_r($users);
    }
    ?>
    </div>
</body>
</html>