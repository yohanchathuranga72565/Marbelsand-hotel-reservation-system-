<?php
    session_start();
    include 'connection.php';

    if((isset($_SESSION['user_type'])) && isset($_POST['editprofile'])){
        $name=$_POST['fname']." ".$_POST['lname'];
        $pno=$_POST['pno'];
        if($_SESSION['user_type']=="admin"){
            $sql= "UPDATE administrator SET name='{$name}',contact_no='{$pno}' WHERE email='{$_SESSION['email']}'";
            $result = mysqli_query($connection, $sql);
            $_SESSION['profileupdated']=1;
            header('Location:admindashboard.php');
        }
        else if($_SESSION['user_type']=="receptionist"){
            $sql= "UPDATE receptionist SET name='{$name}',contact_no='{$pno}' WHERE email='{$_SESSION['email']}'";
            $result = mysqli_query($connection, $sql);
            $_SESSION['profileupdated']=1;
            header('Location:admindashboard.php');
        }
        // else{
        //     header('Location:index.php'); 
        // }
    }
    
?>