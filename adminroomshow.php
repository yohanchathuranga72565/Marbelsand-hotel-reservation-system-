<?php session_start();

    include 'connection.php';

    if(isset($_SESSION['user_type'])){
        if($_SESSION['user_type']=="admin"){
            //load the page
        }
        else{
            header('Location:index.php'); 
        }
    }
    else{
        header('Location:index.php');
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
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
            <div class="card-body">
             <!-- get php connection    -->
            <?php include 'connection.php';?>
            <!-- get php connection end -->

            <?php 
                $query="SELECT * FROM room_type";
                $query_run=mysqli_query($connection,$query);
            ?>
                <h3 class="text-center">Room Types Available in Hotel Marble Sand</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Type_Id</th>
                        <th scope="col">Total_Rooms</th>
                        <th scope="col">Room_Price(Dollar)</th>
                        <th scope="col">Room_name</th>
                        <th scope="col">Max_Guests</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>

                    <?php

                        if($query_run){
                            foreach($query_run as $row){
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['type_id']; ?></td>
                            <td><?php echo $row['total_rooms']; ?></td>
                            <td><?php echo $row['room_price']; ?></td>
                            <td><?php echo $row['room_name']; ?></td>
                            <td><?php echo $row['max_guests']; ?></td>
                            <td><a href="#" type="button"  class="btn btn-success btn-sm editbtn" >Edit</button></td>
                            
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
        </div>
    </div>
    <!-- modal -->
    <div class="modal" id="editmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Room Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="adminupdateroomtypes.php" method="POST">
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Type_Id</lable><br/>
                            <input type="text" id="type_id" name="type_id" readonly>
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Total_Rooms</lable><br/>
                            <input type="text" id="total_rooms" name="total_rooms">
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Room_Price</lable><br/>
                            <input type="text" id="room_price" name="room_price">
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <lable>Room_Name</lable><br/>
                            <input type="text" id="room_name" name="room_name">
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-4 offset-4">
                        <div class="form-group">
                            <lable>Max_Guests</lable><br/>
                            <input type="text" id="max_guests" name="max_guests">
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
        <!-- <h1>rooms table eke enne one methanata....room type eke change karaddi eke room ganath change wenna one</h1> -->
    
    <!-- modal -->
    </div>


    <!-- booking show content end -->
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
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
                $('#type_id').val(data[0]);
                $('#total_rooms').val(data[1]);
                $('#room_price').val(data[2]);
                $('#room_name').val(data[3]);
                $('#max_guests').val(data[4]);
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
      
</body>
</html>