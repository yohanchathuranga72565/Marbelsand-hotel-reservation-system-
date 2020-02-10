<?php
   
if (isset($_POST['send_message'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone=$_POST['phone'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $comment = $email.'<br>'.$phone.'<br>'.$message;
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

  function validate_phone_number($phone)
  {
       // Allow +, - and . in phone number
       $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
       // Remove "-" from number
       $phone_to_check = str_replace("-", "", $filtered_phone_number);
       // Check the lenght of number
       // This can be customized if you want phone number from a specific country
       if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
          return false;
       } else {
         return true;
       }
  }

  if (validate_phone_number($phone) == false) {
    $_SESSION['phone']=1;
    header('Location:contactus.php');
    exit;
 } else {

  if (mail('yohanchathuranga72565@gmail.com', $subject, $comment, $headers)) {
    $_SESSION['email1']=1;
    header('Location:contactus.php');
    exit;
  
  }else{
    $_SESSION['email1']=0;
    header('Location:contactus.php');
    exit;
  }
  }
}



?>