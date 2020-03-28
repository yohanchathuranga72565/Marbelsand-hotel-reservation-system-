<?php
    include 'connection.php';
    if(isset($_POST['editdata'])){
        
        $type_id = $_POST['type_id'];
        $total_rooms = $_POST['total_rooms'];
        $room_price = $_POST['room_price'];
        $room_name = $_POST['room_name'];
        $max_guests = $_POST['max_guests'];

        $query="UPDATE room_type SET type_id='$type_id',total_rooms='$total_rooms',room_price='$room_price',room_name='$room_name',
                max_guests='$max_guests' WHERE type_id='$type_id'";

        $query_run=mysqli_query($connection,$query);

        if($query_run){
            header('Location:adminroomshow.php');
        }
        else{
            header('Location:adminroomshow.php');
        }
    }
?>