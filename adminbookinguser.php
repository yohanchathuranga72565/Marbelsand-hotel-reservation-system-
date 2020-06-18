<?php session_start();

include 'connection.php';

    if(isset($_SESSION['user_type'])){
        if($_SESSION['user_type']=="admin"){
            //load the page
        }
        else if($_SESSION['user_type']=="receptionist"){
            //load the page
        }
        else{
            header('Location:index.php'); 
        }
    }
    else{
        header('Location:index.php');
    }
    if(isset($_GET['order_id']) && isset($_SESSION['name'])){
        include 'admin_room_data_insert.php';
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css"/>
    <link href="simple-sidebar.css" rel="stylesheet">
    <title>Show Booking</title>
</head>
<body>
    <!-- Slidebar start-->
    <?php include 'adminslidebar.php';?>
    <!-- Slidebar end-->

    <!-- booking show content start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
             

            <?php 
                $filter=0;
                if(isset($_POST['search'])){
                    $filter=$_POST['filter'];
                    echo $filter;

                    $query0="SELECT customer_id FROM customer WHERE customer_id='{$filter}'";
                    $query_run0=mysqli_query($connection,$query0);
                    $total_rows=mysqli_num_rows($query_run0);
                    $rows_per_page=6;

                    if(isset($_GET['p'])){
                        $page_no=$_GET['p']; 
                    }
                    else{
                        $page_no=1; 
                    }

                
                    $start=($page_no-1) * $rows_per_page;

                    

                    $query="SELECT * FROM customer WHERE customer_id='{$filter}' LIMIT {$start},{$rows_per_page}";
                    $query_run=mysqli_query($connection,$query);
                }
                else{
                    $query0="SELECT customer_id FROM customer";
                    $query_run0=mysqli_query($connection,$query0);
                    $total_rows=mysqli_num_rows($query_run0);
                    $rows_per_page=6;

                    if(isset($_GET['p'])){
                        $page_no=$_GET['p']; 
                    }
                    else{
                        $page_no=1; 
                    }

                
                    $start=($page_no-1) * $rows_per_page;

                    

                    $query="SELECT * FROM customer LIMIT {$start},{$rows_per_page}";
                    $query_run=mysqli_query($connection,$query);

                }
                
            
            ?>
            <h2 class="text-center">About Customer Details</h2>
            <div class="text-right">
                <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmodal">Add new booking</button>
                <a href="admincheckroom.php" type="button" class="btn btn-success btn-sm">Check room availability</a> -->
                <a href="adminpayment.php" type="button" class="btn btn-success btn-sm">Payment Details</a>
                <a href="adminbookinguser.php" type="button" class="btn btn-success btn-sm">User Details</a>
                <a href="adminbookshow.php" type="button" class="btn btn-success btn-sm">Back to room Booking</a>
                <a href="adminairportshow.php" type="button" class="btn btn-success btn-sm">Back to airport pickup</a>
            </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Customer_Id</th>
                        <th scope="col">Customer_Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact_No</th>
                        <th scope="col">Age</th>
                        <th scope="col">Country</th>
                        <!-- <th scope="col"></th> -->
                        <!-- <th scope="col"></th>
                        <th scope="col"></th> -->
                        </tr>
                    </thead>

                    <?php

                        if($query_run){
                            foreach($query_run as $row){
                        ?>
                    <tbody action="adminbookinguser.php" method="POST">
                        <tr>
                            <td><?php echo $row['customer_id']; ?></td>
                            <td><?php echo $row['customer_type']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['contact_no']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                        
                            <!-- <td><a href="#"  class="morebtn" >More</a></td> -->
                            <!-- <td><a href="#" type="button"  class="btn btn-success btn-sm editbtn" >Edit</a></td>
                            <td><a href="adminbookdelete.php?id=<?php echo $row['reservation_id'];?>&pid=<?php echo $row['payment_id'];?>&cid=<?php echo $row['customer_id'];?>" type="button"  class="btn btn-danger btn-sm" >Delete</a></td> -->
                            
                        </tr>
                    </tbody>
                    <?php
                            }
                        }
                        else{
                            echo "No record found";
                        }
                    ?>
                </table>

                    
            </div>
        <?php 
        //first page
        $first="<a href=\"adminbookinguser.php?p=1\"><b>First</b></a>";

        //last page
        $last_page_no=ceil($total_rows/$rows_per_page);
        $last="<a href=\"adminbookinguser.php?p={$last_page_no}\"><b>Last</b></a>";

        //next page
        if($page_no>=$last_page_no){
            $next="<a><b>Next</b></a>";
        }
        else{
            $next_page_no=$page_no+1;
            $next="<a href=\"adminbookinguser.php?p={$next_page_no}\"><b>Next</b></a>";
        }

        //previous page
        if($page_no<=1){
            $prev="<a><b>Previous</b></a>";
        }
        else{
            $prev_page_no=$page_no-1;
            $prev="<a href=\"adminbookinguser.php?p={$prev_page_no}\"><b>Previous</b></a>";
        }
    ?>
        
        <div class="col-12  text-center  text-dark"> 
            <?php echo $first .' | '. $prev .' | <b>Page  '. $page_no . ' of ' .$last_page_no.'</b> | '. $next .' | '. $last ;?>
        </div>
        


        </div>
    </div>
    <div class="container">
        <div class="row">
        <?php if(!isset($_POST['search'])){?>
            <div class="col-6 text-left">
            
                <form action="adminbookinguser.php" method="POST">
                Search by payment id :
                <input type="text" id="filter" name="filter">
                <button type="submit" name="search" class="btn btn-success btn-sm">Filter</button>
                </form>
            
            </div>\
            <?php } ?>
            <?php
                if(isset($_POST['search'])){
                    ?>
                    <a href="adminbookinguser.php" type="button" class="btn btn-success btn-sm">All User Details</a>
                <?php
                }
            ?>
        </div>
    </div>
    <!-- edit booking modal start-->
    <!-- <div class="modal" id="editmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Room Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="adminupdatebooking.php" method="POST">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 form-group"> 
                        <div class="row">
                        
                            <div class="col-6">
                                <lable><b>Customer_ID</b></lable><br/>
                                <input type='text'name="customer_id" id="customer_id" class="form-control input-box form-rounded" placeholder="first name" required>
                            </div>
                            <div class="col-6">
                                <lable><b>Customer_Type</b></lable><br/>
                                <input type='text' name="customer_type" id="customer_type" class="form-control input-box form-rounded" placeholder="last name" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 form-group">
                        <lable><b>Name</b></lable>
                        <input type='text' name='name' id="name" class="form-control input-box form-rounded" placeholder="Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 form-group">
                        <lable><b>Email</b></lable>
                        <input type='text' name='email' id="email" class="form-control input-box form-rounded" placeholder="Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 form-group">
                        <lable><b>Contact_No</b></lable>
                        <input type='text' name='pno' id="pno" class="form-control input-box form-rounded" placeholder="Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 form-group"> 
                        <div class="row">
                        
                            <div class="col-6">
                                <lable><b>Age</b></lable><br/>
                                <input type='text'name="age" id="age" class="form-control input-box form-rounded" placeholder="first name" required>
                            </div>
                            <div class="col-6">
                                <lable><b>Country</b></lable><br/>
                                <input type='text' name="country" id="country" class="form-control input-box form-rounded" placeholder="last name" required>
                            </div>
                        </div>
                    </div>
                </div> -->


                <!-- <div class="row text-center">
                    <div class="col-12">
                        <div class="form-group">
                            <lable>Name</lable><br/>
                            <input type="text" id="name" name="name" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <lable>Email</lable><br/>
                            <input type="text" id="email" name="email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <lable>Contact_No</lable><br/>
                            <input type="text" id="pno" name="pno">
                        </div>
                    </div>
                </div> -->

                <!-- <div class="row text-center">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Age</lable><br/>
                            <input type="text" id="age" name="age">
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Country</lable><br/>
                            <input type="text" id="country" name="country">
                        </div>
                    </div>
                </div> -->


            <!-- </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm" name="editdata">Save changes</button>
            </div>
            </form>
        </div>
        </div>
        </div> -->
        
    
    <!-- edit room booking modal end-->


        <!-- add booking modal start-->
        <!-- <div class="modal" id="addmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Room Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="adminaddbooking.php" method="POST">
            <div class="modal-body">
            <div class="row">
            <div class="col-12">
               
                    <div class="row ">
                        <div class="col-12 text-center mt-1">
                            <h2>personal Information</h2>
                        </div>
                    </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    
                                    <div class="row">
                                    
                                    <div class="col-4">
                                    <lable><b>First Name:</b></lable><br/>
                                    <input type='text'name="fname" class="form-control input-box form-rounded" placeholder="first name" required>
                                    </div>
                                    <div class="col-4">
                                    <lable><b>Last Name:</b></lable><br/>
                                    <input type='text' name="lname" class="form-control input-box form-rounded" placeholder="last name" required>
                                    </div>
                                    <div class="col-4">
                                    <lable><b>Age:</b></lable><br/>
                                    <input type='number' name="age" class="form-control input-box form-rounded" placeholder="Ex-18" required>
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
                                    <lable><b>Country:</b></lable>
                                    <input type='text' name="country" class="form-control input-box form-rounded" placeholder="Ex-SriLanka" required>
                                </div>
                            </div>
                             
                            
                            


                    <div class="row ">
                        <div class="col-12 text-center mt-1">
                            <h2>Reservation Information</h2>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-12 form-group">
                            <lable><b> Room Type:</b></lable>
                                <select class="form-control w-100 input-box form-rounded" name="room_type">  
                                        <option value="Deluxe city facing room">Deluxe city facing room</option>
                                        <option value="Deluxe ocean facing room">Deluxe ocean facing room</option>
                                        <option value="Luxury city view room">Luxury city view room</option>
                                        <option value="Luxury ocean view room">Luxury ocean view room</option>
                                        <option value="Executive suite">Executive suite</option>  
                                    </select>
                            </div>
                        </div>

                    <div class="row">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Check_In_Date</lable><br/>
                            <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input  class="form-control" id="check_in_date" name="checkin" type="text" readonly /> 
                                <span class="input-group-addon"> <i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Check_Out_Date</lable><br/>
                            <div id="datepicker3" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input class="form-control" id="check_out_date" name="checkout" type="text"  readonly />
                                <span class="input-group-addon"><i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                </div>

                 
 
                    
            <div class="row">
                    <div class="col-6 form-group">
                        
                        <lable><b> Adults:</b></lable>
                        <select class="form-control w-100 input-box form-rounded" name="adults" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                                        
                        </select>

                    </div>

                    <div class="col-6 form-group">
                        
                        <lable><b> Children:</b></lable>
                        <select class="form-control w-100 input-box form-rounded" name="children" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>                           
                        </select>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-6 form-group">
                        
                                <lable><b> No of Rooms:</b></lable>
                                <select class="form-control w-100 input-box form-rounded" name="no_of_rooms" required>
                                        
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        
                                    </select>

                    </div>
                    <div class="col-6 form-group">
                        
                                <lable><b> Payment type:</b></lable>
                                <select class="form-control w-100 input-box form-rounded" name="payment_type">
                                        
                                        <option value="cash">Cash</option>
                                        <option value="online">Online</option>
        
                                    </select>

                    </div>
                </div>

            </div>
        </div>


            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm" name="adddata">Save changes</button>
            </div>
            </form>
        </div>
        </div>
        </div> -->
    
    <!-- add room booking modal end-->
    


    <!-- booking show content end -->
<!-- Bootstrap core JavaScript -->
            <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
            <script src="node_modules/jquery/dist/jquery.min.js"></script> 
            <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
            <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
        <!-- Menu Toggle Script -->

 <!-- modal update start -->
 <!-- <script>
        $(document).ready(function(){
            $('.editbtn').on('click',function(){
                $('#editmodal').modal('show');

                $tr=$(this).closest('tr');
                var data=$tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#customer_id').val(data[0]);
                $('#customer_type').val(data[1]);
                $('#name').val(data[2]);
                $('#email').val(data[3]);
                $('#pno').val(data[4]);
                $('#age').val(data[5]);
                $('#country').val(data[6]);
            });
        });
    </script> -->
    <!-- modal update end -->   
         <script>
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });    
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
</body>
</html>