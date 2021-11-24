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
    print_r('<div class="title">'.$titles[$i]["title"].'</div>');
    print_r(mb_substr($posts[$i]["content"], 0, 150));
    print_r('<div class="data">'.$dates[$i]["date"].'</div>');
    $i = $i + 1;
   }
    ?>
    </div>
    <div class="data">
    <a href="create.php" >Создать</a>
    </div>
</body>
</html>


    