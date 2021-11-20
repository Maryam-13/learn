<?php
session_start();

require_once("Auth.php");
require_once("User.php");
require_once("Post.php");

$post = new Post(); // Получить данные пользователя
$posts = [];
$titles = [];

$title = $post->output_t();
while ($row = mysqli_fetch_assoc($title)){
    $titles[] = $row;
}

$note = $post->output();
while ($row = mysqli_fetch_assoc($note)){
    $posts[] = $row;
}

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
    $i = 0;
    foreach($posts as $post){
    echo "<pre>";
    print_r($titles[$i]);
    print_r($post);
    $i = $i + 1;
   }
    ?>
    </div>
</body>
</html>


    