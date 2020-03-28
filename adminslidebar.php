

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      
      <div class="sidebar-heading text-light"><b>Adimin Panel</b></div>
      <div class="text-light">
        <img class="img-responsive mt-0" width="20%" src="admin/image/login.png" alt="login">
        admin name
      </div>
      <div class="list-group list-group-flush mt-3">
        <a href="admindashboard.php" class="list-group-item list-group-item-action bg-danger text-warning"><b>Dashboard</b></a>

        <a href="#" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="collapse" data-target="#collapseModules" aria-expanded="false" aria-controls="collapseModules">
        <i class="fa fa-table"></i> Modules
        </a>
        <div class="collapse" id="collapseModules">
          <a href="adminbookshow.php" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-calendar-check-o"></i> Bookings</a>
          <a href="adminroomshow.php" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-bed"></i> Rooms</a>
          <a href="uploadimage.php" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-file-image-o"></i> Gallary</a>
          <a href="adminairportshow.php" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-fighter-jet"></i> Airport Pick Up</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-car"></i> Excursions</a>


        </div>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser"><i class="fa fa-user-circle"></i> User Login Details</a>
            <div class="collapse" id="collapseUser">
              <a href="#" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-user-secret"></i> Admin</a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-user-plus"></i> Receptionist</a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-light ml-4"><i class="fa fa-user"></i> User</a>


            </div>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="modal" data-target="#usermodal"><i class="fa fa-plus"></i> Create Account</a>
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
              <a class="nav-link" href="index.php">Home</a>
            </li>
            
            <li class="nav-item dropdown">
            
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cog"></i> Settings
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"><i class="fa fa-user-circle"></i> Edit Profile</a>
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

      
  

      