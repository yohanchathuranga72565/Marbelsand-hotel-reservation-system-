
<?php session_start();?>
<?php require_once('indexfunctions.php'); ?>
<?php require_once('connection.php'); ?>
<?php
$errors=array();
$name='';
$email='';
$password_1='';
$password_2='';
$flag=0;



if(isset($_POST['reg_user'])){
  $name=trim($_POST['name']);
  $email=trim($_POST['email']);
  $password_1=trim($_POST['password_1']);
  $password_2=trim($_POST['password_2']);
  
  if(empty(trim($_POST['name']))){
    $errors[]='Name is required';
  }
  if(empty(trim($_POST['email']))){
    $errors[]='email is required';
  }
  if(empty(trim($_POST['password_1']))){
    $errors[]='Password is required';
  }
  if(empty(trim($_POST['password_2']))){
    $errors[]='Password is required';
  }

  //checking max length
 
      
        if(strlen(trim($_POST['name'])) > 50){
            $errors[]=  ' must be less than 50 characters';
        }
        if(strlen(trim($_POST['email'])) > 100){
          $errors[]=  ' must be less than 100 characters';
         }
         if(strlen(trim($_POST['password_1'])) > 30){
          $errors[]=  ' must be less than 30 characters';
      }
      if(strlen(trim($_POST['password_2'])) > 30){
        $errors[]=  ' must be less than 30 characters';
    }
      

  //checking email address
  if(!is_email(trim($_POST['email']))){
    $errors[]='email address is invalid';

  }

  //checking email address already exists
  $email=mysqli_real_escape_string($connection,trim($_POST['email']));
  $query="SELECT * FROM login WHERE email='{$email}' LIMIT 1";
  $result_set = mysqli_query($connection,$query);
  if($result_set){
    if(mysqli_num_rows($result_set) == 1){
        $errors[] = 'Email address is already exists';
        $_SESSION['emailexist']=1;
        header('Location:index.php');
        exit;
    }
  }

  if(empty($errors)){
    $password_1=mysqli_real_escape_string($connection,trim($_POST['password_1']));
    $password_2=mysqli_real_escape_string($connection,trim($_POST['password_2']));
    //no errors found adding new records
    $hashed_password=sha1($password_1);
    $query="INSERT INTO login (email,pass_word,user_type) VALUES ('{$email}','{$hashed_password}','user')";
    $result_set1 = mysqli_query($connection,$query);
    
    if($result_set1){
        $_SESSION['flag']=1;
        //header('Location:index.php?user_added=true');
        header('Location:index.php');
        exit;
    }
    else{
      $_SESSION['flag']=0;
      $errors[]= $result . 'Failed to add new record';
      $errors[]= mysqli_error($connection);
      header('Location:index.php');
      exit;
    }
  }
 
}

if(isset($_POST['login_user'])){

    $errors=array();
    $msg=array();
    $uemail='';
    $upassword='';
    $uemail=mysqli_real_escape_string($connection,trim($_POST['uemail']));
    $upassword=mysqli_real_escape_string($connection,trim($_POST['upassword']));
    $hashed_password=sha1($upassword);

    $query="SELECT * FROM login WHERE email='{$uemail}' AND pass_word='{$hashed_password}' LIMIT 1";
    $result_set = mysqli_query($connection,$query);

    if($result_set){
      if(mysqli_num_rows($result_set) == 1){
          //find a user
          $user=mysqli_fetch_assoc($result_set);
          $_SESSION['user_id']=$user['user_id'];
          $_SESSION['email']=$user['email'];
          $_SESSION['lflag']=1;
          $msg[]='login success';
          //header('Location:index.php');
          header('Location:index.php');
          exit;
          
      }
      else{
        $_SESSION['lflag']=0;
        $errors[]='user name is invalid';
        header('Location:index.php');
        exit;
      }
    }
    else{
        $errors[]='Database query failed';
    }

   

}


//search room
include 'searchroom.php';


 
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
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    
    <title>Document</title>
