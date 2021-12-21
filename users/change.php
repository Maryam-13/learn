<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$post = new Post();
$database = new Database;

$posts = [];

$id = $_REQUEST["id"];
//$name_id = $_REQUEST["name_id"];

$posts = $post->output_one($id);
$note = $database->get_array($posts);
echo json_encode($note, JSON_UNESCAPED_UNICODE);

if (!empty($_REQUEST["change"])) {
    $post->post_change($id);
    header("Location: posts.html");
}
?>


    