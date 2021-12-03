<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    private function connect()
    {
        $connection = mysqli_connect("localhost", "root", "", "users");
        mysqli_set_charset($connection, "utf8mb4");
        return $connection;
    }

    protected function query($sql)
    {
        mysqli_query($this->connection, $sql);
    }

    protected function get_query($sql)
    {
        $resource = mysqli_query($this->connection, $sql);
        return $resource;
    }

    public function get_array($posts)
    {
        $resourse = mysqli_fetch_assoc($posts);
        return $resourse;
    }
}

?>