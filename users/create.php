<?php

require_once("classes/User.php");
require_once("classes/Post.php");
require_once("classes/Auth.php");

$user = new User();
$database = new Database;
$post = new Post();

$name_id = $_REQUEST["name_id"];

if ($post->title_and_content_exists()) {
    $post->post_insert($name_id);
    //header("Location: posts.php");
    print_r($post) ;
}
?>