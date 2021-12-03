<?php

require_once("classes/User.php");
require_once("classes/Post.php");
require_once("classes/Auth.php");

$user = new User();
$database = new Database;
$post = new Post();

$name_id = $_REQUEST["name_id"];

if ($post->title_and_content_exists()) {
    $post->post_insert($name_id);
    header("Location: posts.php");
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
<form class="form change" method="post">
    <input class="box change" type="text" name="title" placeholder="Заголовок">
    <textarea class="textarea" type="text" name="content" placeholder="Текст поста"></textarea>
    <input class="button" type="submit" value="Создать">
</form>
</body>
</html>