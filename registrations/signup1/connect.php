<?php 
    $HOSTNAME='localhost';
    $USERNAME='root';
    $PASSWORD='';
    $DATABASE='signupfroms';

    $con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

    if(!$con){
        echo 'connection error: '. mysqli_connect_errno();
    }
?>