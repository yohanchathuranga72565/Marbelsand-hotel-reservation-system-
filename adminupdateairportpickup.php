<?php
    include 'connection.php';
    if(isset($_POST['editdata'])){
        
        $vehicle_reservation_id = $_POST['vehicle_reservation_id'];
        $vehicle_id = $_POST['vehicle_id'];
        $customer_id = $_POST['customer_id'];
        $flight_no = $_POST['flight_no'];
        $payment_id = $_POST['payment_id'];
        $pick_up_date = $_POST['pick_up_date'];
        $pick_up_time = $_POST['pick_up_time'];
    

        $query="UPDATE vehicle_reservation SET vehicle_reservation_id='$vehicle_reservation_id',vehicle_id='$vehicle_id',customer_id='$customer_id',flight_no='$flight_no',
                payment_id='$payment_id',pick_up_date='$pick_up_date',pick_up_time='$pick_up_time' WHERE vehicle_reservation_id='$vehicle_reservation_id'";

        $query_run=mysqli_query($connection,$query);

        if($query_run){
            header('Location:adminairportshow.php');
        }
        else{
            header('Location:adminairportshow.php');
        }
    }
?>
