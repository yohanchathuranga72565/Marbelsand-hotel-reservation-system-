<?php
    session_start();
    include 'connection.php';
    $oldpassword='';
    $newpassword='';
    $compassword='';

        if((isset($_SESSION['user_type'])) && isset($_POST['changepassword'])){
            $oldpassword=sha1(trim($_POST['oldpass']));
            $newpassword=trim($_POST['newpassword']);
            $compassword=trim($_POST['compassword']);

            $query1="SELECT * FROM login WHERE  pass_word='{$oldpassword}' LIMIT 1";
            $result_set1 = mysqli_query($connection,$query1);

            if($result_set1){
                    if(mysqli_num_rows($result_set1) == 1){
                    echo "set";
                    if($newpassword == $compassword){
                        $hashpass=sha1($newpassword);
                        $query2="UPDATE login SET pass_word='{$hashpass}' WHERE email='{$_SESSION['email']}'";
                        $result_set2=mysqli_query($connection,$query2);
                        $_SESSION['compass']=1;
                        header('Location:admindashboard.php');


                    }
                    else{
                        //confirm password did not match
                        $_SESSION['compass']=0;
                        header('Location:admindashboard.php');
                    }
                }
                else{
                    //please enter correct old password
                    $_SESSION['corrold']=1;
                    header('Location:admindashboard.php');
                }
                
            }

            echo $oldpassword.'<br>';
            echo $newpassword.'<br>';
            echo $compassword.'<br>';
            

        }



?>