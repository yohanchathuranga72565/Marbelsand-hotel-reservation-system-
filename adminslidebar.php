
<?php

$user='';
$name='';
$fname='';
$lname='';
$pno='';
$email='';
if(isset($_SESSION['user_type'])){
  if($_SESSION['user_type']=="admin"){
      //load the page
      $query="SELECT * FROM administrator WHERE email='{$_SESSION['email']}'";
      $result_set=mysqli_query($connection,$query);
      if(mysqli_num_rows($result_set)>0){
          foreach($result_set as $row){
              $user=$row['name'];
              $fname=explode(" ",$row['name'])[0];
              $lname=explode(" ",$row['name'])[1];
              $pno=$row['contact_no'];
          }
      }
  }
  else if($_SESSION['user_type']=="receptionist"){
      //load the page
      $query="SELECT * FROM receptionist WHERE email='{$_SESSION['email']}'";
      $result_set=mysqli_query($connection,$query);
      if(mysqli_num_rows($result_set)>0){
          foreach($result_set as $row){
              $user=$row['name'];
              $fname=explode(" ",$row['name'])[0];
              $lname=explode(" ",$row['name'])[1];
              $pno=$row['contact_no'];
          }
      }
  }

  
}
?>
  <div class="d-flex"  id="wrapper">

  

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      
      <div class="sidebar-heading text-light"><b>Adimin Panel</b></div>
      <div class="text-light">
        <img class="img-responsive mt-0" width="20%" src="admin/image/login.png" alt="login">
        <?php echo $user;?>
      </div>
      <div class="list-group list-group-flush mt-3">
        <a href="admindashboard.php" class="list-group-item list-group-item-action bg-danger text-warning"><b>Dashboard</b></a>

