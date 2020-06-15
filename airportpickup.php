<?php session_start();

include 'connection.php';
if(isset($_GET['order_id']) && isset($_SESSION['name'])){
    if(isset($_SESSION['email'])){
        $type="registered";

        $query000="SELECT registered_customer_id FROM registered_customer WHERE email='{$_SESSION['email']}'";
        $result_set000 = mysqli_query($connection,$query000);
        $registered_customer_id=0;
            foreach($result_set000 as $row000){
                $registered_customer_id=$row000['registered_customer_id'];
            }
        $query="INSERT INTO customer (registered_customer_id,customer_type,name,email,contact_no,age,country) VALUES ('{$registered_customer_id}','{$type}','{$_SESSION['name']}','{$_SESSION['email2']}','{$_SESSION['pnumber']}','{$_SESSION['age']}','{$_SESSION['country']}')";
        $result_set = mysqli_query($connection,$query);
    }
    else{
        $type="unregistered";
        $query="INSERT INTO customer (customer_type,name,email,contact_no,age,country) VALUES ('{$type}','{$_SESSION['name']}','{$_SESSION['email2']}','{$_SESSION['pnumber']}','{$_SESSION['age']}','{$_SESSION['country']}')";
        $result_set = mysqli_query($connection,$query);
    }

    

    $query1="SELECT * FROM vehicle_reservation WHERE pick_up_date='{$_SESSION['date']}'";
    $result_set1 = mysqli_query($connection,$query1);


//     if($result_set1){
//         if(mysqli_num_rows($result_set1)>0){
//             foreach($result_set1 as $row){
//             $bookvehicle[]=$row['vehicle_id'];
//         }    
//     }
//         echo 'run 1';
// }
    
    $query2="SELECT * FROM vehicle";
    $result_set2 = mysqli_query($connection,$query2);
    
    // if(mysqli_num_rows($result_set2)>0){
    //     foreach($result_set2 as $row){
    //         $vehicle_id[]=$row['vehicle_id'];
    //     }
    //     echo 'run 2';
    // }
    $setvehicle=0;
    $customer_id=0;
    $payment_id=0;
    // if(mysqli_num_rows($result_set1)>0){
        foreach($result_set1 as $bovehicle){
            foreach($result_set2 as $vehicle){
                if(($bovehicle['vehicle_id']!=$vehicle['vehicle_id']) && ($_SESSION['vtype']==$vehicle['vehicle_type']) ){
                    $setvehicle=$vehicle['vehicle_id'];
                    break;
                }
            }
        }
    // }
    // else{
    //     foreach($result_set2 as $vehicle){
    //         if($_SESSION['vtype']==$vehicle['vehicle_type']){
    //             $setvehicle=$vehicle['vehicle_id'];
    //         }
    //     }
    // }

    $query3="SELECT * FROM customer";
    $result_set3 = mysqli_query($connection,$query3);
    if(mysqli_num_rows($result_set3)>0){
        foreach($result_set3 as $row){
            $customer_id=$row['customer_id'];
        }
    }
    if(mysqli_num_rows($result_set1)>0){
        if($setvehicle!=0){
            $query4="INSERT INTO vehicle_reservation (vehicle_id,customer_id,flight_no,pick_up_date,pick_up_time) VALUES ('{$setvehicle}','{$customer_id}','{$_SESSION['fno']}','{$_SESSION['date']}','{$_SESSION['time']}')";
            $result_set4 = mysqli_query($connection,$query4);
            
        }
        else{
            echo 'no vehicle';
        }
    }
    else{
        foreach($result_set2 as $vehicle){
            if($_SESSION['vtype']==$vehicle['vehicle_type']){
                $setvehicle=$vehicle['vehicle_id'];
                $query4="INSERT INTO vehicle_reservation (vehicle_id,customer_id,flight_no,pick_up_date,pick_up_time) VALUES ('{$setvehicle}','{$customer_id}','{$_SESSION['fno']}','{$_SESSION['date']}','{$_SESSION['time']}')";
                $result_set4 = mysqli_query($connection,$query4);
            }
        }

    }

    $query5="SELECT * FROM vehicle_reservation";
    $result_set5 = mysqli_query($connection,$query5);

    
    $reserve_id=0;
    if(mysqli_num_rows($result_set5)>0){
        foreach($result_set5 as $row){
            $reserve_id=$row['vehicle_reservation_id'];
        }
    }
    $query6="INSERT INTO payment (customer_id,reservation_id,amount,payment_method) VALUES ('{$customer_id}','{$reserve_id}','{$_SESSION['amount']}','online')";
    $result_set6 = mysqli_query($connection,$query6);

    

    $query7="SELECT * FROM payment";
    $result_set7 = mysqli_query($connection,$query7);
    if(mysqli_num_rows($result_set7)>0){
        foreach($result_set7 as $row){
            $payment_id=$row['payment_id'];
        }
    }

    $query8="UPDATE vehicle_reservation SET payment_id='{$payment_id}' WHERE customer_id='{$customer_id}'";
    $query_run=mysqli_query($connection,$query8);

    // header('Location:airportpickup.php');

    include 'airportEmail.php';


    unset($_SESSION['vtype']);
    unset($_SESSION['date']);
    unset($_SESSION['time']);
    unset($_SESSION['fno']);
    unset($_SESSION['email2']);
    unset($_SESSION['name']);
    unset($_SESSION['pnumber']);
    unset($_SESSION['country']);
    unset($_SESSION['age']);
    unset($_SESSION['amount']);

   


    // header('Location:airportpickup.php');
    

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
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="airportpickup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.theme.min.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">



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
                                    <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input  class="form-control" id="check_in_date" name="date" type="text" readonly /> 
                                        <span class="input-group-addon"> <i class="fa fa-calendar p-1 mt-1"></i></span>
                                    </div> 
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <lable><b>Pick up time:</b></lable>
                                    
                                    <input type='time' class="form-control input-box form-rounded" id="time" name="time" placeholder="Time" required/>
                                      
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Flight number:</b></lable>
                                    <input type='text' id="fno" name="fno" class="form-control input-box form-rounded" placeholder="Flight Number" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Email:</b></lable>
                                        <input type='email' id="email" name='email' class="form-control input-box form-rounded"  placeholder="Email" <?php if(isset($_SESSION['email'])){?> readonly value =<?php echo $_SESSION['email']; }?> reqiured>
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
                                    <lable><b>First Name:</b></lable><br/>
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
                                    <lable><b>Contact no:</b></lable>
                                    <input type='text' name="pnumber" class="form-control input-box form-rounded" placeholder="Ex-0094123456789" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Country:</b></lable>
                                    <input type='text' id="country" name="country" class="form-control input-box form-rounded" placeholder="Ex-SriLanka" required>
                                </div>
                            </div>
                            
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" name="airport" class="btn btn-default btn-sm">Reserve Vehicle</button>
                        </div>
                    </div>
                    </div>
                   </div>
                </form>
                <!-- </div> -->
            
         </div> 
<!-- </div> -->


     <!-- footer start-->
     <footer class="footer pt-5">
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
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/jquery-ui/jquery-ui.min.js"></script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
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

<script>
    //   $(function () {
    //         $("#datepicker").datepicker({ 
    //               autoclose: true, 
    //               todayHighlight: true
    //         }).datepicker('update', new Date());
    //       });      
    </script>
<?php
echo '<script>';
if(isset($_SESSION['emailsent'])){
            if($_SESSION['emailsent']==1){ 
            echo 'swal({
              title: "Thank you!",
              text: "Reservation Successfully!",
              icon: "success",
              button: "Ok",
            });';
            
            //session_destroy();
            unset($_SESSION['emailsent']);}
        }
        
           
        unset($_SESSION['emailsent']);  
     echo '</script>';
    ?>

        <script>
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

            $(document).ready(function(){
                $("#check_in_date").attr("value",date);
                $("#check_in_date").datepicker({ 
              showAnim : 'drop',
              numberOfMonth : 1,
              minDate : new Date(),
              dateFormat: 'yy-mm-dd'
              // minDate : new Date(),
              // showOtherMonths : true 
            });

            });
        </script>

        <script>
            // bootstrapValidate('#fno', 'regex:^(([A-Z]{2})|([A-Z][0-9])|([0-9][A-Z]))[1-9]([0-9]{1,3})?$:Please fulfill my regex')
            bootstrapValidate('#email', 'email:Enter a valid email address')
            bootstrapValidate(['#fname','#lname','#country'], 'alpha:You can only input alphabetic characters')
            bootstrapValidate('#age', 'regex:^[1-9]+$:This is not a valid age')
        </script>

        
        
</body>
</html>