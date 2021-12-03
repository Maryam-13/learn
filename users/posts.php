<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$user = new User();
$post = new Post();
$database = new Database;

$posts = [];

$name_id = $_SESSION['id'];

$posts = $post->output_all($name_id);
$post = $database->get_array($posts);

?>

<!doctype html>
<html>
<head>
    <title>Посты</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="text"> Мой блог
</div>
<div class="content">
    <?php
      foreach ($posts as $post) { 
        print_r('<div class="title">' . $post["title"] . '</div>');
        print_r('<div class="content">' . mb_substr($post["content"], 0, 150) . '</div>'); ?>
        <a href="post.php?i=<?php echo $post["id"]; ?>&name_id=<?php echo $name_id; ?>" class="data">Подробнее</a><?php
        print_r('<div class="data">' . $post["date"] . '</div>');
        }
    ?>
</div>
<div class="data">
    <a href="create.php?name_id=<?php echo $name_id; ?>">Создать</a>
</div>
</body>
</html>


    