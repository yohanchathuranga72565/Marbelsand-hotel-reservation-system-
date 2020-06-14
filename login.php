<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <title>Document</title>
</head>
<body class="bg">

    <!-- Nav bar start-->

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto" href="./index.php"><img src="assets\images\newlogo.png" height="30" width="41"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="aboutus.php">About Us</a></li>
                        <li class="nav-item "><a class="nav-link" href="rooms.php">Rooms</a></li>
                        <li class="nav-item "><a class="nav-link" href="#">Reservation</a></li>
                        <li class="nav-item "><a class="nav-link" href="#">Gallery</a></li>
                        <li class="nav-item "><a class="nav-link" href="#">Airport Pick Up</a></li>
                        <li class="nav-item "><a class="nav-link" href="#">Excursions</a></li>
                        <li class="nav-item "><a class="nav-link" href="#">Contact Us</a></li>
                        <li class="nav-item "><a class="nav-link" href="#"></a></li>
                        <li class="nav-item"><a class="nav-link btn btn-success btn-sm" href="signup.php">Register</a></li>
                        <li class="nav-item "><a class="nav-link" href="#"></a></li>
                        <li class="nav-item "><a class="nav-link btn btn-success btn-sm" href="#">Login</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    <!-- Nav bar end-->
    <div class="container-fluid" >
        <div class="row" height="100%">
            <div class="col-lg-4 col-md-12" ></div>
            <div class="col-lg-4 col-md-12" >
                <form action="" id="log">
                    <h1>Login Form</h1>
                    <center><img class="img img-responsive rounded-circle" src="assets/images/login.jpg" alt="loginimg"></center>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control input-box" placeholder="Email">
                    </div>
                    <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control input-box" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label for=""><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block input-box">Login</button>
                    <br>
                    <a href="signup.php"><center><b>Create an account</b></center></a>
                </form>
            </div>
            <div class="col-lg-4 col-md-12" ></div>
        </div>
    </div>

    <footer class="footer  pt-5">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="item">Home</a></li>
                        <li><a href="#" class="item">About us</a></li>
                        <li><a href="#" class="item">Rooms</a></li>
                        <li><a href="#" class="item">Reservation</a></li>
                        <li><a href="#" class="item">Gallery</a></li>
                        <li><a href="#" class="item">Airport pick up</a></li>
                        <li><a href="#" class="item">Excursions</a></li>
                        <li><a href="#" class="item">Contacy us</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
		              121, Clear Water Bay Road<br>
		              Clear Water Bay, Kowloon<br>
		              HONG KONG<br>
		              <i class="fa fa-phone fa-lg fa-fw"></i> : +852 1234 5678<br>
		              <i class="fa fa-fax fa-lg fa-fw"></i> : +852 8765 4321<br>
		              <i class="fa fa-envelope fa-lg fa-fws"></i> : <a href="mailto:confusion@food.net" class="item">confusion@food.net</a>
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

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
    
</html>
