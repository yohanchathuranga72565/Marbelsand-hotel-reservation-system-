<?php
    session_start();

    $fname="";
    $lname="";
    $email="";
    $pnumber="";
    $vtype="";
    $country="";
    $amount="";

    if(isset($_POST['adddata'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $pnumber=$_POST['pnumber'];
        $vtype=$_POST['vtype'];
        $country=$_POST['country'];
        $payment_type=$_POST['payment_type'];


        $_SESSION['vtype']=$_POST['vtype'];
        $_SESSION['date']=$_POST['date'];
        $_SESSION['time']=$_POST['time'];
        $_SESSION['fno']=$_POST['fno'];
        $_SESSION['email2']=$_POST['email'];
        $_SESSION['name']=$_POST['fname']." ".$_POST['lname'];
        $_SESSION['pnumber']=$_POST['pnumber'];
        $_SESSION['country']=$_POST['country'];
        $_SESSION['age']=$_POST['age'];

        $_SESSION['payment_type']=$_POST['payment_type'];

        if($vtype=="Budget"){
            $amount=50;
        }
        elseif($vtype=="City"){
            $amount=60;
        }
        elseif($vtype=="Car"){
            $amount=70;
        }
        elseif($vtype=="Minivan"){
            $amount=80;
        }
        elseif($vtype=="Van"){
            $amount=90;
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
        <input type="hidden" name="return_url" value="http://localhost/hotel reservation system/adminairportshow.php">
        <input type="hidden" name="cancel_url" value="http://localhost/hotel reservation system/adminairportshow.php">
        <input type="hidden" name="notify_url" value="">  
        <input type="hidden" name="order_id">
        <input type="hidden" name="items" placeholder="Room Type"><br>
        <!-- <input type="hidden" name="currency" value="USD"> -->
        <input type="hidden" name="address" value="No.1, Galle Road">
        <input type="hidden" name="city" value="Colombo">
        <div class="row ">
                <div class="col-12 text-center mt-5">
                    <h2>Airport pick up</h2>
                </div>
        </div>  

        <div class="container-fluid">
            <div class="col-6 offset-3">
                <div class="row mt-5">
                    <div class="col-12 form-group">
                    <lable><b>Your Name:</b></lable>
                                    <div class="row">
                                    <div class="col-6">
                                    <input type='text'name="first_name" class="form-control input-box form-rounded" value=<?php echo $fname;?> required readonly>
                                    </div>
                                    <div class="col-6">
                                    <input type='text' name="last_name" class="form-control input-box form-rounded" value=<?php echo $lname;?> required readonly>
                                    </div>
                                    </div>
                    </div>   
                </div>

                <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Email:</b></lable>
                                    <input type='email' name='email' class="form-control input-box form-rounded" value=<?php echo $email;?> required readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Contact no:</b></lable>
                                    <input type='text' name="phone" class="form-control input-box form-rounded" value=<?php echo $pnumber;?> required readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <lable><b>Country:</b></lable>
                                    <input type='text' name="country" class="form-control input-box form-rounded" value=<?php echo $country;?> required readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <lable><b>Amount:</b></lable>
                                        <input type='text' name="amount" class="form-control input-box form-rounded" value=<?php echo $amount;?> required readonly>
                                    </div>
                                    <div class="col-6">
                                        <lable><b>Currency:</b></lable>
                                        <input type='text' name="currency" class="form-control input-box form-rounded" value="USD" required readonly>
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
        include 'admin_airport_data_insert.php';
        header('Location:adminairportshow.php'); 
    }
    }
?>