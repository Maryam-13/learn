<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$user = new User();
$post = new Post();
$database = new Database;

$posts = [];

$name_id = $_SESSION['id'];
print_r($name_id);

$posts = $post->output_all($name_id);

$result = [];

for ($i = 0; $i < $posts->num_rows; $i++){
$result[] = $database->get_array($posts);
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
