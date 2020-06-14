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
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css"/> -->

    <title>Document</title>
</head>
<body>
    <!-- Nav bar start-->
    <?php include 'navbar.php';?>
    <!-- Nav bar end-->
    
    <div class="container-fluid">
        <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"></li>   
                </ol>
        </div>
        <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"></li>   
                </ol>
        </div>
        <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"><a href="rooms.php">Rooms</a></li>
                    <li class="breadcrumb-item active">Room reservation form</li>   
                </ol>
        </div>
    </div>
        <hr/>
    <!--room courasol start-->
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                    
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-50 set" src="assets\images\gallery\room1.jpg" alt="Los Angeles" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-50 set" src="assets\images\gallery\bathroom1.jpg" alt="Chicago" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-50 set" src="assets\images\gallery\balcony1.jpg" alt="New York" width="1100" height="500">
                    </div>
                    
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    
                </div>
            </div>
        </div>
    <!--room courasol end-->
    <div class="row">
            <div class="offset-md-3 col-12 col-md-6">
                <form action="room_booking.php" class="p-2" method="post">
                    <div class="row ">
                        <div class="col-12 text-center mt-5">
                            <h2>personal Information</h2>
                        </div>
                    </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    
                                    <div class="row">
                                    
                                    <div class="col-4">
                                    <lable><b>First Name:</b></lable><br/>
                                    <input type='text' id="fname" name="fname" class="form-control input-box form-rounded" placeholder="first name" required>
                                    </div>
                                    <div class="col-4">
                                    <lable><b>Last Name:</b></lable><br/>
                                    <input type='text' id="lname" name="lname" class="form-control input-box form-rounded" placeholder="last name" required>
                                    </div>
                                    <div class="col-4">
                                    <lable><b>Age:</b></lable><br/>
                                    <input type='number' id="age" name="age" class="form-control input-box form-rounded" placeholder="Ex-18" required>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Email:</b></lable>
                                    <input type='email' id="email" name='email' class="form-control input-box form-rounded" placeholder="Email" <?php if(isset($_SESSION['email'])){?> readonly value =<?php echo $_SESSION['email']; }?> required>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Contact no:</b></lable>
                                    <input type='text' id="pnumber" name="pnumber" class="form-control input-box form-rounded" placeholder="Ex-0094123456789" required>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Country:</b></lable>
                                    <input type='text' id="country" name="country" class="form-control input-box form-rounded" placeholder="Ex-SriLanka" required>
                                </div>
                            </div>
                             
                            
                            


                    <div class="row ">
                        <div class="col-12 text-center mt-5">
                            <h2>Reservation Information</h2>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-12 form-group">
                            <lable><b> Room Type:</b></lable>
                                <input  class="form-control input-box form-rounded" id="roomtype" name="room_type" type="text" value="<?php echo $_GET['room_type'];?>" readonly />   
                            </div>
                        </div>

                    <div class="row">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Check_In_date</lable><br/>
                            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input  class="form-control" id="check_in_date" name="checkin" type="text" value=<?php if(isset($_SESSION['checkin'])){echo $_SESSION['checkin'];}?> readonly> 
                                <span class="input-group-addon"> <i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Check_Out_Date</lable><br/>
                            <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input class="form-control" id="check_out_date" name="checkout" type="text" value=<?php echo $_SESSION['checkout'];?> readonly />
                                <span class="input-group-addon"><i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-12 form-group">
                        
                                <lable><b> No of Rooms:</b></lable>
                                <select class="form-control w-100 input-box form-rounded" name="no_of_rooms">
                                        
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        
                                    </select>

                    </div>
                </div>
 
                    
            <div class="row">
                    <div class="col-6 form-group">
                        
                        <lable><b> Adults:</b></lable>
                        <select class="form-control w-100 input-box form-rounded" name="adults">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                                        
                        </select>

                    </div>

                    <div class="col-6 form-group">
                        
                        <lable><b> Children:</b></lable>
                        <select class="form-control w-100 input-box form-rounded" name="children">
                            <option value="1">1</option>
                            <option value="2">2</option>                           
                        </select>
                    </div>
                    </div>
        

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" name="room" class="btn btn-default btn-sm">Confirm</button>
                        </div>
                    </div> 

                </form>

                
            </div>
        </div>






    
    

     <!-- footer start-->
     <footer class="footer mt-5  pt-5">
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
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>  -->

    <!-- <script>
         $(function () {
            $("#datepicker").datepicker({ 
                  autoclose: true, 
                  todayHighlight: true
            }).datepicker('update', new Date());
          });

          $(function () {
            $("#datepicker1").datepicker({ 
                  autoclose: true, 
                  todayHighlight: true
                  
            }).datepicker('update', new Date());
          });

          // for validation
          
          
    </script> -->
    <script>
        bootstrapValidate(['#fname','#lname','#country'], 'alpha:You can only input alphabetic characters')
        bootstrapValidate('#age', 'regex:^[1-9]+$:This is not a valid age')
        bootstrapValidate('#email', 'email:Enter a valid email address')
    </script>
    
</body>
</html>