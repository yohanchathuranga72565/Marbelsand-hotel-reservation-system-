<?php
    session_start();

    $fname="";
    $lname="";
    $age=0;
    $email="";
    $pnumber="";
    $country="";
    $roomtype="";
    $checkin="";
    $checkout="";
    $no_of_rooms=0;
    $adults=0;
    $children=0;
    $amount="";
    $payment_type="";

    if(isset($_POST['adddata'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $pnumber=$_POST['pnumber'];
        $country=$_POST['country'];
        $roomtype=$_POST['room_type'];
        $checkin=$_POST['checkin'];
        $checkout=$_POST['checkout'];
        $no_of_rooms=$_POST['no_of_rooms'];
        $adults=$_POST['adults'];
        $children=$_POST['children'];
        $payment_type=$_POST['payment_type'];


        $_SESSION['name']=$_POST['fname']." ".$_POST['lname'];
        $_SESSION['age']=$_POST['age'];
        $_SESSION['email2']=$_POST['email'];
        $_SESSION['pnumber']=$_POST['pnumber'];
        $_SESSION['country']=$_POST['country'];
        $_SESSION['roomtype']=$_POST['room_type'];
        $_SESSION['checkin']=$_POST['checkin'];
        $_SESSION['checkout']=$_POST['checkout'];
        $_SESSION['no_of_rooms']=$_POST['no_of_rooms'];
        $_SESSION['adults']=$_POST['adults'];
        $_SESSION['children']=$_POST['children'];
        $_SESSION['no_guest']=$_POST['adults'] + $_POST['children'];
        $_SESSION['payment_type']=$_POST['payment_type'];

        if($roomtype=="Deluxe city facing room"){
            $amount=135;
            $_SESSION['typeid']=1;
        }
        elseif($roomtype=="Deluxe ocean facing room"){
            $amount=126;
            $_SESSION['typeid']=2;
        }
        elseif($roomtype=="Luxury city view room"){
            $amount=117;
            $_SESSION['typeid']=3;
        }
        elseif($roomtype=="Luxury ocean view room"){
            $amount=108;
            $_SESSION['typeid']=4;
        }
        elseif($roomtype=="Executive suite"){
            $amount=90;
            $_SESSION['typeid']=5;
        }
        
        $_SESSION['amount']=$amount;

        if($_POST['payment_type']=="online"){
            
            


            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="airportpickup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    
</head>
<body>

</form>

    <form method="post" action="https://sandbox.payhere.lk/pay/checkout"> 
        <input type="hidden" name="merchant_id" value="1213654">    <!-- Replace your Merchant ID -->
        <input type="hidden" name="return_url" value="http://localhost/hotel reservation system/adminbookshow.php">
        <input type="hidden" name="cancel_url" value="http://localhost/hotel reservation system/adminbookshow.php">
        <input type="hidden" name="notify_url" value="http://localhost/hotel reservation system/payment.php">  
        <input type="hidden" name="order_id">
        <input type="hidden" name="items" placeholder="Room Type"><br>
        <!-- <input type="hidden" name="currency" value="USD"> -->
        <input type="hidden" name="address" value="No.1, Galle Road">
        <input type="hidden" name="city" value="Colombo">
        <div class="row ">
                <div class="col-12 text-center mt-5">
                    <h2>Room Reservation</h2>
                </div>
        </div>  

        <div class="container-fluid">
            <div class="col-6 offset-3">
                <div class="row mt-5">
                    <div class="col-12 form-group">
                    <div class="row">
                        <div class="col-12">
                            <h5><b>Personal Information</b></h5>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                                    
                                    <div class="col-4">
                                    <lable><b>First Name:</b></lable><br/>
                                    <input type='text'name="first_name" class="form-control input-box form-rounded" placeholder="first name" value=<?php echo $fname;?> required>
                                    </div>
                                    <div class="col-4">
                                    <lable><b>Last Name:</b></lable><br/>
                                    <input type='text' name="last_name" class="form-control input-box form-rounded" placeholder="last name" value=<?php echo $lname;?> required>
                                    </div>
                                    <div class="col-4">
                                    <lable><b>Age:</b></lable><br/>
                                    <input type='number' name="age" class="form-control input-box form-rounded" placeholder="Ex-18" value=<?php echo $age;?> required>
                                    </div>
                                    </div>
                    </div>   
                </div>

                <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Email:</b></lable>
                                    <input type='email' name='email' class="form-control input-box form-rounded" value=<?php echo $email;?> required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Contact no:</b></lable>
                                    <input type='text' name="phone" class="form-control input-box form-rounded" value=<?php echo $pnumber;?> required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Country:</b></lable>
                                    <input type='text' name="country" class="form-control input-box form-rounded" value=<?php echo $country;?> required>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h5><b>Reservation Information</b></h5>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                            <div class="col-12 form-group">
                            <lable><b> Room Type:</b></lable>
                                <input  class="form-control input-box form-rounded" id="roomtype" name="room_type" type="text" value="<?php echo $roomtype;?>" readonly />   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 offset-1">
                                <div class="form-group">
                                    <lable>Check_In_date</lable><br/>
                                    <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input  class="form-control" id="check_in_date" name="checkin" type="text" value=<?php echo $checkin;?> readonly /> 
                                        <span class="input-group-addon"> <i class="fa fa-calendar p-1 mt-1"></i></span>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-4 offset-1">
                                <div class="form-group">
                                    <lable>Check_Out_Date</lable><br/>
                                    <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input class="form-control" id="check_out_date" name="checkout" type="text" value=<?php echo $checkout;?> readonly />
                                        <span class="input-group-addon"><i class="fa fa-calendar p-1 mt-1"></i></span>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 form-group">
                                
                                        <lable><b> No of Rooms:</b></lable>
                                        <input type="text" class="form-control w-100 input-box form-rounded" name="no_of_rooms" value=<?php echo $no_of_rooms;?> readonly>                     
                            </div>
                        </div>
 
                    
                        <div class="row">
                                <div class="col-6 form-group">
                                    
                                    <lable><b> Adults:</b></lable>
                                    <input class="form-control w-100 input-box form-rounded" name="adults" value=<?php echo $adults;?> readonly>
                

                                </div>

                                <div class="col-6 form-group">
                                    
                                    <lable><b> Children:</b></lable>
                                    <input class="form-control w-100 input-box form-rounded" name="children" value=<?php echo $children;?> readonly>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-12 form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <lable><b>Amount:</b></lable>
                                        <input type='text' name="amount" class="form-control input-box form-rounded" value=<?php echo $amount;?> required>
                                    </div>
                                    <div class="col-6">
                                        <lable><b>Currency:</b></lable>
                                        <input type='text' name="currency" class="form-control input-box form-rounded" value="USD" required>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" value="Pay Now" name="send_payment" class="btn btn-deep-orange">
                            </div>
                        </div>
            </div>
        </div>
        
        <!-- <input type="text" name="amount" value=<?php echo $amount;?>>   -->
        <!-- <input type="text" name="first_name" value=<?php echo $fname;?>>
        <input type="text" name="last_name" value=<?php echo $lname;?>><br> -->
        <!-- <input type="text" name="email" value=<?php echo $email;?>> -->
        <!-- <input type="text" name="phone" value=<?php echo $pnumber;?>><br>
        <input type="text" name="country" value=<?php echo $country;?>><br><br> -->
        <!-- <input type="submit" value="Pay Now" name="send_payment" onclick="double_submit()">    -->
    </form>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
    

    

    
</body>
</html>


        
        <?php   
    }
    else{
        include 'admin_room_data_insert.php';
        header('Location:adminbookshow.php'); 
    }
    }
?>