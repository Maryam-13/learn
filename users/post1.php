<?php
//session_start();

require_once("Auth.php");
require_once("User.php");
require_once("Post.php");

$post = new Post(); // Получить данные пользователя
$posts = [];
$titles = [];
$dates = [];
$i = $_REQUEST["i"];
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

$post->post_delete($id);

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
    
    print_r('<div class="title">'.$titles[$i]["title"].'</div>');
    print_r($posts[$i]["content"]);
    print_r('<div class="data">'.$dates[$i]["date"].'</div>');
   ?>
    </div>
    <div class="data">
        <a href="change1.php?i=<?php echo $i;?>&name_id=<?php echo $name_id; ?>">Изменить</a>
        <a href="posts.php?name_id=<?php echo $name_id; ?>" ><input type="submit" value="Удалить"></a>
    </div>
</body>
</html>


    