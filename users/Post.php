<?php
require_once("Database.php");

class Post extends Database{
public $database, $connection;

public function __construct() 
{
parent::__construct(); //  Подключиться к БД
}

public function output(){
    
   $content = $this->extract("SELECT `content` FROM `products` WHERE name_id LIKE '21' ");
   return $content; 
   }
    
public function output_t(){
   $title = $this->extract("SELECT `title` FROM `products` WHERE name_id LIKE '21' ");
   return $title;  
 }
}
?>
