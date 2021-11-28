<?php

require_once("Auth.php");
require_once("User.php");

$user = new User(); // Шаг 1. Получить данные пользователя
//$users = [];

if ($user->name_and_pass_exists()) { // Шаг 2. Проверить пришли данные
$row = $user->load(); // Шаг 3. Получить пользователя из БД
  
//$users = Auth::add_user_to_session($row); // Шаг 4. Добавить пользователя в сессию. // Вызов статической функции.

    Auth::add_user_to_session($row["id"]);
    $name_id = $_SESSION['id'];
};
//header("Location: authorization.php");
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
    <a href="posts.php?name_id=<?php echo $name_id;?>" class="link">Войти   </a>   
   <a href = "register.php" class="link"> <input class = "button" type="button" value="Регистрация"> </a>
 </form>
    
     <div>
    <?php
    require_once("User.php");
    $user = new User();
         
    //if (!empty($user->name)) {     
    //echo "<pre>";
    //print_r($users);
    //}
         
      // echo $user->name;  //выводит имя пользователя
       echo $name_id;  
    ?>
    </div>
</body>
</html>