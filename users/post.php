<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$post = new Post();
$database = new Database;
$posts = [];

$id = $_REQUEST["id"];

$posts = $post->output_one($id);
$note = $database->get_array($posts);

echo json_encode($note, JSON_UNESCAPED_UNICODE);

if (!empty($_REQUEST["delete_post"])) {
    $post->post_delete($id);
    header("Location: posts.php");
}
?>