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
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="airportpickup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">


    <title>Document</title>
</head>
<body>

    <!-- Nav bar start-->
    <?php include 'navbar.php';?>
    <!-- Nav bar end-->

    <!-- airportpickup header start-->
    <div id="header" class="header">
            <div class="row">
                <div class="col-12 text-center">
                    <h1><b> BOOK YOUR VEHICLE ONLINE</b></h1>
                    <img class="img-responsive mt-0" width="20%" src="assets\images\newlogo.png"  alt="gym"><br>
                    <h4>We are only give the airport pickup for guests who are coming for hotel marble sand.</h4>
                </div>
            </div>
        </div>
    <!-- airportpickup header end-->
    <div class="container-fluid">
      <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Airport Pick Up</li>
                </ol>
            </div>
      </div>
        <hr/>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                    <h2 class="wow slideInRight"><b>About our vehicle type</b></h2>
                    <img class="img-responsive mt-0 wow slideInLeft" src="assets\images\underline.png" width="20%" alt="underline">
            </div>
        </div>
        <div class="row wow slideInUp">
            <div class="col-12 col-md-4 mt-5 d-flex justify-content-center">
                    <div class="card mb-3  w-100">
                    <div class="row no-gutters text-center">
                        <div class="col-md-4">
                        <div id="carouselControls" class="carousel" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 set" src="assets\images\zuzukialto.jpg" alt="First slide">
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets\images\tatanano.jpg" alt="Second slide">
                                </div>
                            </div>
                        </div>
                        </div>
                    
                    
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Budget</h5>
                            <p class="card-text">Zuzuki Alto/Tata Nano<br>
                                    3 Passengers<br>
                                    Air Conditioned<br>
                                    Limited Baggage<br>
                                    <span class="badge badge-pill badge-secondary">$50</span></p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 mt-5 d-flex justify-content-center">
                     <div class="card mb-3 w-100" >
                        <div class="row no-gutters text-center">
                        <div class="col-md-4">
                        <img src="assets\images\wagonR.jpg" class="card-img" alt="city">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">City</h5>
                            <p class="card-text">Zuzuki WagonR<br>
                                    4 Passengers<br>
                                    Air Conditioned<br>
                                    Limited Baggage<br>
                                    <span class="badge badge-pill badge-secondary">$60</span></p>
                            
                        </div>
                        </div>
                </div>
                </div>
                </div>

                <div class="col-12 col-md-4 mt-5 d-flex justify-content-center">
                    <div class="card mb-3  w-100">
                    <div class="row no-gutters text-center">
                        <div class="col-md-4">
                        <div id="carouselControls" class="carousel" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 set" src="assets\images\prius.jpg" alt="First slide">
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets\images\axio.jpg" alt="Second slide">
                                </div>
                            </div>
                        </div>
                        </div>
                    
                    
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Car</h5>
                            <p class="card-text">Toyota Prius/Axio<br>
                                    4 Passengers<br>
                                    Air Conditioned<br>
                                    Sufficient Baggage<br>
                                    <span class="badge badge-pill badge-secondary">$70</span></p>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
                
                
        </div>
                
        <div class="row wow slideInUp">
        <div class="offset-md-2 col-12 col-md-4 mt-5 d-flex justify-content-center">
            <div class="card mb-3 w-100" >
                <div class="row no-gutters text-center">
                    <div class="col-md-4">
                    <img src="assets\images\kdh.jpg" class="card-img" alt="city">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Mini-Van</h5>
                        <p class="card-text">Toyota KDH<br>
                                9 Passengers<br>
                                Air Conditioned<br>
                                Sufficient Baggage<br>
                                    <span class="badge badge-pill badge-secondary">$80</span></p>
                        
                    </div>
                    </div>
                </div>
                </div>
                </div>


                <div class="col-12 col-md-4 mt-5 d-flex justify-content-center">
                    <div class="card mb-3 w-100" >
                        <div class="row no-gutters text-center">
                            <div class="col-md-4">
                            <img src="assets\images\hkdh.jpg" class="card-img" alt="city">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Van</h5>
                                <p class="card-text">Toyota KDH<br>
                                        14 Passengers<br>
                                        Air Conditioned<br>
                                        Sufficient Baggage
                                        <br>
                                    <span class="badge badge-pill badge-secondary">$90</span></p>
                                
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                </div>
                
         </div>
            
        <!-- <div class="row"> -->
            <!-- <div class="offset-md-3 col-12 col-md-6"> -->
                <form action="airportpickup_booking.php" method="POST" class="p-2">
                    <div class="row ">
                        <div class="col-12 text-center mt-5">
                            <h2>Airport pick up</h2>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="col-6 offset-3">
                            <div class="row mt-5">
                                <div class="col-12 form-group">
                                <lable><b>Vehicle Type:</b></lable>
                                    <select class="form-control w-100 input-box form-rounded" name="vtype">
                                        <option value="Budget">Budget</option>
                                        <option value="City">City</option>
                                        <option value="Car">Car</option>
                                        <option value="Minivan">Minivan</option>
                                        <option value="Van">Van</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <lable><b>Pick up date:</b></lable>
                                    <div class='input-group date'>
                                        <input type='date' class="form-control input-box form-rounded">   
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <lable><b>Pick up time:</b></lable>
                                    <div class='input-group time'>
                                        <input type='time' class="form-control input-box form-rounded">   
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Flight number:</b></lable>
                                    <input type='text' class="form-control input-box form-rounded" placeholder="Flight Number">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Email:</b></lable>
                                    <input type='email' name='email' class="form-control input-box form-rounded" placeholder="Email">
                                </div>
                            </div>
                    
                    

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Your Name:</b></lable>
                                    <div class="row">
                                    <div class="col-6">
                                    <input type='text'name="fname" class="form-control input-box form-rounded" placeholder="first name" required>
                                    </div>
                                    <div class="col-6">
                                    <input type='text' name="lname" class="form-control input-box form-rounded" placeholder="last name" required>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Contact no:</b></lable>
                                    <input type='text' name="pnumber" class="form-control input-box form-rounded" placeholder="Ex-0094123456789" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Country:</b></lable>
                                    <input type='text' name="country" class="form-control input-box form-rounded" placeholder="Ex-SriLanka" required>
                                </div>
                            </div>
                            
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" name="airport" class="btn btn-deep-orange">Reserve Vehicle</button>
                        </div>
                    </div>
                    </div>
                   </div>
                </form>
                <!-- </div> -->
            
         </div> 
<!-- </div> -->


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
                        <li><a href="gallery.php" class="item">Gallery</a></li>
                        <li><a href="#" class="item">Airport pick up</a></li>
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