</head>
<body>
<!-- Nav bar start-->
  <?php include 'navbar.php';?>
    
    <!-- Nav bar end-->
    
    <!-- carousel start-->
    <div class="container-fluid m-0">
        
        <div class="row">
            
                <div id="carouselControls" class="carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselControls" data-slide-to="1"></li>
                  <li data-target="#carouselControls" data-slide-to="2"></li>
                  <li data-target="#carouselControls" data-slide-to="3"></li>
                </ol>

                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100 set" src="assets\images\diningroom1.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                        <p style="background:rgba(0, 0, 0, 0.8);">From casual, all day enteries to formal, fine dining, guests<br>can look forward to a wide selection of delectable<br>
                          cuisines and refreshing drinks.</p>
                        </div>
                      </div>
                      
            
                      <div class="carousel-item">
                        <img class="d-block w-100" src="assets\images\bedroom.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                        <p style="background:rgba(0, 0, 0, 0.8);">Offering 100 rooms and suites with <br>
                          beautiful beach, the hotel faces the Indian ocean.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="assets\images\swimmingpool.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                        <p style="background:rgba(0, 0, 0, 0.8);">Hotel marble sand provides a host of excellent options to help<br>
                          you work, rest or play.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="assets\images\hotel.jpg" alt="Fourth slide">
                        <div class="carousel-caption d-none d-md-block">
                        <p style="background:rgba(0, 0, 0, 0.8);">Hotel marble sand is in Hikkaduwa located 114 km away from Bandaranayake International<br>
                          Airport.</p>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  
            </div>
        </div>
    <!-- carousel end-->
    
    <?php
    
        /*echo $email;
        if(!empty($errors)){
          echo 'There were errors on your form';
          foreach($errors as $error){
              echo $error . '<br/>';
          }
        }
        if(!empty($msg)){
          echo 'There were errors on your form';
          foreach($msg as $error){
              echo $error . '<br/>';
          }
        }*/
        
    //     echo $checkin . '</br>';
    //     echo $checkout . '</br>';
    //     echo $adults . '</br>';
    //     echo $children . '</br>';
        

    //     foreach($room_no as $error){
    //      echo $error . '<br/>';
    //   }

    //   foreach($bookdays as $error){
    //     echo $error . '<br/>';
    //  }
    //  echo '</br>';
    //  foreach($specifiedbookdays as $error){
    //   echo $error . '<br/>';
    // }

    // echo '</br>';
    //  foreach($bookingroomid as $error){
    //   echo $error . '<br/>';
    // }
    // echo '</br>';
    // echo $totalnoofroomsitem1;
    // echo '</br>';
    // echo $totalnoofroomsitem2;
      ?>

    <!-- checked in out form start-->

    <div class="container-fluid
     cap">
      <form action="index.php" method="POST">
          <div class="row p-1">
              <div class='col-sm-4 offset-sm-2 col-12'>
                  
                        <label for="" style="color:white">Check-in</label>
                        <div class='input-group date'>
                        <input type='date' name="checkin" class="form-control" required>   
                      </div>

              </div>

              <div class='col-sm-4 col-12'>
                  
                      <label for="" style="color:white">Check-out</label>
                      <div class='input-group date'>
                          <input type='date' id="picker" name="checkout" class="form-control" required>  
                      
                      
                  </div>
              </div>  
          </div>

          <div class="row p-1">
              <div class='col-sm-2 offset-sm-4 col-4 offset-2'>
                  
                        <label for="" style="color:white">Adults</label>
                        <select class="form-control w-100 input-box form-rounded" name="adults">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                
                            </select>

              </div>

              <div class='col-sm-2  col-4'>
                  
                  <label for="" style="color:white">Children</label>
                  <select class="form-control w-100 input-box form-rounded" name="children">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          
                          
                      </select>

        </div>

               
          </div>

          <div class="row">
            <div class='col-12 text-center'>
                <button type="submit" name="search" class="btn btn-default  input-box view_data"  data-toggle="modal" href="#roomtype">Search</button>
            </div>
          </div>
        </form>
        </div>
    <!-- checked in out form end-->

    <!-- signup and login start-->
    <?php if(!isset($_SESSION['user_id'])){
     echo '<div class="jumbotron mt-5" style="background-color:black;">';
     echo '<div class="container-fluid mt-3" ">';
     echo '<div class="row">';
        echo '<div class="col-12 col-md-6 mt-4" style="color:white; text-align:center;">';
            
            echo '<h4>Register in our website and get more discounts....</h4>';
        echo '</div>';
        echo '<div class="col-md-6" style="text-align:center;">';
                echo '<button class="btn btn-default btn-round" data-toggle="modal" data-target="#modalLoginForm">Login</button>';
                echo '<button class="btn btn-default" data-toggle="modal" data-target="#modalRegisterForm">Register</button>';
            
        echo '</div>';
      echo '</div>';
    echo '</div>';
    echo '</div>';
    }
    ?>

    <!-- login start-->
    <form action="index.php" method="POST">
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <input type="email"  name="uemail" class="form-control validate" required placeholder="Your email" >
                
                </div>

                <div class="md-form mb-4">
                  <i class="fa fa-lock prefix grey-text"></i>
                  <input type="password"  name="upassword" class="form-control validate" placeholder="Your password">
     
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="login_user" class="btn btn-default">Login</button> 
              </div>
            </div>
          </div>
    </div>
