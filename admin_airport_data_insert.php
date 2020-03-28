<?php
    include 'connection.php';
    // if(isset($_GET['order_id']) && isset($_SESSION['name'])){
    //     if(isset($_SESSION['email'])){
    //         $type="registered";
    //     }
    //     else{
            $type="unregistered";
        // }
    
        $query="INSERT INTO customer (customer_type,name,email,contact_no,age,country) VALUES ('{$type}','{$_SESSION['name']}','{$_SESSION['email2']}','{$_SESSION['pnumber']}','{$_SESSION['age']}','{$_SESSION['country']}')";
        $result_set = mysqli_query($connection,$query);
    
        $query1="SELECT * FROM vehicle_reservation WHERE pick_up_date='{$_SESSION['date']}'";
        $result_set1 = mysqli_query($connection,$query1);
    
    
    //     if($result_set1){
    //         if(mysqli_num_rows($result_set1)>0){
    //             foreach($result_set1 as $row){
    //             $bookvehicle[]=$row['vehicle_id'];
    //         }    
    //     }
    //         echo 'run 1';
    // }
        
        $query2="SELECT * FROM vehicle";
        $result_set2 = mysqli_query($connection,$query2);
        
        // if(mysqli_num_rows($result_set2)>0){
        //     foreach($result_set2 as $row){
        //         $vehicle_id[]=$row['vehicle_id'];
        //     }
        //     echo 'run 2';
        // }
        $setvehicle=0;
        $customer_id=0;
        $payment_id=0;
        // if(mysqli_num_rows($result_set1)>0){
            foreach($result_set1 as $bovehicle){
                foreach($result_set2 as $vehicle){
                    if(($bovehicle['vehicle_id']!=$vehicle['vehicle_id']) && ($_SESSION['vtype']==$vehicle['vehicle_type']) ){
                        $setvehicle=$vehicle['vehicle_id'];
                        break;
                    }
                }
            }
        // }
        // else{
        //     foreach($result_set2 as $vehicle){
        //         if($_SESSION['vtype']==$vehicle['vehicle_type']){
        //             $setvehicle=$vehicle['vehicle_id'];
        //         }
        //     }
        // }
    
        $query3="SELECT * FROM customer";
        $result_set3 = mysqli_query($connection,$query3);
        if(mysqli_num_rows($result_set3)>0){
            foreach($result_set3 as $row){
                $customer_id=$row['customer_id'];
            }
        }
        if(mysqli_num_rows($result_set1)>0){
            if($setvehicle!=0){
                $query4="INSERT INTO vehicle_reservation (vehicle_id,customer_id,flight_no,pick_up_date,pick_up_time) VALUES ('{$setvehicle}','{$customer_id}','{$_SESSION['fno']}','{$_SESSION['date']}','{$_SESSION['time']}')";
                $result_set4 = mysqli_query($connection,$query4);
                
            }
            else{
                echo 'no vehicle';
            }
        }
        else{
            foreach($result_set2 as $vehicle){
                if($_SESSION['vtype']==$vehicle['vehicle_type']){
                    $setvehicle=$vehicle['vehicle_id'];
                    $query4="INSERT INTO vehicle_reservation (vehicle_id,customer_id,flight_no,pick_up_date,pick_up_time) VALUES ('{$setvehicle}','{$customer_id}','{$_SESSION['fno']}','{$_SESSION['date']}','{$_SESSION['time']}')";
                    $result_set4 = mysqli_query($connection,$query4);
                }
            }
    
        }
    
        $query5="SELECT * FROM vehicle_reservation";
        $result_set5 = mysqli_query($connection,$query5);
    
        
        $reserve_id=0;
        if(mysqli_num_rows($result_set5)>0){
            foreach($result_set5 as $row){
                $reserve_id=$row['vehicle_reservation_id'];
            }
        }
        $query6="INSERT INTO payment (customer_id,reservation_id,amount,payment_method) VALUES ('{$customer_id}','{$reserve_id}','{$_SESSION['amount']}','{$_SESSION['payment_type']}')";
        $result_set6 = mysqli_query($connection,$query6);
    
        
    
        $query7="SELECT * FROM payment";
        $result_set7 = mysqli_query($connection,$query7);
        if(mysqli_num_rows($result_set7)>0){
            foreach($result_set7 as $row){
                $payment_id=$row['payment_id'];
            }
        }
    
        $query8="UPDATE vehicle_reservation SET payment_id='{$payment_id}' WHERE customer_id='{$customer_id}'";
        $query_run=mysqli_query($connection,$query8);
    
        // header('Location:airportpickup.php');
    
        include 'airportEmail.php';
    
    
        unset($_SESSION['vtype']);
        unset($_SESSION['date']);
        unset($_SESSION['time']);
        unset($_SESSION['fno']);
        unset($_SESSION['email2']);
        unset($_SESSION['name']);
        unset($_SESSION['pnumber']);
        unset($_SESSION['country']);
        unset($_SESSION['age']);
        unset($_SESSION['amount']);
        unset($_SESSION['payment_type']);
    
       
    
    
        // header('Location:airportpickup.php');
        
    
    

?>