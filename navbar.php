<nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php 
                      if(isset($_SESSION['user_id'])) {
                        echo '<div class="dropdown">';
                        echo '<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">';
                        echo '<i class="fa fa-user fa-lg"></i>';
                        echo ' ' . $_SESSION['email'];
                        echo '</button>';
                        echo '<div class="dropdown-menu">';
                        echo '<a class="dropdown-item" href="logout.php">logout</a>';
                        echo  '</div>';
                        echo '</div>';
                        
                      } 
                      ?>
                <div class="d-flex justify-content-center">

                <a class="navbar-brand mr-auto wordnav" href="index.php"><img src="assets\images\newlogo.png" height="30" width="41">Hotel Marble Sand</a>
                </div>
               
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="aboutus.php">About Us</a></li>
                        <li class="nav-item "><a class="nav-link" href="rooms.php">Rooms</a></li>
                        <li class="nav-item "><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item "><a class="nav-link" href="airportpickup.php">Airport Pick Up</a></li>
                        <li class="nav-item "><a class="nav-link" href="excursion.php">Excursions</a></li>
                        <li class="nav-item "><a class="nav-link" href="contactus.php">Contact Us</a></li>   
                    </ul>
                </div>
               
            </div>
        </nav>