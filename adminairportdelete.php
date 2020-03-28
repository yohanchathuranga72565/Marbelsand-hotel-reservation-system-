<?php
    session_start();
    include 'connection.php';
    $sql1 = "DELETE FROM vehicle_reservation WHERE vehicle_reservation_id='$_GET[id]'";
    if(mysqli_query($connection,$sql1)){
        $_SESSION['delete']=1;
        header('Location:adminairportshow.php');
    }
    else{
        $_SESSION['delete']=2;
        echo "Not deleted";
        header('Location:adminairportshow.php');
    }


?>