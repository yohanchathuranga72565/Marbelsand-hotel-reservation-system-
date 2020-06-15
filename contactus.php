<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="contactus.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="map.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

    <title>Document</title>
</head>
<body>
<?php include 'email.php';?>
<!-- Nav bar start-->
<?php include 'navbar.php';?>
    <!-- Nav bar end-->

    <!-- contactus header start-->
    <div id="header" class="header">
            <div class="row">
                <div class="col-12 text-center">
                    <h1><b>CONTACT WITH US</b></h1>
                    <img class="img-responsive mt-0" width="20%" src="assets\images\newlogo.png"  alt="gym">
                </div>
            </div>
        </div>
    <!-- contactus header end-->
    <div class="container-fluid">
      <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </div>
      </div>
        <hr/>
    <!-- content start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 text-center py-5 wow slideInLeft">
                <h3>Contact</h3>
                <p>Stop scrolling through the photos of Sri Lanka and gazing at the breathtaking 
                    views and start planning your dream tour in Sri Lanka just the way you want it.<br>
                    Take the first step to plan your Sri Lanka holiday by getting in touch with us.<br>
                    With a team of Sri Lanka tour planning specialist, we are here to tailor make unforgettable Sri Lanka tours just for you. 
                    Let us know all your Sri Lanka holiday expectations and we’ll help you find the best itinerary options and bring it to the reality.
                     Contact our expert sales consultants today and request a quote for free.
                </p>
            </div>

            <!-- form action start-->
            <div class="col-12 col-md-6 p-3 text-center">
                <form action="contactus.php" method="post">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="name" class="form-control input-box form-rounded" placeholder="Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="phone" class="form-control input-box form-rounded" placeholder="Phone" name="phone" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" class="form-control input-box form-rounded" placeholder="Email" name="email" required>
                            </div>     
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="subject" class="form-control input-box form-rounded" placeholder="Subject" name="subject" required>
                            </div>     
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <textarea class="form-control input-box form-rounded" rows="5" placeholder="Comment" name="message" required></textarea>
                            </div>     
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-right">
                            <button class="btn btn-default" name="send_message">Send</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- form action end-->
        </div>
    </div>
    <!-- content end-->
        <hr>
    <!-- google map start-->
    <div class="container-fluid bg">
        <div class="row">
            <div class="col-12">
            <div class="mapouter"><div class="gmap_canvas">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1O1pHMfG3-egxtHq0ZmlAi6E-mikKxBVk" width="100%" height="480"></iframe>
            </div>
            </div>
        </div>
    </div>
    </div>
    <!-- google map end-->

    <!-- footer start-->
    <footer class="footer  pt-5">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="item">Home</a></li>
                        <li><a href="aboutus.php" class="item">About us</a></li>
                        <li><a href="rooms.php" class="item">Rooms</a></li>
                        <li><a href="gallery.php" class="item">Gallery</a></li>
                        <li><a href="airportpickup.php" class="item">Airport pick up</a></li>
                        <li><a href="excursion.php" class="item">Excursions</a></li>
                        <li><a href="#" class="item">Contacy us</a></li>
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
 <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script> 
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
 
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
      if(isset($_SESSION['phone'])){
          echo 'swal({
            title: "Oops",
            text: "Invalid Phone number!",
            icon: "error",
            button: "Ok",
          });';
          
          //session_destroy();
          unset($_SESSION['phone']);
         }

         if(isset($_SESSION['email1'])){
            if($_SESSION['email1']==1){ 
            echo 'swal({
              title: "Thank you!",
              text: "Info has sent successfully!",
              icon: "success",
              button: "Ok",
            });';
            
            //session_destroy();
            unset($_SESSION['email1']);}
            else{
                echo 'swal({
                    title: "Oops!",
                    text: "Info has not sent!",
                    icon: "error",
                    button: "Ok",
                  });';
                  
                  //session_destroy();
                  unset($_SESSION['email1']);}
            }
           
         
     echo '</script>';
    ?>
    
</body>
</html>