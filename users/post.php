<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$post = new Post();
$database = new Database;
$posts = [];

$i = 10;


//$name_id = $_REQUEST["name_id"];

//$posts = $post->output_one($name_id, $i);
$posts = $post->output_one($i);
$note = $database->get_array($posts);

echo json_encode($note, JSON_UNESCAPED_UNICODE);

if (!empty($_REQUEST["delete_post"])) {
    $post->post_delete($i);
    header("Location: posts.php");
}
?>