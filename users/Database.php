<?php


class Database{
    
    function connect(){
        $connection = mysqli_connect("localhost","root","","users");
        return $connection;
    }
    
       
    function query($connection, $sql){
    mysqli_query($connection,$sql);
    }
    
    function get_query($connection, $sql){
        
    $resource = mysqli_query($connection,$sql);    
    return $resource;
          

    }
}



?>

