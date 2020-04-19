<nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php 
                    //   if(isset($_SESSION['user_id'])) {
                    //     echo '<div class="dropdown">';
                    //     echo '<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">';
                    //     echo '<i class="fa fa-user fa-lg"></i>';
                    //     echo ' ' . $_SESSION['email'];
                    //     echo '</button>';
                    //     echo '<div class="dropdown-menu">';
                    //     echo '<a class="dropdown-item" href="logout.php">logout</a>';
                    //     echo  '</div>';
                    //     echo '</div>';
                        
                    //   } 
                      ?>
                
                    <?php if(isset($_SESSION['user_id'])){ ?>
                       <div class="text-left"> 
                        <div class="dropdown">
            
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" disabled><i class="fa fa-user-circle"></i> <?php echo $_SESSION['email']; ?></a>
                            <div class="dropdown-divider"></div>
                            <?php
                                if($_SESSION['user_type']=='user1'){
                            ?>
                                <a class="dropdown-item" href="changeview.php">Get admin panel</a>
                            <?php }
                                else if($_SESSION['user_type']!='user1' && $_SESSION['user_type']!='user'){?>
                                <a class="dropdown-item" href="admindashboard.php">Get admin panel</a>
                                <?php }?>
                            <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                    </div>
                    <?php }?> 
                <div class="d-flex justify-content-center">

                <a class="navbar-brand mr-auto wordnav" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'index.php';}}else{echo 'index.php';}?>"><img src="assets\images\newlogo.png" height="30" width="41">Hotel Marble Sand</a>
                </div>
                
               
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'index.php';}}else{echo 'index.php';}?>">Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'aboutus.php';}}else{echo 'aboutus.php';}?>">About Us</a></li>
                        <li class="nav-item "><a class="nav-link" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'rooms.php';}}else{echo 'rooms.php';}?>">Rooms</a></li>
                        <li class="nav-item "><a class="nav-link" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'gallery.php';}}else{echo 'gallery.php';}?>">Gallery</a></li>
                        <li class="nav-item "><a class="nav-link" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'airportpickup.php';}}else{echo 'airportpickup.php';}?>">Airport Pick Up</a></li>
                        <li class="nav-item "><a class="nav-link" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'excursion.php';}}else{echo 'excursion.php';}?>">Excursions</a></li>
                        <li class="nav-item "><a class="nav-link" href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'contactus.php';}}else{echo 'contactus.php';}?>">Contact Us</a></li>    
                    </ul>
                </div>
                  
            </div>
               
            
        </nav>