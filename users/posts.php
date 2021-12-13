<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$user = new User();
$post = new Post();
$database = new Database;

$posts = [];

$name_id = $_SESSION['id'];

$posts = $post->output_all($name_id);

foreach ($posts as $post){
$post = $database->get_array($posts);
//print_r($post);
echo json_encode($post, JSON_UNESCAPED_UNICODE);
}

?>
