<?php 
//connecting to my SQL
//we can do that by usin " MYSQLI OR PDO
    $connect = mysqli_connect('localhost', 'Dings', 'MADmaxoo57', 'dings_pizza');

//check the connection
    if(!$connect){
        echo 'connection error: '. mysqli_connect_errno();
    }
?>