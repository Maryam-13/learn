<?php
session_start();

require_once("Auth.php");
require_once("User.php");
require_once("Post.php");

$post = new Post(); // Получить данные пользователя
$posts = [];
$titles = [];
$dates = [];

$title = $post->output_t();
while ($row = mysqli_fetch_assoc($title)){
    $titles[] = $row;
}

$note = $post->output();
while ($row = mysqli_fetch_assoc($note)){
    $posts[] = $row;
}

$date = $post->output_d();
while ($row = mysqli_fetch_assoc($date)){
    $dates[] = $row;
}
?>

<!doctype html>
<html>
<head>
    <title>Пост1</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="text"> Мой блог
    </div>
    <div class="content">
     <?php
    
    print_r('<div class="title">'.$titles[0]["title"].'</div>');
    print_r($posts[0]["content"]);
    print_r('<div class="data">'.$dates[0]["date"].'</div>');
   ?>
    </div>
    <div class="data">
        <a href="change1.php">Изменить</a>
        <a href="">Удалить</a>
    </div>
</body>
</html>


    