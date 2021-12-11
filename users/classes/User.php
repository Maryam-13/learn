<?php

require_once("Database.php");

class User extends Database
{
    public $name, $pass, $pass_conf, $mail, $database, $connection;

    public function __construct() // Всегда запускается при создании экземпляра.
    {
        if (!empty($_REQUEST["name"])) {
            $this->name = $_REQUEST["name"];
        }

        if (!empty($_REQUEST["password"])) {
            $this->pass = $_REQUEST["password"];
        }

        if (!empty($_REQUEST["mail"])) {
            $this->mail = $_REQUEST["mail"];
        }

        if (!empty($_REQUEST["password_conf"])) {
            $this->pass_conf = $_REQUEST["password_conf"];
        }

        parent::__construct(); // Шаг 2. Подключиться к БД
    }

    public function name_and_pass_exists()
    {

        $result = !empty($this->name) && !empty($this->pass);
        return $result;
    }

    public function user_insert()
    {
        $this->query("INSERT INTO `users`(`name`, `password`, `e-mail`) VALUES ('$this->name', MD5('$this->pass'),'$this->mail')");
    }

    public function load()
    {
        $result = $this->get_query("SELECT `id` FROM `users` WHERE name LIKE '$this->name' and password LIKE MD5('$this->pass')");
        $result1 = mysqli_fetch_assoc($result);
        return $result1;
    }
}

?>