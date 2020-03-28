<?php
  $name = $_SESSION['name'];
  $email = $_SESSION['email2'];
  $date =  $_SESSION['date'];
  $time = $_SESSION['time'];
  $flight_no = $_SESSION['fno'];
  $vehicle_type = $_SESSION['vtype'];
  $subject="Marble Sand Vehicle reservation Confermation";
  $comment = 'Hey Mr./Mrs./Ms. '.$name.',<br>'.'Your reservation for an airport vehicle on '.$date.' at '.$time.' has completed successfully.'.'<br>'.'Reservation Details :-'.'<br>'.'Flight No : '.$flight_no.'<br>Date : '.$date.'<br>Time : '.$time.'<br>Vehicle Type : '.$vehicle_type;
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




?>