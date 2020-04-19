<?php
    include 'connection.php';
    session_start();
    if(isset($_SESSION['user_type'])){
        if($_SESSION['user_type']=="admin"){
            //load the page
        }
        else{
            header('Location:index.php'); 
        }
    }
    else{
        header('Location:index.php');
    }

    $errors = array();
    $topic="";
    $fee='';
    $overview="";
    $overview_point="";
    $included_point="";
    $imgpath='';
    $excursion_id=0;

    

    if(isset($_POST['submit'])){
        //submit button is clicked
        
        

        $topic=trim($_POST['topic']);
        $fee=trim($_POST['fee']);
        $overview=trim($_POST['overview']);
        $overview_point=trim($_POST['overview_point']);
        $included_point=trim($_POST['included_point']);

        $_SESSION['image']=0;
        $file_name= $_FILES['image']['name'];
        $file_type= $_FILES['image']['type'];
        $file_size= $_FILES['image']['size'];
        $temp_name= $_FILES['image']['tmp_name'];

        $upload_to="excursion_image/";
        //checking the file type
        if($file_type!= 'image/jpeg'){
            $errors[]='Only JPEG Files are allowed.';
        }

        //checking file size
        if($file_size > 700000){
            $errors[]='File size should be less than 700Kb,';
        }

        if(empty($errors)){
            $imgpath=$upload_to.$file_name;
            $file_uploaded=move_uploaded_file($temp_name,$upload_to.$file_name);
            $query="INSERT INTO excursion (admin_email,topic,amount,img_path) VALUES ('{$_SESSION['email']}','{$topic}','{$fee}','{$imgpath}')";
            $result_set=mysqli_query($connection,$query);
            $query2="SELECT excursion_id FROM excursion WHERE topic='{$topic}'";
            $result_set2=mysqli_query($connection,$query2);

            foreach($result_set2 as $row2){
                $excursion_id=$row2['excursion_id'];
            }
            // json file store data start
            if(file_exists('adminexcursion.json')){
                $current_data= file_get_contents('adminexcursion.json');
                $array_data=json_decode($current_data,true);
                $extra=array(
                        'id'            => $excursion_id,
                        'topic'         => $topic,
                        'admin_email'   => $_SESSION['email'],
                        'overview'      => $overview,
                        'overview_point'=> $overview_point,
                        'included_point'=> $included_point,
                        'amount'        => $fee,
                        'imag_path'     => $imgpath

                    );
                $array_data[]=$extra;
                $final_data=json_encode($array_data);
                if(file_put_contents('adminexcursion.json',$final_data)){
                    //json file updated
                }
            }
            else{
                //json file not exist
            }
            // json file store data end
           
            $_SESSION['image']=1;

        }
        
        


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css"/>
    <link href="simple-sidebar.css" rel="stylesheet">
    <title>Excursion upload</title>

    <style>
        .errors{
            color:red;
        }
    </style>
</head>
<body>
    <?php include 'adminslidebar.php';?>

    <!-- body content  -->
    <div class="container">
        <h2 class="text-center mb-2">Excursion Upload</h2><br><br>
        <form action="adminexcursion.php" method="post" enctype="multipart/form-data">
        <div class="row form-group">
            <div class="col-1">
                <lable><b>Topic:</b></lable>
            </div>
            <div class="col-6 ">
                <input  class="form-control" id="check_in_date" name="topic" type="text" value="<?php echo $topic;?>">
            </div>
            <div class="col-5">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-1">
                <lable><b>Excursion fee per person:</b></lable>
            </div>
            <div class="col-6 ">
                <input  class="form-control" id="check_in_date" name="fee" type="text" value="<?php echo $fee;?>">

            </div>
            <div class="col-5">
                <lable>Note-:Please write excursion fee without amount type. we get the amount type as a dollar($)</lable>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-1">
                <lable><b>Overview:</b></lable>
            </div>
            <div class="col-6 ">
            <textarea rows="4" cols="65" name="overview"  placeholder="Enter Text Here" value="<?php echo $overview;?>"></textarea>
            </div>
            <div class="col-5">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-1">
                <lable><b>Overview point:</b></lable>
            </div>
            <div class="col-6 ">
            <textarea rows="4" cols="65" name="overview_point"  placeholder="Enter Text Here" value="<?php echo $overview_point;?>"></textarea>
            </div>
            <div class="col-5">
                <lable>Note-:Please write a new point in a new line</lable><br>
                <lable>Note-:Please make sure that each point end up with a fullstop</lable>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-1">
                <lable><b>Included point:</b></lable>
            </div>
            <div class="col-6 ">
            <textarea rows="4" cols="65" name="included_point"  placeholder="Enter Text Here" value="<?php echo $included_point;?>"></textarea>
            </div>
            <div class="col-5">
                <lable>Note-:Please write a new point in a new line</lable><br>
                <lable>Note-:Please make sure that each point end up with a fullstop</lable>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-1">
                <br/>
                <h5>Choose an Image for the excursion</h5>

                <?php
                    if(!empty($errors)){
                        echo '<div class="errors">';
                        echo '<b>File not updated.Check Following errors.</b><br/>';
                        foreach ($errors as $error){
                            echo '-'. $error;
                            echo '<br/>';
                        }
                        echo '</div>';

                    }
                
                ?>


                
                    <input type="file" name="image" id=""><br/>
                    <p>Note:<br/> 
                        -JPEG file less than 700kb only.<br/>
                        -Plese be sure to upload 1024x500 demensions images.<br/></p>
                    <input type="submit" name="submit" class="btn btn-success btn-sm"><br/>
                </form>
                <?php
                    // if(isset($file_uploaded)){
                    //     echo '<h3>Uploaded File</h3>';
                    //     echo '<img src="'.$upload_to.$file_name.'" style="height:200px">';
                    // }
                    // echo $topic.'<br>';
                    // echo $fee.'<br>';
                    // echo $overview.'<br>';
                    // echo $overview_point.'<br>';
                ?>
                


            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script> 
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!-- Menu Toggle Script -->

    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
            });    
    </script>
    <?php
      echo '<script>';
      if(isset($_SESSION['image'])){
        if($_SESSION['image']==1){ 
          echo 'swal({
            title: "",
            text: "Image Uploaded Successfully!",
            icon: "success",
            button: "Ok",
          });';
          
          //session_destroy(); 
         }
         if($_SESSION['image']==0){
            echo 'swal({
                title: "",
                text: "Error, Check your file!",
                icon: "error",
                button: "Ok",
              });'; 
         }
         unset($_SESSION['image']);
        }

    echo '</script>';
         
    ?>
</body>
</html>