</form>
    <!-- login end-->
    <!-- signup start-->
    
    <form action="index.php" method="POST">
      <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            
        
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text"  name="name" class="form-control validate" placeholder="Your name" required <?php echo 'value=' . $name ;?> >

              </div>
              <div class="md-form mb-5">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" name="email" class="form-control validate"  placeholder="Your email" required <?php echo 'value=' . $email ;?> >
              </div>

              <div class="md-form mb-4">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" name="password_1"  class="form-control validate"  placeholder="Your password" required>
              
              </div>

              <div class="md-form mb-4">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" name="password_2" class="form-control validate"  placeholder="Confirm password" required>
         
              </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="submit" name="reg_user" class="btn btn-deep-orange" onclick="validation();" >Sign Up</button>
            </div>
            
            
            
          </div>
        </div>
        
      </div>
      </form>
      


    <!-- signup end-->
    
    

    <!-- signup and login end-->

    
        <hr/>
    <!--introduction start-->
    <div class="container-fluid mt-3 pt-3">
      <div class="row text-modify">
        <div class="col-md-4 col-12"></div>
        <div class="col-md-4 col-12">
            <h2 class="wow slideInLeft">WELCOME TO HOTEL MARBLE SAND HIKKADUWA</h2>
            <img class="img-responsive mt-0 wow slideInRight" src="assets\images\underline.png" width="50%" alt="underline">
            <p class="wow slideInLeft">The <b>Hotel Marble Sand</b> which is located in Hikkaduwa 
             of Sri Lanka is a star class hotel that is
               perfect for corporate and leisure travellers alike. The hotel boasts of luxury
                and classy guestrooms while all are equipped with modern day amenities.
                 Hotel Marble Sand is the perfect location to enjoy and spend your time. From a range of recreation facilities
                   to luxurious services, the hotel is the perfect getaway in the city.</p>
        </div>
        <div class="col-md-4 col-12"></div>
      </div>
    </div>
    <!--introduction end-->
    <hr/>
    <!--hotel rooms start-->
    <div class="container">
        <div class="row wow slideInUp">
         
          <div class="col-12  col-md-4 pb-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets\images\delux_city_facing.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
            <div class="card-body">
              <p class="card-text"><b>Deluxe City Facing room</b><br/>
              Max: 3 Person(s)<br/>
              Max: 2 Child(s)<br/>
              Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$135</span>
              <span class="badge badge-pill badge-secondary"><del>$150</del></span> 
              <a href="deluxecity.php" class="btn btn-sm btn-deep-orange">More Information>></a> 
            </p>
            </div>
      
          </div>
          </div>

          

          <div class="col-12 col-md-4 pb-3 d-flex justify-content-center">
          <div class="card wow slideInUp" style="width: 18rem;">
            <img src="assets\images\deluxe_ocean_facing.jpg" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
            <p class="card-text"><b>Deluxe Ocean Facing room</b><br/>
              Max: 3 Person(s)<br/>
              Max: 2 Child(s)<br/>
              Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$126</span>
              <span class="badge badge-pill badge-secondary"><del>$140</del></span>
              <a href="deluxeocean.php" class="btn btn-sm btn-deep-orange">More Information>></a>
            </p>
            </div>
          </div>
          </div>

          <div class="col-12  col-md-4 pb-3 d-flex justify-content-center">
          <div class="card wow slideInUp" style="width: 18rem;">
            <img src="assets\images\luxury_city_view.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
            <div class="card-body">
              <p class="card-text"><b>Luxury City View room</b><br/>
              Max: 3 Person(s)<br/>
              Max: 2 Child(s)<br/>
              Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$117</span>
              <span class="badge badge-pill badge-secondary"><del>$130</del></span>
              <a href="luxurycity.php" class="btn btn-sm btn-deep-orange">More Information>></a>
            </p>
            </div>
          </div>
          </div>


        </div>

        <div class="row wow slideInUp">

            <div class="offset-md-2 col-12  col-md-4 pb-3 d-flex justify-content-center">
            <div class="card wow slideInUp" style="width: 18rem;">
              <img src="assets\images\luxury_ocean_view.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
              <div class="card-body">
                <p class="card-text"><b>Luxury Ocean View room</b><br/>
                Max: 3 Person(s)<br/>
                Max: 2 Child(s)<br/>
                Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$108</span>
              <span class="badge badge-pill badge-secondary"><del>$120</del></span>
              <a href="luxuryocean.php" class="btn btn-sm btn-deep-orange">More Information>></a>
              </p>
              </div>
            </div>
            </div>



            <div class=" col-md-4 pb-3 d-flex justify-content-center">
            
            <div class="card wow slideInUp" style="width: 18rem;">
              <img src="assets\images\executive_suits.jpg" class="card-img-top img-responsive" alt="...">
              <div class="card-body">
              <p class="card-text"><b>Executive Suite</b><br/>
                Max: 3 Person(s)<br/>
                Max: 2 Child(s) <br/>
                Get 10% discount by booking before 21st April 2020</br>
              <span class="badge badge-pill badge-secondary">$90</span>
              <span class="badge badge-pill badge-secondary"><del>$100</del></span>
              <a href="executivesuit.php" class="btn btn-sm btn-deep-orange">More Information>></a>  
              </p>
              </div>
            </div>
            </div>

            

            </div>
        </div>
    </div>
    <!--hotel rooms end-->
    
    <!--around the hotel start-->
      <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-12 text-center">
            <div class="word wow slideInRight">What’s around, you ask?</div><br/>
            <p class="wow slideInLeft">Take a walk in the little lanes of the Galle Fort, stop by a turtle hatchery, see the traditional Ambalangoda mask factory,<br/> snorkel and dive to see the beautiful underwater life or visit the Sinharaja Forest and leave all charmed.</p>
            </div>
        </div>
      </div>

      <div class="container">
        <div class="row wow slideInUp">
          <div class="col-md-4 col-12 d-flex justify-content-center mt-1">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\stilffishing.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h5 class="card-title"><i>Family and Fun</i></h5>
              <p class="card-text">Stilt Fishing-Stay aligned when you cast a line.</p>
              <p class="card-text"><a href="excursion.php" class="btn btn-sm btn-deep-orange">Our Recommendation</a></p>
            </div>
          </div>
          </div>

          <div class="col-md-4 col-12 d-flex justify-content-center mt-1">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\crab.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h5 class="card-title"><i>Food and Drinks</i></h5>
              <p class="card-text">The Crab-Immerse yourself in scrumptiousness.</p>
              <p class="card-text"><a href="excursion.php" class="btn btn-sm btn-deep-orange">Our Recommendation</a></p>
            </div>
          </div>
          </div>

          <div class="col-md-4 col-12 d-flex justify-content-center mt-1">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\whale.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h5 class="card-title"><i>Nature and Wildlife</i></h5>
              <p class="card-text">Whale watching at Mirissa-Have a Whale of a time!</p>
              <p class="card-text"><a href="excursion.php" class="btn btn-sm btn-deep-orange">Our Recommendation</a></p>
            </div>
          </div>
          </div>

        </div>
      </div>

    <!--around the hotel end-->

    <!--some explanation start-->
    <div id="header" class="header1 mt-5">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 p-5 wow slideInUp">
                  <h4><i>Perfect place to stay-We absolutely love this hotel! The room was lovely and we loved sitting on the balcony
                    looking over the swimming pool and the sea, so beautiful! Such a lovely hotel and brilliant service, would 
                    definitely go back if in or near Hikkaduwa!
