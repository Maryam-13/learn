<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$post = new Post();
$database = new Database;
$posts = [];

$i = $_REQUEST["i"];
$name_id = $_REQUEST["name_id"];

$posts = $post->output_one($name_id, $i);
$note = $database->get_array($posts);

if (!empty($_REQUEST["delete_post"])) {
    $post->post_delete($i);
    header("Location: posts.php");
}
?>

<!doctype html>
<html>
<head>
    <title>Пост</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="text"> Мой блог
</div>
<div class="content">
    <?php
        print_r('<div class="title">' . $note["title"] . '</div>');
        print_r($note["content"]);
        print_r('<div class="data">' . $note["date"] . '</div>');
    ?>
</div>
<div class="data">
    <a href="change.php?i=<?php echo $i; ?>&name_id=<?php echo $name_id; ?>">Изменить</a>
    <form method="post">
        <input type="submit" name="delete_post" value="Удалить">
    </form>
</div>
</body>
</html>

    