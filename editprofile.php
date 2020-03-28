<?php
    session_start();
    include 'connection.php';

    if(isset($_SESSION['user_type'])){
        $sql= "SESLECT * FROM administrator WHERE email='{$_SESSION['email']}'";
        $result = mysqli_query($connection, $sql);

        if($_SESSION['user_type']=="admin"){

            if(mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                }
            }
        }
        // else{
        //     header('Location:index.php'); 
        // }
    }
    
?>