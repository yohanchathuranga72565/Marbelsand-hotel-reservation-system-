<?php session_start();
    include 'connection.php';
    $user='';
    if(isset($_SESSION['user_type'])){
        if($_SESSION['user_type']=="admin"){
            //load the page
            
        }
        else if($_SESSION['user_type']=="receptionist"){
            //load the page
        }
        
        else{
            header('Location:index.php'); 
        }
    }
    else{
        header('Location:index.php');
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
  <link href="simple-sidebar.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <!-- Slidebar start-->
    <?php include 'adminslidebar.php';?>
    <!-- Slidebar end-->

    <!-- dashboard content -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 ">
                <div class="card mt-4 bg-primary img-responsive">
                    <div class="card-body">
                        <i class="fa fa-calendar-check-o text-left text-light fa-3x"></i>
                        <h5 class="card-title text-right text-light">Bookings</h5>
                        <p class="card-text text-light text-right"><?php date_default_timezone_set("Asia/Colombo"); echo date("Y-m-d");?></p>
                        <p class="card-text text-light text-right clock">00:00:00</p>
                    </div>
                    <div class="card-footer bg-dark"><br>
                        <a href="adminbookshow.php" class="text-light text-left">Show <i class="fa fa-chevron-right text-light"></i></a></br>
                        <!-- <a href="adminbookshow.php" class="text-light text-left">Add  <i class="fa fa-plus-circle"></i></a></br> -->
                    </div>            
                </div>
            </div>
            <?php if($_SESSION['user_type']=="admin"){?>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="card mt-4 bg-success img-responsive" >
                    <div class="card-body">
                        <i class="fa fa-bed text-left text-light fa-3x"></i>
                        <h5 class="card-title text-right text-light">Rooms</h5>
                        <p class="card-text text-light text-right"><?php date_default_timezone_set("Asia/Colombo"); echo date("Y-m-d");?></p>
                        <p class="card-text text-light text-right clock">00:00:00</p>
                    </div>
                    <div class="card-footer bg-dark"><br>
                        <a href="adminroomshow.php" class="text-light text-left">Show <i class="fa fa-chevron-right text-light"></i></a></br>
                        <!-- <a href="#" class="text-light text-left">Add  <i class="fa fa-plus-circle"></i></a></br> -->
                    </div>            
                </div>
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <div class="card mt-4 bg-info img-responsive">
                    <div class="card-body">
                        <i class="fa fa-file-image-o text-left text-light fa-3x"></i>
                        <h5 class="card-title text-right text-light">Gallery</h5>
                        <p class="card-text text-light text-right"><?php date_default_timezone_set("Asia/Colombo"); echo date("Y-m-d");?></p>
                        <p class="card-text text-light text-right clock">00:00:00</p>
                    </div>
                    <div class="card-footer bg-dark">
                        <a href="gallery.php" class="text-light text-left">Show <i class="fa fa-chevron-right text-light"></i></a></br>
                        <a href="uploadimage.php" class="text-light text-left">Add  <i class="fa fa-plus-circle"></i></a></br>
                    </div>            
                </div>
            </div>
            
        </div>
            

        <div class="row">
        <?php }?>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="card mt-4 bg-danger img-responsive">
                        <div class="card-body">
                   
                            <i class="fa fa-fighter-jet text-left text-light fa-3x"></i>
                            <h5 class="card-title text-right text-light">Airport Pick Up</h5>
                            <p class="card-text text-light text-right"><?php date_default_timezone_set("Asia/Colombo"); echo date("Y-m-d");?></p>
                        <p class="card-text text-light text-right clock">00:00:00</p>
                        </div>
                        <div class="card-footer bg-dark"><br>
                            <a href="adminairportshow.php" class="text-light text-left">Show <i class="fa fa-chevron-right text-light"></i></a></br>
                            <!-- <a href="#" class="text-light text-left">Add  <i class="fa fa-plus-circle"></i></a></br> -->
                        </div>            
                </div>
            </div>
            <?php if($_SESSION['user_type']=="admin"){?>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="card mt-4 bg-secondary img-responsive">
                        <div class="card-body">
        
                            <i class="fa fa-car text-left text-light fa-3x"></i>
                            <h5 class="card-title text-right text-light">Excursions</h5>
                            <p class="card-text text-light text-right"><?php date_default_timezone_set("Asia/Colombo"); echo date("Y-m-d");?></p>
                        <p class="card-text text-light text-right clock">00:00:00</p>
                        </div>
                        <div class="card-footer bg-dark">
                            <a href="excursion.php" class="text-light text-left">Show <i class="fa fa-chevron-right text-light"></i></a></br>
                            <a href="adminexcursion.php" class="text-light text-left">Add  <i class="fa fa-plus-circle"></i></a></br>
                        </div>            
                </div>
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <div class="card mt-4 bg-success img-responsive">
                        <div class="card-body">
                   
                            <i class="fa fa-user text-left text-light fa-3x"></i>
                            <h5 class="card-title text-right text-light">User Details</h5>
                            <p class="card-text text-light text-right"><?php date_default_timezone_set("Asia/Colombo"); echo date("Y-m-d");?></p>
                        <p class="card-text text-light text-right clock">00:00:00</p>
                        </div>
                        <div class="card-footer bg-dark">
                            <a href="adminuserdetails.php" class="text-light text-left">Show <i class="fa fa-chevron-right text-light"></i></a></br>
                            <a href="#" class="text-light text-left" data-toggle="modal" data-target="#usermodal">Add  <i class="fa fa-plus-circle"></i></a></br>
                        </div>            
                </div>
            </div>
            <?php }?>


        </div>

            
    
    

        
    </div>
    <!-- dashboard content end -->

    
    <!-- Bootstrap core JavaScript -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script> 
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

    <?php
        echo '<script>';
        if((isset($_SESSION['exist']))){
                    if($_SESSION['exist']==1){ 
                    echo 'swal({
                    title: "Error!",
                    text: "Email is exist..please use another mail address!",
                    icon: "error",
                    button: "Ok",
                    });';
                    
                    //session_destroy();
                    unset($_SESSION['exist']);}
                }

        else if((isset($_SESSION['pass']))){
                  if($_SESSION['pass']==1){ 
                  echo 'swal({
                  title: "Error!",
                  text: "confirm password and password didn not match!",
                  icon: "error",
                  button: "Ok",
                  });';
                  
                  //session_destroy();
                  unset($_SESSION['pass']);}
              }  

        else if((isset($_SESSION['profileupdated']))){
                if($_SESSION['profileupdated']==1){ 
                echo 'swal({
                title: "",
                text: "Profile Updated!",
                icon: "success",
                button: "Ok",
                });';
                
                //session_destroy();
                unset($_SESSION['profileupdated']);}
            }  
            echo '</script>';
            
            echo '<script>';
            if((isset($_SESSION['accflag']))){
                        if($_SESSION['accflag']==1){ 
                        echo 'swal({
                        title: "Success!",
                        text: "Account creation is successfully!",
                        icon: "success",
                        button: "Ok",
                        });';
                        
                        //session_destroy();
                        unset($_SESSION['accflag']);}

                        else{
                            echo 'swal({
                                title: "Error!",
                                text: "Account is not created.Please check!",
                                icon: "error",
                                button: "Ok",
                                });';
                                unset($_SESSION['accflag']);
                        }
                    }

                  echo '</script>';




                  echo '<script>';
                  if((isset($_SESSION['compass']))){
                              if($_SESSION['compass']==1){ 
                              echo 'swal({
                              title: "Success!",
                              text: "Your password is changed successfully!",
                              icon: "success",
                              button: "Ok",
                              });';
                              
                              //session_destroy();
                              unset($_SESSION['compass']);}
                              else if($_SESSION['compass']==0){ 
                                echo 'swal({
                                title: "Error!",
                                text: "Confirm password did not match!",
                                icon: "error",
                                button: "Ok",
                                });';
                                
                                //session_destroy();
                                unset($_SESSION['compass']);}
                          }
          
                  else if((isset($_SESSION['corrold']))){
                            if($_SESSION['corrold']==1){ 
                            echo 'swal({
                            title: "Error!",
                            text: "please enter correct old password!",
                            icon: "error",
                            button: "Ok",
                            });';
                            
                            //session_destroy();
                            unset($_SESSION['corrold']);}
                        }  
          
                      echo '</script>';





            ?>



        <script>
            setInterval(updateClock,1000);
             
            function updateClock(){
                var myDate=new Date();
                var myHours=myDate.getHours();
                var myMinutes=myDate.getMinutes();
                var mySeconds=myDate.getSeconds();

                if(myHours<10){myHours= "0" + myHours;}
                if(myMinutes<10){myMinutes= "0" + myMinutes;}
                if(mySeconds<10){mySeconds= "0" + mySeconds;}

                var time= myHours + ":" + myMinutes + ":" + mySeconds;

                var clock=document.getElementsByClassName("clock");
                for(var i=0; i<clock.length;i++){
                    clock[i].innerText=time;
                }

            }
        
        </script>



    </body>
</html>