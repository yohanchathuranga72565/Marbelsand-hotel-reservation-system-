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

    //search room
    include 'checkin.php';

        if(isset($_SESSION['check'])){
            echo '<div class="modal fade" id="roomtype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Available Room Categories<br/>between ' .$checkin . ' and ' .$checkout . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">';
                if($totalnoofroomsitem1<23){
                    $freerooms=23-$totalnoofroomsitem1;
                echo '<div class="row">';
                        echo '<div class="col-12 pb-3 d-flex justify-content-center">';
                            echo '<div class="card" style="width: 18rem;">';
                                // echo '<img src="assets\images\delux_city_facing.jpg" class="card-img-top img-responsive" alt="delux_city_facing">';
                                echo '<div class="card-body">';
                                    echo '<p class="card-text"><b>Deluxe City Facing room</b><br/>';
                                    echo 'Max: 3 Person(s)<br/>';
                                    echo 'Max: 2 Child(s)<br/>' ;
                                    // echo 'Get 10% discount by booking before 21st April 2020</br>';
                                    echo 'you have ' . $freerooms . ' free rooms </br>';
                                    // echo '<span class="badge badge-pill badge-secondary">$135</span>';
                                    // echo '<span class="badge badge-pill badge-secondary"><del>$150</del></span>'; 
                                    echo '</p>';
                                echo '</div>';
                                // echo '<div class="card-footer d-flex justify-content-center">';
                                //     echo '<a href="deluxecity.php" class="btn btn-sm btn-deep-orange">Book now</a>';
                                // echo '</div>';
                            echo '</div>';

                        echo '</div>';
                        $freerooms=0;
                    
                    echo '</div>';
                }
                if($totalnoofroomsitem2<20){
                    $freerooms=20-$totalnoofroomsitem2;
                    echo '<div class="row">';
                        echo '<div class="col-12 pb-3 d-flex justify-content-center">';

                    echo ' <div class="card" style="width: 18rem;">
                            
                            <div class="card-body">
                            <p class="card-text"><b>Deluxe Ocean Facing room</b><br/>
                            Max: 3 Person(s)<br/>
                            Max: 2 Child(s)<br/>';
                            echo 'you have ' . $freerooms . ' free rooms </br>';
                        echo '
                            </p>
                            </div>
                        </div>';

                        echo '</div>';
                        $freerooms=0;
                    echo '</div>';
                }
                if($totalnoofroomsitem3<25){
                    $freerooms=25-$totalnoofroomsitem3;
                    echo '<div class="row">';
                        echo '<div class="col-12 pb-3 d-flex justify-content-center">';

                        echo '<div class="card" style="width: 18rem;">
                        
                        <div class="card-body">
                        <p class="card-text"><b>Luxury City View room</b><br/>
                        Max: 3 Person(s)<br/>
                        Max: 2 Child(s) <br/>';
                        echo 'you have ' . $freerooms . ' free rooms </br>';
                        echo ' 
                        </p>
                        </div>
                    </div>';

                        echo '</div>';
                        $freerooms=0;
                    echo '</div>';

                }

                if($totalnoofroomsitem4<26){
                    $freerooms=26-$totalnoofroomsitem4;
                    echo '<div class="row">';
                        echo '<div class="col-12 pb-3 d-flex justify-content-center">';

                        echo '<div class="card" style="width: 18rem;">
                        
                        <div class="card-body">
                        <p class="card-text"><b>Luxury Ocean View room</b><br/>
                        Max: 3 Person(s)<br/>
                        Max: 2 Child(s) <br/>';
                        echo 'you have ' . $freerooms . ' free rooms </br>';
                        echo '
                        </p>
                        </div>
                    </div>';

                        echo '</div>';
                        $freerooms=0;
                    echo '</div>';

                }

                if($totalnoofroomsitem5<6){
                    $freerooms=6-$totalnoofroomsitem5;
                    echo '<div class="row">';
                        echo '<div class="col-12 pb-3 d-flex justify-content-center">';

                        echo '<div class="card" style="width: 18rem;">
                        
                        <div class="card-body">
                        <p class="card-text"><b>Executive Suite</b><br/>
                            Max: 3 Person(s)<br/>
                            Max: 2 Child(s) <br/>';
                            echo 'you have ' . $freerooms . ' free Suites  </br>';
                        echo ' 
                        </p>
                        </div>
                        </div>';

                        echo '</div>';
                        $freerooms=0;
                    echo '</div>';

            }


            echo '</div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
        </div>';
        unset($_SESSION['check']);
        unset($_SESSION['checkin']);
        unset($_SESSION['checkout']);

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
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="node_modules/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css"/> -->
    <link href="simple-sidebar.css" rel="stylesheet">
    <title>Check Room Availability</title>
    
</head>
<body>
    <!-- Slidebar start-->
    <?php include 'adminslidebar.php';?>
    <!-- Slidebar end-->

    <!-- check room content start -->
    <div class="container">
    <form action="admincheckroom.php" method="POST">
          <div class="row p-1">
              <div class='col-sm-4 offset-sm-2 col-12'>
                  
                        <label for="" style="color:white">Check-in</label>
                        <div class="input-group date">
                          <input  id="datepicker"  class="form-control" name="checkin" type="text" placeholder="check-in date" readonly />
                          <div class="pt-2 pl-2"><i class="fa fa-calendar fa-lg"></i></div>
                        </div> 
              </div>

              <div class='col-sm-4 col-12'>
                  
                      <label for="" style="color:white">Check-out</label>
                      <div  class="input-group date">
                          <input id="datepicker1" class="form-control" name="checkout" type="text" placeholder="check-out date" readonly /> 
                          <div class="pt-2 pl-2"><i class="fa fa-calendar fa-lg"></i></div>    
                        </div> 
              </div>  
          </div>

          <div class="row">
            <div class='col-12 text-center'>
                <button type="submit" name="search" class="btn btn-success btn-sm input-box view_data"  data-toggle="modal" href="#roomtype">Search</button>
            </div>
          </div>
        </form>
        <div class="row">
            <div class='col-12 text-center'>
                <a type="button" name="backtobooking" class="btn btn-success btn-sm" href="adminbookshow.php">Back to booking</a>
            </div>
        </div>
    </div>
    <!-- check room content end -->

    <!-- Bootstrap core JavaScript -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script> 
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="node_modules/jquery-ui/jquery-ui.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
    <script>
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });    
    </script>  

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
         $(document).ready(function () {
        
          $("#datepicker").attr("value",date);
            $("#datepicker").datepicker({ 
              showAnim : 'drop',
              numberOfMonth : 1,
              minDate : new Date(),
              dateFormat: 'yy-mm-dd',
              onClose : function (selectedDate){
                $("#datepicker1").datepicker("option","minDate",selectedDate);
              }
              // minDate : new Date(),
              // showOtherMonths : true

              
            });
            $("#datepicker1").attr("value",date);
            $("#datepicker1").datepicker({ 
              showAnim : 'drop',
              numberOfMonth : 1,
              minDate : new Date(),
              dateFormat: 'yy-mm-dd',
              onClose : function (selectedDate){
                $("#datepicker").datepicker("option","maxDate",selectedDate);
              }
              // minDate : new Date(),
              // showOtherMonths : true

              
            });
             
          });

          // for validation
          
          
    </script>
    <script>
      $(document).ready(function(){
          $('#roomtype').modal('show');
      });
    </script>
</body>
</html>