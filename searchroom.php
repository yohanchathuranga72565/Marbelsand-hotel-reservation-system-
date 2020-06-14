<?php 

 include 'checkin.php';

 if(isset($_SESSION['check'])){
 echo '<div class="modal fade" id="roomtype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLongTitle">Available Room Categories<br/>between ' .$checkin . ' and ' .$checkout . '</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
     <div class="modal-body">
       <div class="container-fluid">';
     if($totalnoofroomsitem1<23){
        $freerooms=23-$totalnoofroomsitem1;
      echo '<div class="row">';
             echo '<div class="col-12 pb-3 d-flex justify-content-center">';
                 echo '<div class="card" style="width: 18rem;">';
                     echo '<img src="assets\images\delux_city_facing.jpg" class="card-img-top img-responsive" alt="delux_city_facing">';
                     echo '<div class="card-body">';
                         echo '<p class="card-text"><b>Deluxe City Facing room</b><br/>';
                         echo 'Max: 3 Person(s)<br/>';
                         echo 'Max: 2 Child(s)<br/>' ;
                         echo 'Get 10% discount by booking before 21st April 2020</br>';
                         echo 'you have ' . $freerooms . ' free rooms </br>';
                         echo '<span class="badge badge-pill badge-secondary">$135</span>';
                         echo '<span class="badge badge-pill badge-secondary"><del>$150</del></span>'; 
                         echo '</p>';
                     echo '</div>';
                     echo '<div class="card-footer d-flex justify-content-center">';
                         echo '<a href="deluxecity.php" class="btn btn-sm btn-deep-orange">Book now</a>';
                     echo '</div>';
                 echo '</div>';

             echo '</div>';
             $freerooms=0;
           
         echo '</div>';
     }
     if($totalnoofroomsitem2<20){
        $freerooms=20-$totalnoofroomsitem2;
        echo '<div class="row">';
            echo '<div class="col-12 pb-3 d-flex justify-content-center">';

           echo ' <div class="card" style="width: 18rem;">
                <img src="assets\images\deluxe_ocean_facing.jpg" class="card-img-top img-responsive" alt="...">
                <div class="card-body">
                <p class="card-text"><b>Deluxe Ocean Facing room</b><br/>
                  Max: 3 Person(s)<br/>
                  Max: 2 Child(s)<br/>
                  Get 10% discount by booking before 21st April 2020</br>';
                  echo 'you have ' . $freerooms . ' free rooms </br>';
              echo '<span class="badge badge-pill badge-secondary">$126</span>
              <span class="badge badge-pill badge-secondary"><del>$140</del></span>
                </p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                <a href="deluxeocean.php" class="btn btn-sm btn-deep-orange">Book now</a>
                </div>
            </div>';

            echo '</div>';
            $freerooms=0;
        echo '</div>';
    }
    if($totalnoofroomsitem3<25){
        $freerooms=25-$totalnoofroomsitem3;
        echo '<div class="row">';
            echo '<div class="col-12 pb-3 d-flex justify-content-center">';

            echo '<div class="card" style="width: 18rem;">
            <img src="assets\images\luxury_city_view.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
            <div class="card-body">
              <p class="card-text"><b>Luxury City View room</b><br/>
              Max: 3 Person(s)<br/>
              Max: 2 Child(s) <br/>
              Get 10% discount by booking before 21st April 2020</br>';
              echo 'you have ' . $freerooms . ' free rooms </br>';
              echo '<span class="badge badge-pill badge-secondary">$117</span>
              <span class="badge badge-pill badge-secondary"><del>$130</del></span> 
            </p>
            </div>
            <div class="card-footer d-flex justify-content-center">
            <a href="luxurycity.php" class="btn btn-sm btn-deep-orange">Book now</a>
            </div>
          </div>';

            echo '</div>';
            $freerooms=0;
        echo '</div>';

    }

    if($totalnoofroomsitem4<26){
        $freerooms=26-$totalnoofroomsitem4;
        echo '<div class="row">';
            echo '<div class="col-12 pb-3 d-flex justify-content-center">';

            echo '<div class="card" style="width: 18rem;">
            <img src="assets\images\luxury_ocean_view.jpg" class="card-img-top img-responsive" alt="delux_city_facing">
            <div class="card-body">
              <p class="card-text"><b>Luxury Ocean View room</b><br/>
              Max: 3 Person(s)<br/>
              Max: 2 Child(s) <br/>
              Get 10% discount by booking before 21st April 2020</br>';
              echo 'you have ' . $freerooms . ' free rooms </br>';
            echo '<span class="badge badge-pill badge-secondary">$108</span>
            <span class="badge badge-pill badge-secondary"><del>$120</del></span> 
            </p>
            </div>

            <div class="card-footer d-flex justify-content-center">
            <a href="luxuryocean.php" class="btn btn-sm btn-deep-orange">Book now</a>
            </div>
          </div>';

            echo '</div>';
            $freerooms=0;
        echo '</div>';

    }

    if($totalnoofroomsitem5<6){
        $freerooms=6-$totalnoofroomsitem5;
        echo '<div class="row">';
            echo '<div class="col-12 pb-3 d-flex justify-content-center">';

            echo '<div class="card" style="width: 18rem;">
              <img src="assets\images\executive_suits.jpg" class="card-img-top img-responsive" alt="...">
              <div class="card-body">
              <p class="card-text"><b>Executive Suite</b><br/>
                Max: 3 Person(s)<br/>
                Max: 2 Child(s) <br/>
                Get 10% discount by booking before 21st April 2020</br>';
                echo 'you have ' . $freerooms . ' free Suites  </br>';
              echo '<span class="badge badge-pill badge-secondary">$90</span>
              <span class="badge badge-pill badge-secondary"><del>$100</del></span> 
              </p>
              </div>

              <div class="card-footer d-flex justify-content-center">
              <a href="executivesuit.php" class="btn btn-sm btn-deep-orange">Book now</a>
              </div>
            </div>';

            echo '</div>';
            $freerooms=0;
        echo '</div>';

    }


       echo '</div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
     </div>
  </div>
 </div>
</div>';
unset($_SESSION['check']);
unset($_SESSION['checkin']);
unset($_SESSION['checkout']);

}
    
 

    

    

?>

