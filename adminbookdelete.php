<?php
    session_start();
    include 'connection.php';
    $sql1 = "DELETE FROM room_reservation WHERE reservation_id='$_GET[id]'";
    $sql2 = "DELETE FROM payment WHERE payment_id='$_GET[pid]'";
    $sql3 = "DELETE FROM customer WHERE customer_id='$_GET[cid]'";
    if(mysqli_query($connection,$sql1)){
        if(mysqli_query($connection,$sql2)){
            if(mysqli_query($connection,$sql3)){
                $_SESSION['delete']=1;
                header('Location:adminbookshow.php');
            }
        }
    }
    else{
        $_SESSION['delete']=2;
        echo "Not deleted";
        header("refresh:1; url=adminbookshow.php");
    }


?>