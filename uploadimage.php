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

    if(isset($_POST['submit'])){
        //submit button is clicked

        $_SESSION['image']=0;
        $file_name= $_FILES['image']['name'];
        $file_type= $_FILES['image']['type'];
        $file_size= $_FILES['image']['size'];
        $temp_name= $_FILES['image']['tmp_name'];

        $upload_to="images/";
        //checking the file type
        if($file_type!= 'image/jpeg'){
            $errors[]='Only JPEG Files are allowed.';
        }

        //checking file size
        if($file_size > 700000){
            $errors[]='File size should be less than 700Kb,';
        }

        if(empty($errors)){
            $file_uploaded=move_uploaded_file($temp_name,$upload_to.$file_name);
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
    <title>Upload Image</title>

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
        <h2 class="text-center">Image Upload for the Gallery</h2>
        <div class="row">
            <div class="col-8 offset-2">
                <br/>
                <h5>Choose and Image and Click Upload</h5>

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


                <form action="uploadimage.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="image" id=""><br/>
                    <p>Note:<br/> 
                        -JPEG file less than 700kb only.<br/>
                        -Plese be sure to upload 1024x500 demensions images.<br/></p>
                    <input type="submit" name="submit" class="btn btn-success btn-sm"><br/>
                </form>
                <?php
                    if(isset($file_uploaded)){
                        echo '<h3>Uploaded File</h3>';
                        echo '<img src="'.$upload_to.$file_name.'" style="height:200px">';
                    }
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