<a href="#" class="list-group-item list-group-item-action bg-dark text-light" <?php if($_SESSION['user_type']=="admin"){?> data-toggle="collapse" data-target="#collapseModules" aria-expanded="false" aria-controls="collapseModules"<?php }?>>
        <i class="fa fa-table"></i> Modules
        </a>
        <div <?php if($_SESSION['user_type']=="admin"){?>class="collapse" id="collapseModules" <?php }?>>
          <a href="adminbookshow.php" class="list-group-item list-group-item-action bg-dark text-light pl-5"><i class="fa fa-calendar-check-o"></i> Bookings</a>
          <?php if($_SESSION['user_type']=="admin"){?>
            <a href="adminroomshow.php" class="list-group-item list-group-item-action bg-dark text-light pl-5"><i class="fa fa-bed"></i> Rooms</a>
            <a href="uploadimage.php" class="list-group-item list-group-item-action bg-dark text-light pl-5"><i class="fa fa-file-image-o"></i> Gallary</a>
          <?php }?>
          <a href="adminairportshow.php" class="list-group-item list-group-item-action bg-dark text-light pl-5"><i class="fa fa-fighter-jet"></i> Airport Pick Up</a>
          <?php if($_SESSION['user_type']=="admin"){?>
            <a href="adminexcursion.php" class="list-group-item list-group-item-action bg-dark text-light pl-5"><i class="fa fa-car"></i> Excursions</a>
          <?php }?>


        </div>
        <a href="admincheckroom.php" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-search"></i> Check Room Availability</a>
        <?php if($_SESSION['user_type']=="admin"){?>
            <a href="adminuserdetails.php" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-user-circle"></i> User Login Details</a>
            
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="modal" data-target="#usermodal"><i class="fa fa-plus"></i> Create Account</a>
            <?php }?>
      </div>
  </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <li id="menu-toggle"><span class="navbar-toggler-icon"></span></li>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="changeview.php"><i class="fa fa-eye" aria-hidden="true"></i> User View</a>
            </li>
            
            <li class="nav-item dropdown">
            
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cog"></i> Settings
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editprofile"><i class="fa fa-user-circle"></i> Edit Profile</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepassword"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                <!-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a> -->
              </div>
            </li>
          </ul>
        </div>
      </nav>
      

      <!-- add new admin or reciptionist start -->
      <div class="modal" id="usermodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Admin or Receptionist</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="adminaccountcreation.php" method="POST">
            <div class="modal-body">
              
               
                   

                            <div class="row">
                              <div class="col-12 form-group">    
                                <div class="row">  
                                  <div class="col-6">
                                    <lable><b>First Name:</b></lable><br/>
                                    <input type='text'name="fname" class="form-control input-box form-rounded" placeholder="first name" required>
                                  </div>
                                  <div class="col-6">
                                    <lable><b>Last Name:</b></lable><br/>
                                    <input type='text' name="lname" class="form-control input-box form-rounded" placeholder="last name" required>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 form-group">
                                <lable><b>Email:</b></lable>
                                <input type='email' name='email' class="form-control input-box form-rounded" placeholder="Email" required>
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
                                <lable><b> Account Type:</b></lable>
                                <select class="form-control w-100 input-box form-rounded" name="accounttype">  
                                    <option value="admin">Admin</option>
                                    <option value="receptionist">Receptionist</option>
                                </select>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-6 form-group">
                                <lable><b>Password:</b></lable>
                                <input type='password' name="password1" class="form-control input-box form-rounded" placeholder="Password" required>
                              </div>
                              <div class="col-6 form-group">
                                <lable><b>Confirm Password:</b></lable>
                                <input type='password' name="password2" class="form-control input-box form-rounded" placeholder="Confirm Password" required>
                              </div>
                            </div>

            </div>   
            <div class="modal-footer">
                
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm" name="create">Create Account</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- add new admin or reciptionist end -->

    <!-- edit profile modal start-->
    <div class="modal" id="editprofile" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="editprofile.php" method="POST">
            <div class="modal-body">
                <div class="row text-center">
                  <div class="col-6 form-group">
                      <lable><b>First Name:</b></lable>
                      <input type='text' name='fname' class="form-control input-box form-rounded" value=<?php echo $fname;?> required>
                  </div>
                  <div class="col-6 form-group">
                      <lable><b>Last Name:</b></lable>
                      <input type='text' name='lname' class="form-control input-box form-rounded" value=<?php echo $lname;?> required>
                  </div>
                </div>

                

                <div class="row">
                  <div class="col-12 form-group">
                    <lable><b>Contact No:</b></lable>
                    <input type='text' name='pno' class="form-control input-box form-rounded" value=<?php echo $pno;?> required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 form-group">
                    <lable><b>Email:</b></lable>
                    <input type='email' name='email' class="form-control input-box form-rounded" value=<?php echo $_SESSION['email'];?> required readonly>
                  </div>
                </div>


            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm" name="editprofile">Save changes</button>
            </div>
            </form>
        </div>
        </div>
        </div>
    
    <!-- edit profile modal end-->


    <!-- password change start-->
    <div class="modal" id="changepassword" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="changepassword.php" method="POST">
            <div class="modal-body">
                <div class="row text-center">
                  <div class="col-12 form-group">
                      <lable><b>Old Password:</b></lable>
                      <input type='password' name='oldpass' class="form-control input-box form-rounded" required>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="col-12 form-group">
                      <lable><b>New Password:</b></lable>
                      <input type='Password' name='newpassword' class="form-control input-box form-rounded" required>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="col-12 form-group">
                      <lable><b>Confirm Password:</b></lable>
                      <input type='Password' name='compassword' class="form-control input-box form-rounded" required>
                  </div>
                </div>

                

                <!-- <div class="row">
                  <div class="col-12 form-group">
                    <lable><b>Contact No:</b></lable>
                    <input type='text' name='pno' class="form-control input-box form-rounded" value=<?php echo $pno;?> required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 form-group">
                    <lable><b>Email:</b></lable>
                    <input type='email' name='email' class="form-control input-box form-rounded" value=<?php echo $_SESSION['email'];?> required readonly>
                  </div>
                </div> -->


            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm" name="changepassword">Save changes</button>
            </div>
            </form>
        </div>
        </div>
        </div>
    
    <!-- password change end-->

      
  

      