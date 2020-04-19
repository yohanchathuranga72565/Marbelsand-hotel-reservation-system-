<?php
    session_start();
    include 'connection.php';


    
        if(isset($_GET['email'])){
        if($_GET['email']=="chathunavo96@gmail.com"){
            $_SESSION['admin']=1;
            header('Location:adminuserdetails.php');
        }
        else{

        $query1="DELETE FROM login WHERE email='{$_GET['email']}'";
        $result_set1=mysqli_query($connection,$query1);

        if($_GET['type']=="admin"){
            $query2="DELETE FROM administrator WHERE email='{$_GET['email']}'";
            $result_set2=mysqli_query($connection,$query2);
            $_SESSION['del']=1;
        }
        else if($_GET['type']=="user"){
            $query2="DELETE FROM registered_customer WHERE email='{$_GET['email']}'";
            $result_set2=mysqli_query($connection,$query2);
            $_SESSION['del']=1;
        }
        else if($_GET['type']=="receptionist"){
            $query2="DELETE FROM receptionist WHERE email='{$_GET['email']}'";
            $result_set2=mysqli_query($connection,$query2);
            $_SESSION['del']=1;
        }
        else{
            //error
        }
        header('Location:adminuserdetails.php');

        }   

        
        }
        

    
    

?>