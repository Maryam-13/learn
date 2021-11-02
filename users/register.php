<?php

if (!empty ($_REQUEST["name"])){
    
$name = $_REQUEST["name"];
$pass = $_REQUEST["password"];
$pass_conf = $_REQUEST['password-conf'];
$mail = $_REQUEST["e-mail"];

if (!empty($name)) { 
      if (!empty($mail)){
          if ($pass == $pass_conf){
              $connection = mysqli_connect("localhost","root","","users");

              mysqli_query($connection,"INSERT INTO `users`(`name`, `password`, `password_conf`, `e-mail`) VALUES ('$name','$pass','$pass_conf','$mail')");
          }
      }

}

//$resource = mysqli_query($connection, "SELECT * FROM values1");

/*while($row = mysqli_fetch_assoc($resource)){
    echo"<pre>";
    print_r($row);
}*/
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
<form class = "form" method="post">
   <input class = "box" type="text" name="name" placeholder="имя">
   <input class = "box" type="text" name="password" placeholder="пароль">
   <input class = "box" type="text" name="password-conf" placeholder="подтверждение пароля"> 
   <input class = "box" type="text" name="e-mail" placeholder="e-mail">
    
   <input class = "button" type="submit" value="Регистрация">
</form>
</body>
</html>