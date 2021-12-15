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


$i = 0;
foreach ($posts as $post){
$post[$i] = $database->get_array($posts);
echo json_encode($post[$i], JSON_UNESCAPED_UNICODE);
$i = $i + 1;
}
