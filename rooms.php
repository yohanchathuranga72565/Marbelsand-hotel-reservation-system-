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
    <link rel="stylesheet" type="text/css" href="rooms.css">
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

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
                    <h1><b>Rooms</b></h1>
                    <h1 class="wordnav" style="font-size:50px;"><b>Hotel Marble Sand</b></h1>
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
                    <li class="breadcrumb-item active">Rooms</li>
                </ol>
            </div>
      </div>
        <hr/>

        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                  <h1 class="wow slideInRight">Types Of Rooms In Hotel Marble Sand</h1>
                    <img class="img-responsive mt-0 wow slideInLeft" src="assets\images\underline.png" width="50%" alt="underline">
                </div>
            </div>
        </div>
    <!--hotel rooms start-->
    <div class="container mt-5">
        <div class="row wow slideInUp">

          <div class="col-12 col-sm-4 pb-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets\images\delux_city_facing.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
            <div class="card-body">
              <p class="card-text"><b>Deluxe City Facing room</b><br/>
              Max: 3 Person(s)<br/>
              Max: 2 Child(s)<br/> 
              Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$135</span>
              <span class="badge badge-pill badge-secondary"><del>$150</del></span> 
            </p>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <a href="deluxecity.php" class="btn btn-sm btn-deep-orange">More Information</a>
            </div>
          </div>
          </div>

          

          <div class="col-sm-4 pb-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="assets\images\deluxe_ocean_facing.jpg" class="card-img-top img-responsive" alt="...">
                <div class="card-body">
                <p class="card-text"><b>Deluxe Ocean Facing room</b><br/>
                  Max: 3 Person(s)<br/>
                  Max: 2 Child(s)<br/>
                  Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$126</span>
              <span class="badge badge-pill badge-secondary"><del>$140</del></span>
                </p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                <a href="deluxeocean.php" class="btn btn-sm btn-deep-orange">More Information</a>
                </div>
            </div>
          </div>

          <div class=" col-sm-4 pb-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets\images\luxury_city_view.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
            <div class="card-body">
              <p class="card-text"><b>Luxury City View room</b><br/>
              Max: 3 Person(s)<br/>
              Max: 2 Child(s) <br/>
              Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$117</span>
              <span class="badge badge-pill badge-secondary"><del>$130</del></span> 
            </p>
            </div>
            <div class="card-footer d-flex justify-content-center">
            <a href="luxurycity.php" class="btn btn-sm btn-deep-orange">More Information</a>
            </div>
          </div>
          </div>


        </div>

        <div class="row wow slideInUp">

            <div class="offset-sm-2 col-12 col-sm-4 pb-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <img src="assets\images\luxury_ocean_view.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
              <div class="card-body">
                <p class="card-text"><b>Luxury Ocean View room</b><br/>
                Max: 3 Person(s)<br/>
                Max: 2 Child(s) <br/>
                Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$108</span>
              <span class="badge badge-pill badge-secondary"><del>$120</del></span> 
              </p>
              </div>

              <div class="card-footer d-flex justify-content-center">
              <a href="luxuryocean.php" class="btn btn-sm btn-deep-orange">More Information</a>
              </div>
            </div>
            </div>



            <div class="col-sm-4 pb-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <img src="assets\images\executive_suits.jpg" class="card-img-top img-responsive" alt="...">
              <div class="card-body">
              <p class="card-text"><b>Executive Suite</b><br/>
                Max: 3 Person(s)<br/>
                Max: 2 Child(s) <br/>
                Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$90</span>
              <span class="badge badge-pill badge-secondary"><del>$100</del></span> 
              </p>
              </div>

              <div class="card-footer d-flex justify-content-center">
              <a href="executivesuit.php" class="btn btn-sm btn-deep-orange">More Information</a>
              </div>
            </div>
            </div>

            

        </div>

    </div>
    <!--hotel rooms end-->


    <!-- footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="item">Home</a></li>
                        <li><a href="aboutus.php" class="item">About us</a></li>
                        <li><a href="#" class="item">Rooms</a></li>
                        <li><a href="gallery.php" class="item">Gallery</a></li>
                        <li><a href="airportpickup.php" class="item">Airport pick up</a></li>
                        <li><a href="excursion.php" class="item">Excursions</a></li>
                        <li><a href="contactus.php" class="item">Contacy us</a></li>
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

</body>
</html>