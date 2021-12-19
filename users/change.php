<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$post = new Post();
$database = new Database;

$posts = [];

$i = 10;//$_REQUEST["i"];
//$name_id = $_REQUEST["name_id"];

$posts = $post->output_one($i);
$note = $database->get_array($posts);
echo json_encode($note, JSON_UNESCAPED_UNICODE);

if (!empty($_REQUEST["change"])) {
    $post->post_change($i);
    header("Location: posts.html");
}
?>


    