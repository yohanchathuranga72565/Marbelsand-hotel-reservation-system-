<?php session_start();
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="airportpickup.css">
    <link rel="stylesheet" type="text/css" href="excursion.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <title>Document</title>
</head>
<body>

<!-- Nav bar start-->
<?php include 'navbar.php';?>
    <!-- Nav bar end-->

    <!-- excursion header start-->
    <div id="header" class="header">
            <div class="row">
                <div class="col-12">
                    <h1><b>Excursion</b></h1>
                    <h1 class="wordnav" style="font-size:50px;"><b>Hotel Marble Sand</b></h1>
                    <div class="text-center">
                      <img class="img-responsive mt-0" width="20%" src="assets\images\newlogo.png"  alt="logo">
                    </div>
                </div>
            </div>
        </div>
    <!-- excursion header end-->
    <div class="container-fluid">
      <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Excursions</li>
                </ol>
            </div>
      </div>
        
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-12 word text-center wow slideInLeft">
                <h1>Know About Our Tours..</h1>
            </div>
        </div>
    </div>

    <!--tours starts-->
    <div class="container">
        <div class="row">
    <?php
        $idno=0;
        
        $data=file_get_contents("adminexcursion.json");
        $data=json_decode($data,true);

        $query0="SELECT excursion_id FROM excursion";
        $query_run0=mysqli_query($connection,$query0);
        $total_rows=mysqli_num_rows($query_run0);
        $rows_per_page=9;

        if(isset($_GET['p'])){
                $page_no=$_GET['p']; 
        }
        else{
            $page_no=1; 
        }

             
        $start=($page_no-1) * $rows_per_page;


        // $query="SELECT * FROM vehicle_reservation LIMIT {$start},{$rows_per_page}";
        // $query_run=mysqli_query($connection,$query);

        $query="SELECT * FROM excursion LIMIT {$start},{$rows_per_page}";
        $result_set=mysqli_query($connection,$query);
        if(mysqli_num_rows($result_set)){
            foreach($result_set as $row){
                $flag=0; 
                $jsonarr=array();
                foreach($data as $data1){
                    if($data1!=""){
                        if($data1["id"]==strval($row['excursion_id']) ){
                            $jsonarr=$data1;
                            $flag=1;
                            }
                    }
                }
                if($flag==0){
                    continue;
                }
                ?>
               
                <div class="col-lg-4 col-md-4 col-sm-6  col-12 d-flex justify-content-center mt-1 float-left pb-4">
                <div class="row wow slideInUp">
                <div class="col-12">
                    <a data-toggle="modal" data-target="<?php echo '#'.$idno; ?>">
                    <div class="card bg-dark text-white">
                        <img class="card-img dark" src="<?php echo $row['img_path']; ?>" alt="Card image" height="200px">
                        <div class="card-img-overlay text-center p-3">
                            <h5 class="card-title"><i><?php echo $row['topic']; ?></i></h5>
                            <p class="card-text"><span class="badge  badge-pill badge-secondary"><?php echo $row['amount'].'$'; ?></span> Per Person<br>Click for more details</p>
                        </div>
                            
                    </div>
                    </a>  
                </div>
                <div class="row">
                <div class="col-12">
                <?php
                    if(isset($_SESSION['user_type'])){
                        if($_SESSION['user_type']=="admin"){

     
                            ?> 
                        <div  class="col-12 text-center">
                            <!-- <a href=adminexcursion.php?id=<?php echo $row['excursion_id'];?> type="button" class="btn btn-success btn-sm ml-3">Edit</a> -->
                            <a href=excursiondelete.php?id=<?php echo $row['excursion_id'];?> type="button" class="btn btn-danger btn-sm ml-3">delete</a>
                        </div>
                        <?php
                        }
                    }
                        ?>  
                </div>
                
                </div>
                </div>
                </div>
                
                
                
                

        <div class="modal fade" id="<?php echo $idno; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $row['topic']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                <?php echo $jsonarr['overview']; ?>
            
                </p>
                <ul>
                <?php 
                $arr=array();
                $arr1=explode(".",$jsonarr['overview_point']);
                $arr2=explode(".",$jsonarr['included_point']);
                foreach($arr1 as $r1)
                    {
                        if(empty($r1)){
                            continue;
                        }
                        ?>
                        <li><?php echo $r1;?></li>
                    <?php
                    }
                ?>
                    

                    
                </ul>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                    <?php
                    foreach($arr2 as $r2)  
                    {
                        if(empty($r2)){
                            continue;
                        }
                        ?>
                        <li><?php echo $r2;?></li>
                        
                    <?php
                    }
                ?>
                        
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

            <?php
                $idno=$idno + 1;
            }
        }
    
    ?>
    <?php
     //first page
        $first="<a href=\"excursion.php?p=1\"><b>First</b></a>";

        //last page
        $last_page_no=ceil($total_rows/$rows_per_page);
        $last="<a href=\"excursion.php?p={$last_page_no}\"><b>Last</b></a>";

        //next page
        if($page_no>=$last_page_no){
            $next="<a><b>Next</b></a>";
        }
        else{
            $next_page_no=$page_no+1;
            $next="<a href=\"excursion.php?p={$next_page_no}\"><b>Next</b></a>";
        }

        //previous page
        if($page_no<=1){
            $prev="<a><b>Previous</b></a>";
        }
        else{
            $prev_page_no=$page_no-1;
            $prev="<a href=\"excursion.php?p={$prev_page_no}\"><b>Previous</b></a>";
        }
    ?>
        
        

    </div>
    
    </div>
    <div class="col-12  text-center  bg-dark text-light"> 
            <?php echo $first .' | '. $prev .' | <b>Page  '. $page_no . ' of ' .$last_page_no.'</b> | '. $next .' | '. $last ;?>
    </div>
    <!-- <div class="container">
        <div class="row wow slideInUp">
          <div class="col-md-4 col-12 d-flex justify-content-center mt-1">
          <a data-toggle="modal" data-target="#Galle">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\galle.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>Galle Full Day Tour</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$50</span> Per Person</p>
            </div>
          </div>
          </a>
          </div>
          
          <div class="col-md-4 col-12 d-flex justify-content-center mt-1">
          <a data-toggle="modal" data-target="#Whale">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\whale.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>Whale watching</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$100</span> Per Person</p>
            </div> 
          </div>
          </a>
          </div>

          <div class="col-md-4 col-12 d-flex justify-content-center mt-1">
          <a data-toggle="modal" data-target="#Park">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\udawalawa.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>Udawalawe National Park Private Safari</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$80</span> Per Person</p>
            </div>
          </div>
          </a>
          </div>

        </div>

        <div class="row wow slideInUp">
        <div class="col-md-4 col-12 d-flex justify-content-center mt-3">
        <a data-toggle="modal" data-target="#Fish">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\fish.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>Deep sea big game fishing expedition – Bentota</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$100</span> Per Person</p>
            </div>
          </div>
          </a>
          </div>

          <div class="col-md-4 col-12 d-flex justify-content-center mt-3">
          <a data-toggle="modal" data-target="#Seegiriya">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\seegiriya.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>Sigiriya Rock Fortress and Dambulla Cave Temples Private Day Trip</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$200</span> Per Person</p>
            </div>
          </div>
          </a>
          </div>

          <div class="col-md-4 col-12 d-flex justify-content-center mt-3">
          <a data-toggle="modal" data-target="#Ella">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\ella.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>Two Days Trip to Ella</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$250</span> Per Person</p>
            </div>
          </div>
          </a>
          </div>

        </div>

        <div class="row">
        <div class="col-md-4 offset-md-2 col-12 d-flex justify-content-center mt-3">
        <a data-toggle="modal" data-target="#5day">
          <div class="card bg-dark text-white">
            <img class="card-img dark" src="assets\images\5day.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>5-Day Sri Lanka Classic Tour</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$300</span> Per Person</p>
            </div>
          </div>
          </a>
          </div>

        
        <div class="col-md-4 col-12 d-flex justify-content-center mt-3">
        <a data-toggle="modal" data-target="#Tuk">
          <div class="card bg-dark text-white ">
            <img class="card-img dark" src="assets\images\tuktuk.jpg" alt="Card image">
            <div class="card-img-overlay text-center p-5">
              <h5 class="card-title"><i>"THE ORIGINALS" Tuk Tuk Safari Sri lanka</i></h5>
              <p class="card-text"><span class="badge  badge-pill badge-secondary">$20</span> Per Person</p>
            </div>
          </div>
          </a>
          </div>

        </div> -->

        <div class="row wow slideInRight">
            <div class="col-12 word text-center" style="color:black;">
                <h1>Get more information by contacting with us..</h1>
            </div>
        </div>
    </div>

    <!--Galle modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="Galle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Galle Full Day Tour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                Experience the charms of Galle and Sri Lanka’s southwest coast on a day trip from Hikkaduwa,
                 with an expert driver-guide. View endangered turtles at the Kosgoda Turtle Hatchery; see the
                  stilt fishermen at Weligama; and explore UNESCO-listed Galle Fort, where 17th-century ramparts
                   enclose colonial buildings, museums, and shops. Learn about Galle’s maritime history, and visit
                    Talwatte's simple-but-moving Tsunami Photo Museum to chart the impact of the 2004 disaster.
                </p>
                <ul>
                    <li>Day trip to Galle and Sri Lanka’s southwest coast, with an informative guide</li>
                    <li>Visit the Kosgoda Turtle Hatchery to see endangered sea turtles being cared for</li>
                    <li>Take photos of Weligama’s stilt fishermen, who fish from poles lodged in the sea</li>
                    <li>Explore 17th-century Galle Fort, a fortified complex of colonial mansions, museums and arty shops</li>
                    <li>Witness the devastation of the 2004 tsunami at the Talwatte Tsunami Photo Museum</li>
                    <li>Stop for an included lunch at a local restaurant</li>
                </ul>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                        <li>Fuel surcharge</li>
                        <li>Local taxes</li>
                        <li>Bottled water</li>
                        <li>Driver/guide</li>
                        <li>Lunch</li>
                        <li>Air-conditioned vehicle</li>
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
    <!--Galle modal end-->

    <!--Whale modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="Whale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Whale watching at Mirissa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                Get a bird's-eye view of the marine wildlife off Sri Lanka on this whale-watching flight tour. 
                With a professional pilot at the helm, you'll listen to commentary on the whales you see out the plane's windows. 
                Unlike a whale watch in a boat, you can cover lots of area in a short amount 
                of time and easily find pods of whales and dolphins. This private tour ensures
                personalized attention and a flexible schedule.
              </p>
                <ul>
                    <li>Private tour for your party only</li>
                    <li>Commentary on local wildlife from your private guide</li>
                    <li>Round-trip private transportation from your hotel</li>
                    <li>Bottled water provided</li>
                </ul>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                        <li>Private tour</li>
                        <li>Bottled water</li>
                        
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>Bottled water
            </div>
        </div>
        </div> -->
    <!--Whale modal end-->

    <!--Udawalawa modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="Park" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Udawalawe National Park Private Safari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                See the wild elephants and other wildlife of Uda Walawe National Park with an experienced private guide 
                in a sturdy 4WD-vehicle. Located just south of the Central Highlands, Uda Walawe features a dramatic
                 landscape that provides prime opportunities to see herds of wild elephants, with viewing that rivals
                  the famous safaris of East Africa. Uda Walawe is also home to other animals such as water buffalo,
                   wild boar, fox, toque macaque, and jungle cats including leopards. A safari in this national park
                    is a must-do while visiting Sri Lanka.
              </p>
                <ul>
                    <li>Private safari tour of Uda Walawe National Park, in Sri Lanka</li>
                    <li>Learn about the animals from the guide’s informative commentary</li>
                    <li>Experience the beauty and wildlife of Sri Lanka’s premier national park</li>
                    <li>Look for leopards, painted storks, sambar deer and more</li>
                </ul>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                        <li>Private Safari Jeep (Maximum of 6 Passengers per jeep).</li>
                        <li>Experienced Driver (Also your tracker).</li>
                        <li>Water.</li>
                        
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
    <!--Udawalawa modal end-->

    <!--Fish modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="Fish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Deep sea big game fishing expedition – Bentota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                The Indian Ocean off the coast of Bentota – Sri Lanka, offers some of the richest sources
                 of deep sea fish in the world. Our deep sea fishing tours takes you to the heart of the warm,
                  nutrient rich waters, which contain a wide range of game fish. The tour is suited to experienced
                   anglers as well as first-timers, and makes for an unforgettable adventure. This is a wonderful, 
                   3 to 4 hour deep sea and fishing tour. As you go deeper towards the shelf, Sail fish, Blue or Black Marlene,
                    Tuna, Wahoo and a few more rare species could be hooked. You will be let by an experienced and knowledgeable
                     fishing guide.
                </p>
                <p>
                
                    <b>What's included</b><br/>
                    <ul>
                        <li>sport fishing equipment</li>
                        <li>All Fees and Taxes</li>
                        <li>Bottled water</li>
                        <li>Snacks</li>
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
    <!--Fish modal end-->

    <!--Seegiriya modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="Seegiriya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sigiriya Rock Fortress and Dambulla Cave Temples Private Day Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                Visit two UNESCO World Heritage sites, the Sigiriya Rock Fortress and Golden Temple of Dambulla, 
                on this private day trip with a personal guide — a must-do activity when visiting Sri Lanka.
                 You’re chauffeured in the comfort of your own vehicle for the approximate 6-hour drive from Hikkaduwa.
                  Climb the 5th-century fortress on a sightseeing tour of the 8th Wonder of the World.
                   After lunch, tour the impressive cave temple and marvel at its Buddha statues.
                </p>
                <ul>
                    <li>Visit the UNESCO-listed Sigiriya Rock Fortress and Golden Temple of Dambulla</li>
                    <li>Hear personalized commentary from a knowledgeable guide</li>
                    <li>Includes a restaurant lunch</li>
                </ul>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                        <li>Air-conditioned vehicle</li>
                        <li>Sightseeing tours with service of an English Speaking chauffeur guide</li>
                        <li>Lunch at a local restaurant</li>
                        <li>All Government taxese</li>
                        <li>Bottled water</li>
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
    <!--Seegiriya modal end-->

    <!--Ella modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="Ella" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Galle Full Day Tour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                Ella in Sri Lanka is a small laid back town surrounded by the beautiful greens of tea.
                 There are a lot of things to do in Ella. Ella has a comfortable climate where the nights
                  are cool and the daytime around 28 degrees. In this two days tour visit Little Adam’s peak, 
                  the nephew of Adam’s Peak and Hike up to the top of Ella Rock, From the top enjoy the view over the valley,
                   relax and connect with other travelers, Walk along the rails on the Nine Arches Bridge, visit Demodara loop,
                    the spiral railway is recognised as one of the most fascinating civil engineering marvels in Sri Lanka and many more..
                </p>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                        <li>Breakfast</li>
                        <li>Dinner</li>
                        <li>Private transportation</li>
                        <li>Air-conditioned vehicle</li>
                        <li>Entrance fees</li>
                        <li>Fuel surcharge</li>
                        <li>Parking Fees</li>
                        <li>Lunch (2)</li>
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
    <!--Ella modal end-->

    <!--5day modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="5day" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">5-Day Sri Lanka Classic Tour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                This private 4-night tour covers key attractions in the Sri Lankan cities of Kandy,
                 Nuwara Eliya and Colombo, led by your own personal guide. Enjoy a flexible itinerary,
                  starting with the New Ranweli Spice Garden, a batik factory and Kandyan cultural show.
                   You’ll proceed to Sri Dalada Maligawa (Temple of the Tooth) and Yala National Park,
                    where you’re taken on a 4x4 wildlife safari. Daily breakfast are included with hotel accommodation.
                </p>
                <ul>
                    <li>4-night private tour of Sri Lanka’s top cities and attractions</li>
                    <li>Stay overnight in Kandy, Nuwara Eliya, Tissa and Colombo with daily breakfast</li>
                    <li>Tour New Ranweli Spice Garden, Sri Dalada Maligawa and the Royal Botanic Gardens</li>
                    <li>Go on a 4x4 safari at Yala National Park</li>
                    <li>Private guide offers personalized attention with flexibility to customize your itinerary</li>
                    <li>Round-trip transfers from Bandaranaike International Airport</li>
                </ul>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                        <li>4 nights accommodation as per itinerary or similar category hotels</li>
                        <li>Fuel surcharge</li>
                        <li>Bottled water 1x500ml per person per day</li>
                        <li>English-speaking chauffeur-guide</li>
                        <li>Transport by private vehicle</li>
                        <li>Breakfast (4)</li>
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
    <!--5day modal end-->

    <!--Tuk modal start-->
        <!-- Modal -->
        <!-- <div class="modal fade" id="Tuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">"THE ORIGINALS" Tuk Tuk Safari Sri lanka, the first and the best on the Island !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">

                <p>
                <b>Overview</b><br/>
                We go to places that near all other tour operator will not ! We look to visit the 
                heart of the country going to the real rustic and local sri lankan hot spots!
                </p>
                <p>
                    <b>What's included</b><br/>
                    <ul>
                        <li>Lunch</li>
                        <li>All Fees and Taxes</li>
                        <li>Snacks</li>
                        <li>Bottled water</li>

                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
    <!--Tuk modal end-->

    <!--tours end-->
    <!-- footer start-->
    <footer class="footer mt-5  pt-5">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'index.php';}}else{echo 'index.php';}?>" class="item">Home</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'aboutus.php';}}else{echo 'aboutus.php';}?>" class="item">About us</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'rooms.php';}}else{echo 'rooms.php';}?>" class="item">Rooms</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'gallery.php';}}else{echo 'gallery.php';}?>" class="item">Gallery</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'airportpickup.php';}}else{echo 'airportpickup.php';}?>" class="item">Airport pick up</a></li>
                        <li><a href="#" class="item">Excursions</a></li>
                        <li><a href="<?php if(isset($_SESSION['user_type'])){if($_SESSION['user_type']=='admin'|| $_SESSION['user_type']=='receptionist'){echo '#';}else{echo 'contactus.php';}}else{echo 'contactus.php';}?>" class="item">Contacy us</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
		              121, Galle Road<br>
		              Hikkaduwa<br>
		              Sri Lanka<br>
		              <i class="fa fa-phone fa-lg fa-fw"></i> : +94 1234 5678<br>
		              <i class="fa fa-fax fa-lg fa-fw"></i> : +94 8765 4321<br>
		              <i class="fa fa-envelope fa-lg fa-fws"></i> : <a href="mailto:marblesandsl@gmail.com" class="item">marblesandsl@gmail.com</a>
		           </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-google" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a>
                    </div>
                    
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright 2019 Hotel Marble Sand</p>
                </div>
           </div>
        </div>
    </footer>
    <!-- footer end-->


 <!-- Script link-->
 <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script> 
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
    <script>
      var wow = new WOW(
          {
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            callback:     function(box) {
              // the callback is fired every time an animation is started
              // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null,    // optional scroll container selector, otherwise use window,
            resetAnimation: true,     // reset animation on end (default is true)
          }
        );
        wow.init();
    </script> 

<?php
      echo '<script>';
      

         if(isset($_SESSION['del'])){
            if($_SESSION['del']==1){ 
            echo 'swal({
              title: "Deleted!",
              text: "Excursion deletion is success!",
              icon: "success",
              button: "Ok",
            });';
            
            //session_destroy();
            unset($_SESSION['del']);}
            else{
                echo 'swal({
                    title: "Oops!",
                    text: "Excursion is not delete!",
                    icon: "error",
                    button: "Ok",
                  });';
                  
                  //session_destroy();
                  unset($_SESSION['del']);}
            }
           
         
     echo '</script>';
    ?>
 
    
</body>
</html>