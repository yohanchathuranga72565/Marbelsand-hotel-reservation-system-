<?php session_start();?>


<?php 

 include 'checkin.php';

 $room=0.0;
    $queryroom = "SELECT * FROM room_type";
    $resultsetroom = mysqli_query($connection,$queryroom);

    foreach($resultsetroom as $row){
        if($row['type_id']== 2){
            $room = $row['room_price'];


        }
    }

 if(isset($_SESSION['check'])){
 echo '<div class="modal fade" id="roomtype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLongTitle">Available Room Categories<br/>between ' .$checkin . ' and ' .$checkout . '</h5>
    </div>
     <div class="modal-body">
       <div class="container-fluid">';
       if($totalnoofroomsitem2<20){
        $freerooms=20-$totalnoofroomsitem2;
        echo '<div class="row">';
            echo '<div class="col-12 pb-3 d-flex justify-content-center">';

           echo ' <div class="card" style="width: 18rem;">
                <img src="assets\images\deluxe_ocean_facing.jpg" class="card-img-top img-responsive" alt="...">
                <div class="card-body">
                <p class="card-text"><b>Deluxe Ocean Facing room</b><br/>
                  Max: 3 Person(s)<br/>
                  Max: 2 Child(s)<br/>';
                  echo 'you have ' . $freerooms . ' free rooms </br>';
              echo '
              <span class="badge badge-pill badge-secondary">$'.$room.'</span>
                </p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                <a href="booknow.php?room_type=Deluxe ocean facing room" class="btn btn-sm btn-success">Book now</a>
                </div>
            </div>';

            echo '</div>';
            $freerooms=0;
        echo '</div>';
    }else{
        ?>
    
           <div class="row text-center text-danger">
               <h6><b>You have no any rooms to book in the room type !...</b></h6>
           </div>
    
    
        <?php
    } ?>
    <?php
       echo '</div>
     </div>
     <div class="modal-footer">
       <a href="deluxeocean.php" type="button" class="btn btn-success btn-sm">Close</a>
     </div>
  </div>
 </div>
</div>';
unset($_SESSION['check']);

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
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="contactus.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="map.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.theme.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> -->

    <title>Document</title>
</head>
<body>
    <!-- Nav bar start-->
    <?php include 'navbar.php';?>
    <!-- Nav bar end-->

    <!-- rooms header start-->
    <div id="header" class="header">
            <div class="row">
                <div class="col-12 wordnav">
                    <h1><b>Hotel Marble Sand<br/>
                    Deluxe Ocean Facing room</b></h1>
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
                    <li class="breadcrumb-item"><a href="rooms.php">Rooms</a></li>
                    <li class="breadcrumb-item active">Deluxe Ocean Facing room</li>
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
                        <img class="d-block w-100 h-50 set" src="assets\images\gallery\room2.jpg" alt="Los Angeles" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-50 set" src="assets\images\gallery\bathroom2.jpg" alt="Chicago" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-50 set" src="assets\images\gallery\balcony2.jpg" alt="New York" width="1100" height="500">
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
        </div>
    <!--room courasol end-->
    <br><hr>
    <!-- checkrooms start -->
    <div class="row">
        <div class="col-12 text-center">
            <h2><p>Check availability</p></h2>
        </div>
        </div>     
   <div class="row">
        <div class="offset-md-3 col-12 col-md-6">
        <form action="deluxeocean.php" method="POST">   
        <div class="row">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Check_In_date</lable><br/>
                            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input  class="form-control" id="check_in_date" name="checkin" type="text" readonly /> 
                                <span class="input-group-addon"> <i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Check_Out_Date</lable><br/>
                            <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input class="form-control" id="check_out_date" name="checkout" type="text" readonly />
                                <span class="input-group-addon"><i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" name="search" class="btn btn-deep-orange btn-sm">Book Now</button>
                        </div>
                    </div>
                    </form>
        
            </div>
        </div>

     <!-- checkrooms end -->
    <!--about the room start-->
    <div class="container mt-5">
    <div class="row row-content">
            <div class="col-12">
                <h2>Deluxe Ocean Facing room</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#peter"
                        role="tab" data-toggle="tab">Overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#danny" role="tab"
                        data-toggle="tab">Amenities</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="peter">
                        <br/>
                        <h3>About Hotel Marble Sand Hikkaduwa</h3>
                        <p class="text-justify">The sea as far as the eye can see with a welcoming decor. The luxury room is a cosy place to relax.The rooms are located on the 5th floor having an area of 35 sq. mts and offer you spectacular views of the Indian Ocean and  a view of the pool and the city . Enjoy watching films on a 32 -inch screen LCD TVs offerings a choice of multiple television channels .Enjoy a restful night's sleep in a wonderfully comfortable bed available in King-size or a Twin bedded room. Stay connected to your workplace with state of art technical facilities, wireless internet access at an additional cost . The rooms are equipped with warm lighting and a stylish marble bathroom with a separate shower cubical and a bath tub or just a shower cubicle with a rainfall shower head. Our Luxury rooms make your stay an experience to be treasured. Guest's are welcome to choose between smoking or non-smoking rooms.</p>
                        <div class="row">
                            <div class="col-6">
                                <b>Special Rooms</b><br/>
                                <ul>
                                    <li>available</li>
                                    <li>Max: 3 Person(s)</li>
                                    <li>Max: 2 Child(s)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="danny">
                        <br/>
                        <p class="text-justify">Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.</p>
                        <div class="row">
                            <div class="col-6">
                                <b>ENTERTAINMENT</b><br/>
                                <ul>
                                    <li>LCD Television</li>
                                    <li>Video and DVD Player</li>
                                </ul>

                                <b>INTERNET ACCESS</b><br/>
                                <ul>
                                    <li>Wi-Fi Internet</li>
                                </ul>
                                <b>IMPECCABLE SERVICE</b><br/>
                                <ul>
                                    <li>24-Hour Room Service</li>
                                </ul>
                                <b>ROOM FEATURES</b><br/>
                                <ul>
                                    <li>Mini Bar</li>
                                    <li>Hair Dryer</li>
                                </ul>
                                
                            </div>
                   
                    </div>
                </div>


            </div>
       </div>
       </div>
</div>
    <!--about the room end-->

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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
    <script src="node_modules/jquery-ui/jquery-ui.min.js"></script>
    <script>
        //  $(function () {
        //     $("#datepicker").datepicker({ 
        //           autoclose: true, 
        //           todayHighlight: true
        //     }).datepicker('update', new Date());
        //   });

        //   $(function () {
        //     $("#datepicker1").datepicker({ 
        //           autoclose: true, 
        //           todayHighlight: true
                  
        //     }).datepicker('update', new Date());
        //   });

          // for validation

        var selectdate=0;
        var today = new Date();
        var month=today.getMonth()+1;
        var day=today.getDate();
        if(month<10){
          month="0"+month;
        }
        if(day<10){
          day="0"+day;
        }
        var date = today.getFullYear()+'-'+month+'-'+day;
         $(document).ready(function () {
        
          $("#check_in_date").attr("value",date);
            $("#check_in_date").datepicker({ 
              showAnim : 'drop',
              numberOfMonth : 1,
              minDate : new Date(),
              dateFormat: 'yy-mm-dd',
              onClose : function (selectedDate){
                $("#check_out_date").datepicker("option","minDate",selectedDate);
              }
              // minDate : new Date(),
              // showOtherMonths : true

              
            });
            $("#check_out_date").attr("value",date);
            $("#check_out_date").datepicker({ 
              showAnim : 'drop',
              numberOfMonth : 1,
              minDate : new Date(),
              dateFormat: 'yy-mm-dd',
              onClose : function (selectedDate){
                $("#check_in_date").datepicker("option","maxDate",selectedDate);
              }
              // minDate : new Date(),
              // showOtherMonths : true

              
            });
             
          });
          
          
    </script>

<script>
      $(document).ready(function(){
          $('#roomtype').modal('show');
      });
    </script>

    
</body>
</html>