<?php

require_once("Database.php");

class Post extends Database
{
    public $database, $connection, $title, $content, $date, $id, $name_id, $record, $change_date;

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

    public function title_and_content_exists()
    {
        $result = !empty($this->title) && !empty($this->content);
        return $result;
    }

    public function output_all($name_id)
    {
        $record = $this->get_query("SELECT * FROM `products` WHERE name_id LIKE '$name_id'");
        return $record;
    }

    /*public function output_one($name_id, $id)
    {
        $record = $this->get_query("SELECT * FROM `products` WHERE name_id LIKE '$name_id' AND id LIKE '$id'");
        return $record;
    }*/
    public function output_one($id)
    {
        $record = $this->get_query("SELECT * FROM `products` WHERE  id LIKE '$id'");
        return $record;
    }

    public function post_change($post_id)
    {
        $this->query("UPDATE `products` SET `title`='$this->title', `content`='$this->content' WHERE `id` LIKE '$post_id'");
    }

    public function post_insert($user_id)
    {
        $this->query("INSERT INTO `products`( `name_id`, `title`, `content`) VALUES ('$user_id', '$this->title','$this->content')");
    }

    public function post_delete($post_id)
    {
        $this->query("DELETE FROM `products` WHERE `id` LIKE '$post_id'");
    }
    public function output_from_date($name_id, $change_date)
    {
        $record = $this->get_query("SELECT * FROM `products` WHERE name_id LIKE '$name_id' AND ( `date` BETWEEN '$change_date 00:00:00.000000' AND '$change_date 23:59:59.000000')");
        return $record;
    }
}
