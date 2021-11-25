<?php
require_once("Database.php");

class Post extends Database{
public $database, $connection, $title, $content, $date, $id;

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
    
public function output(){
    
   $content = $this->extract("SELECT `content` FROM `products` WHERE name_id LIKE '21' ");
   return $content; 
   }
    
public function output_t(){
   $title = $this->extract("SELECT `title` FROM `products` WHERE name_id LIKE '21' ");
   return $title;  
 }
    
public function output_d(){
   $date = $this->extract("SELECT `date` FROM `products` WHERE name_id LIKE '21' ");
   return $date;  
 }   
    
public function post_change(){
   $this->query("UPDATE `products` SET `title`='$this->title', `content`='$this->content' WHERE `id` LIKE 2");

}    
    
public function post_insert() {
  $this->query("INSERT INTO `products`( `name_id`, `title`, `content`) VALUES ('21', '$this->title','$this->content')");
}    

public function post_delete(){
    $this->query("DELETE FROM `products` WHERE `id` LIKE 2");
}
    
}
?>
