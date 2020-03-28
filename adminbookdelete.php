<?php
    session_start();
    include 'connection.php';
    $sql1 = "DELETE FROM room_reservation WHERE reservation_id='$_GET[id]'";
    if(mysqli_query($connection,$sql1)){
        $_SESSION['delete']=1;
        header('Location:adminbookshow.php');
    }
    else{
        $_SESSION['delete']=2;
        echo "Not deleted";
        header("refresh:1; url=adminbookshow.php");
    }


?>