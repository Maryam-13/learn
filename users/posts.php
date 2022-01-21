<?php

require_once("classes/Auth.php");
require_once("classes/User.php");
require_once("classes/Post.php");

$user = new User();
$post = new Post();
$database = new Database;

$posts = [];

$name_id = $_SESSION['id'];
$change_date = $_REQUEST["change_date"];
$press = $_REQUEST["press"];

//$now_date = date('Y-m-d');

if ($press == 0) {

    $posts = $post->output_all($name_id);

    $result = [];

    for ($i = 0; $i < $posts->num_rows; $i++) {
        $result[] = $database->get_array($posts);
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
} else {
    
    $posts = $post->output_from_date($name_id, $change_date);

    $result = [];
   
    for ($i = 0; $i < $posts->num_rows; $i++) {
        $result[] = $database->get_array($posts);
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
