<?php
    include 'connection.php';
    if(isset($_POST['editdata'])){
        
        $reservation_id = $_POST['reservation_id'];
        $payment_id = $_POST['payment_id'];
        $check_in_date = $_POST['checkin'];
        $check_out_date = $_POST['checkout'];
        $customer_id = $_POST['customer_id'];
        $room_no = $_POST['room_no'];
        $no_guest = $_POST['no_guest'];
        $type_id = $_POST['type_id'];
        $no_of_rooms = $_POST['no_of_rooms'];

        $query="UPDATE room_reservation SET reservation_id='$reservation_id',payment_id='$payment_id',check_in_date='$check_in_date',check_out_date='$check_out_date',
                customer_id='$customer_id',room_no='$room_no',no_guest='$no_guest',type_id='$type_id',no_of_rooms='$no_of_rooms' WHERE reservation_id='$reservation_id'";

        $query_run=mysqli_query($connection,$query);

        if($query_run){
            header('Location:adminbookshow.php');
        }
        else{
            header('Location:adminbookshow.php');
        }
    }
?>