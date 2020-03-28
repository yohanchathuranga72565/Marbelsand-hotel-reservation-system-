<?php
    include 'connection.php';
    // if(isset($_GET['order_id']) && isset($_SESSION['name'])){
        // if(isset($_SESSION['email'])){
            // $type="registered";
        // }
        // else{
        $type="unregistered";
        // }
        $customer_id=0;
        
        $query="INSERT INTO customer (customer_type,name,email,contact_no,age,country) VALUES ('{$type}','{$_SESSION['name']}','{$_SESSION['email2']}','{$_SESSION['pnumber']}','{$_SESSION['age']}','{$_SESSION['country']}')";
        $result_set = mysqli_query($connection,$query);

        $query3="SELECT * FROM customer";
        $result_set3 = mysqli_query($connection,$query3);
        if(mysqli_num_rows($result_set3)>0){
            foreach($result_set3 as $row){
                $customer_id=$row['customer_id'];
            }
        }


        $query1="INSERT INTO room_reservation (check_in_date,check_out_date,customer_id,no_guest,type_id,no_of_rooms) VALUES ('{$_SESSION['checkin']}','{$_SESSION['checkout']}','{$customer_id}','{$_SESSION['no_guest']}','{$_SESSION['typeid']}','{$_SESSION['no_of_rooms']}')";
        $result_set1 = mysqli_query($connection,$query1);

        $reserve_id=0;

        $query5="SELECT * FROM room_reservation";
        $result_set5 = mysqli_query($connection,$query5);

        if(mysqli_num_rows($result_set5)>0){
            foreach($result_set5 as $row){
                $reserve_id=$row['reservation_id'];
            }
        }

        $query6="INSERT INTO payment (customer_id,reservation_id,amount,payment_method) VALUES ('{$customer_id}','{$reserve_id}','{$_SESSION['amount']}','{$_SESSION['payment_type']}')";
        $result_set6 = mysqli_query($connection,$query6);

        $query7="SELECT * FROM payment";
        $result_set7 = mysqli_query($connection,$query7);
        $payment_id=0;
        if(mysqli_num_rows($result_set7)>0){
            foreach($result_set7 as $row){
                $payment_id=$row['payment_id'];
            }
        }

        $query8="UPDATE room_reservation SET payment_id='{$payment_id}' WHERE customer_id='{$customer_id}'";
        $query_run=mysqli_query($connection,$query8);

        // email sent start
            $name = $_SESSION['name'];
            $email = $_SESSION['email2'];
            $subject="Marble Sand Room reservation Confermation";
            $comment = 'Hey Mr./Mrs./Ms. '.$_SESSION['name'].',<br>'.'Your  room reservation on between '.$_SESSION['checkin'].' and '.$_SESSION['checkout'].'  has completed successfully.'.'<br>'.'Reservation Details :-'.'<br>'.'Check in date : '.$_SESSION['checkin'].'<br> Check out date : '.$_SESSION['checkout'].'<br>Number of rooms : '.$_SESSION['no_of_rooms'].'<br>Room Type : '.$_SESSION['roomtype'].'<br><br> Thanks for your reservation...';
            // Content-Type helps email client to parse file as HTML 
            // therefore retaining styles
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $message = "<html>
            <head>
                <title>New message from website contact form</title>
            </head>
            <body>
                <h1>" . $subject . "</h1>
                <p>".$comment."</p>
            </body>
            </html>";


            

            if (mail($email, $subject, $comment, $headers)) {
                $_SESSION['emailsent']=1;
            
            
            }else{
                $_SESSION['emailsent']=0;
            
            }

        // email send end

        unset($_SESSION['name']);
        unset($_SESSION['age']);
        unset($_SESSION['email2']);
        unset($_SESSION['pnumber']);
        unset($_SESSION['country']);
        unset($_SESSION['roomtype']);
        unset($_SESSION['checkin']);
        unset($_SESSION['checkout']);
        unset($_SESSION['no_of_rooms']);
        unset($_SESSION['adults']);
        unset($_SESSION['children']);
        unset($_SESSION['no_guest']);
        unset($_SESSION['amount']);
        unset($_SESSION['typeid']);
        unset($_SESSION['payment_type']);


    // }
?>