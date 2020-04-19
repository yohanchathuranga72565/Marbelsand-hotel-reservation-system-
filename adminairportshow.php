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
        include 'admin_airport_data_insert.php';
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
             <!-- get php connection-->
            <?php include 'connection.php';?>
            <!-- get php connection end-->

            <?php 
                
                $query0="SELECT vehicle_reservation_id FROM vehicle_reservation";
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


                $query="SELECT * FROM vehicle_reservation LIMIT {$start},{$rows_per_page}";
                $query_run=mysqli_query($connection,$query);
            ?>
            <h2 class="text-center">About Vehicle Reservation</h2>
            <div class="text-right">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmodal">Add new vehecle reservation</button>
            </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Vehicle_Reservation_Id</th>
                        <th scope="col">Vehicle_Id</th>
                        <th scope="col">Customer_Id</th>
                        <th scope="col">Filight_No</th>
                        <th scope="col">Payment_Id</th>
                        <th scope="col">Pick_Up_date</th>
                        <th scope="col">Pick_Up_Time</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>

                    <?php

                        if($query_run){
                            foreach($query_run as $row){
                        ?>
                    <tbody action="adminbookshow.php" method="POST">
                        <tr>
                            <td><?php echo $row['vehicle_reservation_id']; ?></td>
                            <td><?php echo $row['vehicle_id']; ?></td>
                            <td><?php echo $row['customer_id']; ?></td>
                            <td><?php echo $row['flight_no']; ?></td>
                            <td><?php echo $row['payment_id']; ?></td>
                            <td><?php echo $row['pick_up_date']; ?></td>
                            <td><?php echo $row['pick_up_time']; ?></td>
                            <td><a href="#" type="button"  class="btn btn-success btn-sm editbtn" >Edit</button></td>
                            <td><a href=adminairportdelete.php?id=<?php echo $row['vehicle_reservation_id'];?> type="button"  class="btn btn-danger btn-sm" >Delete</a></td>
                            
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
        $first="<a href=\"adminairportshow.php?p=1\"><b>First</b></a>";

        //last page
        $last_page_no=ceil($total_rows/$rows_per_page);
        $last="<a href=\"adminairportshow.php?p={$last_page_no}\"><b>Last</b></a>";

        //next page
        if($page_no>=$last_page_no){
            $next="<a><b>Next</b></a>";
        }
        else{
            $next_page_no=$page_no+1;
            $next="<a href=\"adminairportshow.php?p={$next_page_no}\"><b>Next</b></a>";
        }

        //previous page
        if($page_no<=1){
            $prev="<a><b>Previous</b></a>";
        }
        else{
            $prev_page_no=$page_no-1;
            $prev="<a href=\"adminairportshow.php?p={$prev_page_no}\"><b>Previous</b></a>";
        }
    ?>
        
        <div class="col-12  text-center  text-dark"> 
            <?php echo $first .' | '. $prev .' | <b>Page  '. $page_no . ' of ' .$last_page_no.'</b> | '. $next .' | '. $last ;?>
        </div>



        </div>
    </div>
    <!-- edit booking modal start-->
    <div class="modal" id="editmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Vehicle Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="adminupdateairportpickup.php" method="POST">
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Vehicle_Reservation_Id</lable><br/>
                            <input type="text" id="vehicle_reservation_id" name="vehicle_reservation_id" readonly>
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Vehicle_Id</lable><br/>
                            <input type="text" id="vehicle_id" name="vehicle_id" readonly>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Customer_Id</lable><br/>
                            <input type="text" id="customer_id" name="customer_id" readonly>
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Flight_No</lable><br/>
                            <input type="text" id="flight_no" name="flight_no">
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Payment_Id</lable><br/>
                            <input type="text" id="payment_id" name="payment_id">
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Pick_Up_date</lable><br/>
                            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input  class="form-control" id="pick_up_date" name="pick_up_date" type="text" readonly /> 
                                <span class="input-group-addon"> <i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Pick_Up_Time</lable><br/>
                                <input class="form-control" id="pick_up_time" name="pick_up_time" type="time" readonly />
                            </div> 
                        </div>
                    </div>
                
               

            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm" name="editdata">Save changes</button>
            </div>
            </form>
        </div>
        </div>
        </div>
    
    <!-- edit room booking modal end-->


        <!-- add booking modal start-->
        <div class="modal" id="addmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Room Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="adminaddairport.php" method="POST">
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
                            <lable><b> Vehicle Type:</b></lable>
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
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Pick_Up_Date</lable><br/>
                            <div id="datepicker2" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input  class="form-control" id="pick_up_date" name="date" type="text" readonly /> 
                                <span class="input-group-addon"> <i class="fa fa-calendar p-1 mt-1"></i></span>
                            </div> 
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Pick_Up_Time</lable><br/>
                                <input class="form-control" id="pick_up_time" name="time" type="time">    
                            </div> 
                        </div>
                    
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        
                        <lable>Flight_No</lable><br/>
                        <input type="text" id="flight_no" name="fno">
                       

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
        </div>
    
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
 <script>
        $(document).ready(function(){
            $('.editbtn').on('click',function(){
                $('#editmodal').modal('show');

                $tr=$(this).closest('tr');
                var data=$tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#vehicle_reservation_id').val(data[0]);
                $('#vehicle_id').val(data[1]);
                $('#customer_id').val(data[2]);
                $('#flight_no').val(data[3]);
                $('#payment_id').val(data[4]);
                $('#pick_up_date').val(data[5]);
                $('#pick_up_time').val(data[6]);
                
            });
        });
    </script>
    <!-- modal update end -->   
         <script>
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });    
        </script>  
        
        <?php
      echo '<script>';
      if(isset($_SESSION['delete'])){
        if($_SESSION['delete']==1){ 
          echo 'swal({
            title: "",
            text: "Deleted Successfully!",
            icon: "success",
            button: "Ok",
          });';
          
          //session_destroy(); 
         }
         if($_SESSION['delete']==2){
            echo 'swal({
                title: "",
                text: "Error, not Deleted!",
                icon: "error",
                button: "Ok",
              });'; 
         }
         unset($_SESSION['delete']);
        }

    echo '</script>';
         
    ?>
    <script>
         $(function () {
            $("#datepicker").datepicker({ 
                  autoclose: true, 
                  todayHighlight: true
            }).datepicker('update', new Date());
          });

        //   $(function () {
        //     $("#datepicker1").datepicker({ 
        //           autoclose: true, 
        //           todayHighlight: true
                  
        //     }).datepicker('update', new Date());
        //   });

          $(function () {
            $("#datepicker2").datepicker({ 
                  autoclose: true, 
                  todayHighlight: true
            }).datepicker('update', new Date());
          });

        //   $(function () {
        //     $("#datepicker3").datepicker({ 
        //           autoclose: true, 
        //           todayHighlight: true
                  
        //     }).datepicker('update', new Date());
        //   });

          // for validation
          
          
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