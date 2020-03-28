<?php
include 'connection.php';
$checkin = date('Y-m-d', strtotime(0));
$checkout = date('Y-m-d', strtotime(0));
//$checkout=date();
$adults=0;
$children=0;
$room_no=array();
$row=array();
$bookdays=array();
$specifiedbookdays=array();
$bookingroomid=array();
$booknoofrooms=array();
$totalnoofroomsitem1=0;
$totalnoofroomsitem2=0;
$totalnoofroomsitem3=0;
$totalnoofroomsitem4=0;
$totalnoofroomsitem5=0;
$indate = date('Y-m-d', strtotime(0));
$outdate=date('Y-m-d', strtotime(0));
$freedate=array();
$set=0;
$freerooms=0;




if(isset($_POST['search'])){
   $checkin = mysqli_real_escape_string($connection,date('Y-m-d', strtotime($_POST['checkin'])));
   $checkout = mysqli_real_escape_string($connection,date('Y-m-d', strtotime($_POST['checkout'])));
   $_SESSION['checkin']=$_POST['checkin'];
   $_SESSION['checkout']=$_POST['checkout'];

//    $adults= mysqli_real_escape_string($connection,$_POST['adults']);
//    $children= mysqli_real_escape_string($connection,$_POST['children']);
   // $query1="SELECT * FROM room_reservation";
   
   // $result_set1 = mysqli_query($connection,$query1);
   // if(mysqli_num_rows($result_set1)>0){
   //         while($row = mysqli_fetch_assoc($result_set1)) {
   //             if(date('Y-m-d',strtotime($row['check_out_date'])) <= date('Y-m-d')){
   //                 $deletequery = "DELETE FROM room_reservation WHERE reservation_id=$row['reservation_id']";
   //                 $rr=mysqli_query($connection, $deletequery);
   //             }
   //         }
   //     }

   
   
   $query="SELECT * FROM room_reservation";
   $result_set = mysqli_query($connection,$query);
   if(mysqli_num_rows($result_set)>0){
   $checkdate=$checkin;
       while($row = mysqli_fetch_assoc($result_set)) {
           $indate=date('Y-m-d', strtotime($row["check_in_date"]));
           $outdate=date('Y-m-d', strtotime($row["check_out_date"]));
           while($indate<=$outdate){
               if (!in_array($indate, $bookdays)){
                   $bookdays[]=$indate;
                   $indate=date('Y-m-d', strtotime($indate . ' +1 day'));
               }
               else{
                   $indate=date('Y-m-d', strtotime($indate . ' +1 day'));
               }
               

           }
           $set=0;
           foreach($bookdays as $day){
               if($checkin <= $day && $checkout >= $day){
                   if($row["check_in_date"] <= $day && $row["check_out_date"] >= $day){
                       $bookingroomid[]=$row["type_id"];
                       if($set==0){
                           if($row["type_id"]==1){
                               $totalnoofroomsitem1=$totalnoofroomsitem1+$row["no_of_rooms"];
                           }
                           elseif($row["type_id"]==2){
                               $totalnoofroomsitem2=$totalnoofroomsitem2+$row["no_of_rooms"];
                           }
                           elseif($row["type_id"]==3){
                               $totalnoofroomsitem3=$totalnoofroomsitem3+$row["no_of_rooms"];
                           }
                           elseif($row["type_id"]==4){
                               $totalnoofroomsitem4=$totalnoofroomsitem4+$row["no_of_rooms"];
                           }
                           elseif($row["type_id"]==5){
                               $totalnoofroomsitem5=$totalnoofroomsitem5+$row["no_of_rooms"];
                           }
                           else{
                               //error
                           }
                           $set=1;
                   }

                   }

           }
               
           }
           
       }
   foreach($bookdays as $day){
       if($checkin<=$day && $checkout>=$day){
           $specifiedbookdays[]=$day;
           
       }
   }

   $bookingroomid=array_unique($bookingroomid);
   
}
 $_SESSION['check']=1;
}
?>