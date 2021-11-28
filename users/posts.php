<?php
//session_start();


require_once("Auth.php");
require_once("User.php");
require_once("Post.php");

$user = new User();
$post = new Post(); // Получить данные пользователя
$posts = [];
$titles = [];
$dates = [];

$name_id = $_REQUEST["name_id"];

$title = $post->output_t($name_id);
while ($row = mysqli_fetch_assoc($title)){
    $titles[] = $row;
}

$note = $post->output($name_id);
while ($row = mysqli_fetch_assoc($note)){
    $posts[] = $row;
}

$date = $post->output_d($name_id);
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
    print_r(mb_substr($posts[$i]["content"], 0, 150)); ?>
    <a href="post1.php?i=<?php echo $i; ?>&name_id=<?php echo $name_id; ?>" class="data">Подробнее</a><?php
    print_r('<div class="data">'.$dates[$i]["date"].'</div>');
    $i = $i + 1;
   }
    ?>
    </div>
    <div class="data">
    <a href="create.php?name_id=<?php echo $name_id; ?>" >Создать</a>
    </div>
</body>
</html>


    