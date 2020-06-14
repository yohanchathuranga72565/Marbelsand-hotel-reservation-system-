<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="gallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>

    <!-- Nav bar start-->
    <?php include 'navbar.php';?>
    <!-- Nav bar end-->

    <!-- rooms header start-->
    <div id="header" class="header">
            <div class="row">
                <div class="col-12">
                    <h1><b>GALLERY</b></h1>
                    <h3 class="wordnav" style="font-size:50px;">Hotel Marble Sand</h3>
                    <div class="text-center">
                      <img class="img-responsive mt-0" width="20%" src="assets\images\newlogo.png"  alt="logo">
                    </div>
                </div>
            </div>
        </div>
    <!-- rooms header end-->
    <div class="container-fluid">
      <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </div>
      </div>
        <hr/>

    <!-- gallery start-->
    <div class="container">
            <div class="container gallery-container">
                <div class="tz-gallery">
                    <div class="row">



    <?php
        $file_list = scandir('images/');
        $i=0;
        $img_per_page=12;
        if(isset($_GET['p'])){
            $page_no=$_GET['p'];
            // $i=(($page_no-1)*$img_per_page);
        }
        else{
            $page_no=1;
            // $i=0;
        }
        if($page_no==1){
            $img_per_page=14;
        }
        else{
            $img_per_page=12;
        }
        $start=(($page_no-1)*$img_per_page)+1;
        foreach ($file_list as $file){
            $i=$i+1;
            $row=0;
            if(substr($file, strlen($file)-3)=='jpg' || substr($file, strlen($file)-3)=='jpeg'){
                if($start<=$i && $i<=$img_per_page*$page_no){
        ?>
                <div class="col-md-4  float-left pb-4">
                        <div class="card wow slideInUp">
                        <?php
                        
                            echo '<a href="images/'.$file.'" class="lightbox">';
                                
                                echo '<img src="images/'.$file.'" alt="balcony" class="card-img-top zoom">';
                                ?>
                                <!-- <div class="card-body">
                                    <p class="card-text"><b>Balcony</b>  
                                    </p>
                                </div> -->
                            </a>
                            
                        </div>
                        <?php
                            if(isset($_SESSION['user_type'])){
                                if($_SESSION['user_type']=="admin"){

     
                            ?>
                            <div class="text-center">
                                <a href="galleryimagedelete.php?id=<?php echo $i;?>" type="button"  class="btn btn-danger btn-sm" >Delete image</a>
                                <!-- <a  class="btn btn-danger btn-sm" data-toggle="modal" data-target="">Delete1 image</a> -->
                            </div>
                           


                            <?php
                                }
                                
                            }
                            ?>
                 </div>


                
        <?php        
        // echo '<img src="images/'.$file.'">';
                }

            }
            
            
        }
    
    ?>

                </div>
            </div>
        </div>
    </div>

    <?php 
        //first page
        $first="<a href=\"gallery.php?p=1\">First</a>";

        //last page
        $last_page_no=ceil($i/$img_per_page);
        $last="<a href=\"gallery.php?p={$last_page_no}\">Last</a>";

        //next page
        if($page_no>=$last_page_no){
            $next="<a>Next</a>";
        }
        else{
            $next_page_no=$page_no+1;
            $next="<a href=\"gallery.php?p={$next_page_no}\">Next</a>";
        }

        //previous page
        if($page_no<=1){
            $prev="<a>Previous</a>";
        }
        else{
            $prev_page_no=$page_no-1;
            $prev="<a href=\"gallery.php?p={$prev_page_no}\">Previous</a>";
        }
    ?>
    <div class="row mb-3">
        <div class="col-12  text-center bg-dark text-light"> 
            <?php echo $first .' | '. $prev .' | Page '. $page_no . ' of ' .$last_page_no.' | '. $next .' | '. $last ;?>
        </div>
    </div>
        
    <!-- gallery end-->

     <!-- footer start-->
    <div class="container">
        <div class="row">

        </div>

    </div>
     <footer class="footer  pt-5">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                    <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'index.php';}}else{echo 'index.php';}?>" class="item">Home</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'aboutus.php';}}else{echo 'aboutus.php';}?>" class="item">About us</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'rooms.php';}}else{echo 'rooms.php';}?>" class="item">Rooms</a></li>
                        <li><a href="#" class="item">Gallery</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'airportpickup.php';}}else{echo 'airportpickup.php';}?>" class="item">Airport pick up</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'excursion.php';}}else{echo 'excursion.php';}?>" class="item">Excursions</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'contactus.php';}}else{echo 'contactus.php';}?>" class="item">Contacy us</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
		              121, Galle Road<br>
		              Hikkaduwa<br>
		              Sri Lanka<br>
		              <i class="fa fa-phone fa-lg fa-fw"></i> : +94 1234 5678<br>
		              <i class="fa fa-fax fa-lg fa-fw"></i> : +94 8765 4321<br>
		              <i class="fa fa-envelope fa-lg fa-fws"></i> : <a href="mailto:marblesandsl@gmail.com" class="item">marblesandsl@gmail.com</a>
		           </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-google" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a>
                    </div>
                    
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright 2019 Hotel Marble Sand</p>
                </div>
           </div>
        </div>
    </footer>
    <!-- footer end-->

<!-- Script link-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.js"></script>
<script src="gallery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
    <script>
      var wow = new WOW(
          {
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            callback:     function(box) {
              // the callback is fired every time an animation is started
              // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null,    // optional scroll container selector, otherwise use window,
            resetAnimation: true,     // reset animation on end (default is true)
          }
        );
        wow.init();
    </script>
    <?php
      echo '<script>';
      

         if(isset($_SESSION['del'])){
            if($_SESSION['del']==1){ 
            echo 'swal({
              title: "Deleted!",
              text: "Image deletion is success!",
              icon: "success",
              button: "Ok",
            });';
            
            //session_destroy();
            unset($_SESSION['del']);}
            else{
                echo 'swal({
                    title: "Oops!",
                    text: "Image is not delete!",
                    icon: "error",
                    button: "Ok",
                  });';
                  
                  //session_destroy();
                  unset($_SESSION['del']);}
            }
           
         
     echo '</script>';
    ?>
    <!-- <script>
        function sweetalerclick(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover image!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    // swal("Poof! Your imaginary file has been deleted!", {
                    // icon: "success",
                    // });
    
                } else {
                    swal("Your imaginary file is safe!");
                }
                });
            
        }
    </script> -->
</body>
</html>