<?php
    session_start();
    include 'connection.php';
    $sql = "SELECT * FROM excursion WHERE excursion_id='{$_GET['id']}'";
    $result_set = mysqli_query($connection,$sql);
    $img='';
    foreach($result_set as $row){
        $img=explode("/",$row['img_path'])[1];
    }
    $file_list = scandir('excursion_image/');
    $data=file_get_contents("adminexcursion.json");
    $data=json_decode($data,true);
    $jsonarr=array();
    // $index=

    foreach($file_list as $file){
        if($file==$img){
            unlink('excursion_image/'.$file);
            foreach($data as $data1){
                if($data1!=""){
                if($data1["id"]==strval($_GET['id'])){
                    $index=array_search($data1,$data);
                    unset($data[$index]);
                    $data=json_encode($data);
                    if(file_put_contents('adminexcursion.json',$data)){
                        //json file updated
                        $sql1 = "DELETE FROM excursion WHERE excursion_id='{$_GET['id']}'";
                        if(mysqli_query($connection,$sql1)){
                            $_SESSION['del']=1;
                            header('Location:excursion.php');
                        }
                    }
                    else{
                        // $_SESSION['del']=2;
                        // echo "Not deleted";
                        header('Location:excursion.php');
                    }
                }
                }
            }
        }

    }


   
   


?>