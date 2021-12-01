<?php
require_once("Database.php");

class Post extends Database{
public $database, $connection, $title, $content, $date, $id, $name_id;

public function __construct() 
{
if (!empty($_REQUEST["title"])) {
$this->title = $_REQUEST["title"];
}

if (!empty($_REQUEST["content"])) {
$this->content = $_REQUEST["content"];
} 


parent::__construct(); //  Подключиться к БД
}
    
public function title_and_content_exists() {

$result = !empty($this->title) && !empty($this->content);
return $result;
}
    
public function output($name_id){
    
   $content = $this->extract("SELECT `content` FROM `products` WHERE name_id LIKE '$name_id' ");
   return $content; 
   }
    
public function output_t($name_id){
   $title = $this->extract("SELECT `title` FROM `products` WHERE name_id LIKE '$name_id' ");
   return $title;  
 }
    
public function output_d($name_id){
   $date = $this->extract("SELECT `date` FROM `products` WHERE name_id LIKE '$name_id' ");
   return $date;  
 }  
    
public function output_id($name_id){
   $id = $this->extract("SELECT `id` FROM `products` WHERE name_id LIKE '$name_id' ");
   return $id;  
 }   
    
public function post_change($post_id){
   $this->query("UPDATE `products` SET `title`='$this->title', `content`='$this->content' WHERE `id` LIKE '$post_id'");

}    
    
public function post_insert($user_id) {
  $this->query("INSERT INTO `products`( `name_id`, `title`, `content`) VALUES ('$user_id', '$this->title','$this->content')");
}    

public function post_delete($post_id){
    $this->query("DELETE FROM `products` WHERE `id` LIKE '$post_id'");
}
    
}
?>
