<?php
session_start();
$file_list = scandir('images/');
$i=0;       
foreach ($file_list as $file){
    $i=$i +1;
    $row=0;
    if(substr($file, strlen($file)-3)=='jpg' || substr($file, strlen($file)-3)=='jpeg'){
        if($i==$_GET['id']){
            unlink('images/'.$file);
            $_SESSION['del']=1;
            
            header('Location:gallery.php');
            

        }
        else{
            
        }
    
    }}

  
   

   
?>