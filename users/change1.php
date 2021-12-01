<?php
//session_start();

require_once("Auth.php");
require_once("User.php");
require_once("Post.php");

$post = new Post(); // Получить данные пользователя
$posts = [];
$titles = [];
$dates = [];
$ids = [];

$i = $_REQUEST["i"];
$name_id = $_REQUEST["name_id"];

$id = $post->output_id($name_id);
while ($row = mysqli_fetch_assoc($id)){
    $ids[] = $row;
}

$title = $post->output_t($name_id);
while ($row = mysqli_fetch_assoc($title)){
    $titles[] = $row;
}

$note = $post->output($name_id);
while ($row = mysqli_fetch_assoc($note)){
    $posts[] = $row;
}

if(!empty($_REQUEST["change"])){
    $post->post_change($ids[$i]["id"]);
    header("Location: posts.php");    
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
         <input class='box' type='text' name='title' value = '<?php echo $titles[$i]["title"]?>'>
       
         
         <input class='content' type='text' name='content' value = '<?php echo $posts[$i]["content"]?>'>
        
        <input class = "button" type="submit" name="change" value="Сохранить">
     </form>
    </div>
    
</body>
</html>


    