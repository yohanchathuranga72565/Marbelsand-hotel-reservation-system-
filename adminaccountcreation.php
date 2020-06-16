<?php
    session_start();
    include 'connection.php';
    $fname='';
    $lname='';
    $name='';
    $email='';
    $pnum='';
    $password1='';
    $password2='';
    $hashpass='';
    $acc_type='';
    $user_id=0;
    if(isset($_POST['create'])){
        $errors=array();
        $fname=trim($_POST['fname']);
        $lname=trim($_POST['lname']);
        $email=trim($_POST['email']);
        $pnum=trim($_POST['pnumber']);
        $acc_type=trim($_POST['accounttype']);
        $name=$fname.' '.$lname;
        $password1=trim($_POST['password1']);
        $password2=trim($_POST['password2']);

        $query3="SELECT email FROM login WHERE email='{$email}'";
        $result_set3=mysqli_query($connection,$query3);
        if(mysqli_num_rows($result_set3)>0){
            $errors[]="Email is already exist";
            $_SESSION['exist']=1;
            
        }
        

        if($password1!=$password2){
            $errors[]="password is didn't match";
            $_SESSION['pass']=1;
        }

        if(empty($errors)){
            $hashpass=sha1($password1);
            $vkey = md5(time().$email);
            echo $hashpass.'<br>';
            $query="INSERT INTO login (email, pass_word, user_type, vkey) VALUES ('{$email}', '{$hashpass}', '{$acc_type}', '{$vkey}')";
            $result_set = mysqli_query($connection,$query);

            $query1="SELECT user_id FROM login WHERE email='{$email}'";
            $result_set1 = mysqli_query($connection,$query1);
            if($result_set1){
                $row=mysqli_fetch_assoc($result_set1);
                foreach($result_set1 as $row){
                    $user_id=$row['user_id'];
                }

            }
            

            if($acc_type=='admin'){
                $query2="INSERT INTO administrator (user_id, name, contact_no, email) VALUES ('{$user_id}', '{$name}', '{$pnum}', '{$email}')";
                $result_set2=mysqli_query($connection,$query2);
                $_SESSION['acc_ok']=1;
                // header('Location:admindashboard.php');

            }
            else{
                $query2="INSERT INTO receptionist (user_id, name, contact_no, email) VALUES ('{$user_id}', '{$name}', '{$pnum}', '{$email}')";
                $result_set2=mysqli_query($connection,$query2);
                $_SESSION['acc_ok']=1;
                // header('Location:admindashboard.php');
            }

            if($result_set){
                $_SESSION['accflag']=1;
                //header('Location:index.php?user_added=true');
                //sending verification email
                $to=$email;
                $subject="Email Verification";
                $message="Welcome to the Hotel Marble Sand...please verify your account by clicking this link.<br><a href='http://localhost/hotel reservation system/index.php?vkey=$vkey'>Register Account</a>";
                $headers="From : marblesandsl@gmail.com \r\n";
                $headers.="MIME-Version: 1.0" . "\r\n";
                $headers.="Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($to,$subject,$message,$headers);
                header('Location:admindashboard.php');
                exit;
            }
            else{
              $_SESSION['accflag']=0;
              $errors[]= $result . 'Failed to add new record';
              $errors[]= mysqli_error($connection);
              header('Location:admindashboard.php');
              exit;
            }



        }
        else{
            // foreach($errors as $error){
            //     echo $error; 

            // }
            header('Location:admindashboard.php');
        }

    }

?>