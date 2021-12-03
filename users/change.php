<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$post = new Post();
$database = new Database;

$posts = [];

$i = $_REQUEST["i"];
$name_id = $_REQUEST["name_id"];

$posts = $post->output_one($name_id,$i);
$note = $database->get_array($posts);

if (!empty($_REQUEST["change"])) {
    $post->post_change($i);
    header("Location: posts.php");
}
?>

<!doctype html>
<html>
<head>
    <title>Изменить</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="text"> Мой блог
</div>
<div class="content">
    <form class="form change" method="post">
        <input class='box change' type='text' name='title' value='<?php echo $note["title"] ?>'>
        <textarea class="textarea" type='text' name='content' ><?php echo $note["content"] ?></textarea>
        <input class="button" type="submit" name="change" value="Сохранить">
    </form>
</div>
</body>
</html>


    