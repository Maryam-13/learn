<?php

require_once("User.php");
$user = new User();

require_once("Database.php");
$database = new Database;

require_once("Post.php");
$post = new Post();

require_once("Auth.php");

$name_id = $_REQUEST["name_id"];

if ($post->title_and_content_exists()){
    
       $post->post_insert($name_id);
  
}
?>

<!doctype html>
<html>
<head>
    <title>Создание</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="text"> Мой блог
    </div>
<form class = "form" method="post">
    <input class = "box" type="text" name="title" placeholder="Заголовок">
    <input class="content" type="text" name="content" placeholder="Текст поста">
    
   <input class = "button" type="submit" value="Создать">
</form>
</body>
</html>