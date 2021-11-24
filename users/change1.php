<?php
session_start();

require_once("Auth.php");
require_once("User.php");
require_once("Post.php");

$post = new Post(); // Получить данные пользователя
$posts = [];
$titles = [];
$dates = [];

$post->post_change();

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
    <title>Изменить пост1</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="text"> Мой блог
    </div>
    <div class="content">
     <form class = "form" method="post"> 
         <input class='box' type='text' name='title' value=' <?php echo $titles[0]["title"] ?> '>
       
         
         <input class='content' type='text' name='content' value = '<?php echo $posts[0]["content"] ?>'>
        
        <input class = "button" type="submit" value="Сохранить">
     </form>
    </div>
    
</body>
</html>


    