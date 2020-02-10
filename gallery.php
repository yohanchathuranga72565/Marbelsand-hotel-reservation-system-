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
                <div class="tz-gallery wow slideInUp">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\balcony1.jpg" class="lightbox">
                                    <img src="assets\images\gallery\balcony1.jpg" alt="balcony" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Balcony</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\balcony2.jpg" class="lightbox">
                                    <img src="assets\images\gallery\balcony2.jpg" alt="balcony" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Balcony</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\balcony4.jpg" class="lightbox">
                                    <img src="assets\images\gallery\balcony4.jpg" alt="balcony" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Balcony</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 wow slideInUp">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\bathroom1.jpg" class="lightbox">
                                    <img src="assets\images\gallery\bathroom1.jpg" alt="bathroom" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Bathroom</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\bathroom2.jpg" class="lightbox">
                                    <img src="assets\images\gallery\bathroom2.jpg" alt="bathroom" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Bathroom</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\bathroom3.jpg" class="lightbox">
                                    <img src="assets\images\gallery\bathroom3.jpg" alt="bathroom" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Bathroom</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 wow slideInUp">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\bathroom4.jpg" class="lightbox">
                                    <img src="assets\images\gallery\bathroom4.jpg" alt="bathroom" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Bathroom</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\bathroom5.jpg" class="lightbox">
                                    <img src="assets\images\gallery\bathroom5.jpg" alt="bathroom" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Bathroom</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\beach.jpg" class="lightbox">
                                    <img src="assets\images\gallery\beach.jpg" alt="beach" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Beach</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 wow slideInUp">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\carpark.jpg" class="lightbox">
                                    <img src="assets\images\gallery\carpark.jpg" alt="carpark" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Carpark</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\garden1.jpg" class="lightbox">
                                    <img src="assets\images\gallery\garden1.jpg" alt="garden" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Garden</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\garden2.jpg" class="lightbox">
                                    <img src="assets\images\gallery\garden2.jpg" alt="garden" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Garden</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 wow slideInUp">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\gym1.jpg" class="lightbox">
                                    <img src="assets\images\gallery\gym1.jpg" alt="gym" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Gym</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\room1.jpg" class="lightbox">
                                    <img src="assets\images\gallery\room1.jpg" alt="room" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Room</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\room2.jpg" class="lightbox">
                                    <img src="assets\images\gallery\room2.jpg" alt="room" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Room</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 wow slideInUp">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\room3.jpg" class="lightbox">
                                    <img src="assets\images\gallery\room3.jpg" alt="room" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Room</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\room4.jpg" class="lightbox">
                                    <img src="assets\images\gallery\room4.jpg" alt="room" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Room</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\swimming.jpg" class="lightbox">
                                    <img src="assets\images\gallery\swimming.jpg" alt="swimming" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Swimming Pool</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 wow slideInUp">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\tennis1.jpg" class="lightbox">
                                    <img src="assets\images\gallery\tennis1.jpg" alt="tennis" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Tennis Court</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\tennis2.jpg" class="lightbox">
                                    <img src="assets\images\gallery\tennis2.jpg" alt="tennis" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Tennis Court</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="assets\images\gallery\sunset.jpg" class="lightbox">
                                    <img src="assets\images\gallery\sunset.jpg" alt="sunset" class="card-img-top zoom">
                                    <div class="card-body">
                                        <p class="card-text"><b>Sunset</b>  
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        
    <!-- gallery end-->

     <!-- footer start-->
     <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="item">Home</a></li>
                        <li><a href="aboutus.php" class="item">About us</a></li>
                        <li><a href="rooms.php" class="item">Rooms</a></li>
                        <li><a href="#" class="item">Gallery</a></li>
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.js"></script>
<script src="gallery.js"></script>
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