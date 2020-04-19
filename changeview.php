<?php
session_start();


if($_SESSION['user_type']=='user1'){
    $_SESSION['user_type']=$_SESSION['change_view'];
    // echo $_SESSION['user_type'];
    unset($_SESSION['change_view']);
    header('Location:admindashboard.php');

}


else{

    $_SESSION['change_view']=$_SESSION['user_type'];
    $_SESSION['user_type']='user1';
    
    // echo $_SESSION['user_type'];
    header('Location:index.php');

}

?>