</i></h4>
                    
                    
                </div>
            </div>
        </div>
    <!--some explanation end-->

    
		
		
		

    <!-- footer start-->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="item">Home</a></li>
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
      

        if(isset($_SESSION['flag'])){
          if($_SESSION['flag']==1){
          echo 'swal({
            title: "Thank you!",
            text: "Registered Successfully!",
            icon: "success",
            button: "Ok",
          });';
          unset($_SESSION['flag']);
          //session_destroy();
          }}
          elseif($_SESSION['emailexist']==1){
            echo 'swal({
              title: "Oops!",
              text: "Email address is already exist!",
              icon: "error",
              button: "Ok",
            });';
           unset($_SESSION['emailexist']);
          

        }else{
          if($_SESSION['flag']==0){
          echo 'swal({
            title: "Oops!",
            text: "Try again!",
            icon: "error",
            button: "Ok",
          });';
         unset($_SESSION['flag']);
         // session_destroy();
         }
        }

         
      
     echo '</script>';
    ?>

<?php
      echo '<script>';
      if(isset($_SESSION['lflag'])){
          if($_SESSION['lflag']==0){
          echo 'swal({
            title: "Oops",
            text: "Invalid username and password!",
            icon: "error",
            button: "Ok",
          });';
          
          //session_destroy();
          }unset($_SESSION['lflag']);
         }
         else{
          unset($_SESSION['lflag']);
         }
     echo '</script>';

     
    ?>

    <script>
      $(document).ready(function(){
          $('#roomtype').modal('show');
      });
    </script>
  
    
</body>
</html>