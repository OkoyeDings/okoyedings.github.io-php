<?php 

$con = new mysqli('localhost', 'root', '', 'crudoperation');

if(!$con){
    echo 'connection error: '. mysqli_connect_errno();
}else{
    echo 'good connection';
}

?>