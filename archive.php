<?php

    session_start();
    include('library/form/connection.php');
    include('library/function/functions.php');
    $db = new db();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="th3515">
    <meta name="author" content="">

    <title>Disaster History | Disaster Risk Management</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
    integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
   crossorigin=""/>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

   <?php 

include('library/html/navbar.php'); 
include('library/html/loginmodal.php');
   
?>

<!--Site Content-->
<div class="container"> <!--Content starts here-->
<div class = "row">
    <div class="page-header">
        <div style="margin: auto; text-align: center;" class="pull-right">
            <div class="btn-group" role="group" aria-label="...">
                <a href="#" class="btn btn-secondary active">Overall</a>
                <a href="#" class="btn btn-secondary">Per District</a>
                <a href="#" class="btn btn-secondary">Per Barangay</a>
            </div>
        </div>
        <h3>Disaster Archive<small> of the City of Iloilo</small></h3>
    </div>
    <div class="col-lg-8">
            <div id="mapid" style="height: 70vh; width: 100%;" tabindex="0"> </div>
        </div>
    

        <div class="col-lg-4">
        
            <div class="panel panel-default">
                <div class="panel-heading">
            
                <p class= "panel-title">Disaster Overview 
                    <span class = "pull-right">

                        <a href = "#" style= "text-decoration: none; color: #777; font-size: 14px;"> Overall </a>
                            |
                            <?php
                                $sql = 'SELECT * FROM disaster_type';
                                $result = $db->connection->query($sql);
                                while ($row = $result->fetch_assoc()){
                                    ?>
                                    <a href = "#" class="glyphicon glyphicon-stop" title = " <?php echo $row['NAME']; ?>" style="color: <?php echo $row['COLOR']; ?>; text-decoration: none;"></a>
                                    <?php
                                }
                                ?>
                    </span>
                 </p>

            </div>
             <div class="panel-body">
                <ul class="list-group" id = "disasterListHTML">
                
                </ul>                    
            </div>
            </div>
            </div>
    
    </div>
    
    <br>

    <div class = "row">
        <div class="panel panel-default">
            <div class="panel-heading">
            <span class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Overall
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" id = "declare_listHTML">
                          <li><a href="#">Overall</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">Verified Disaster Report</li>
                        </ul>
            </span>
                <h4 id = 'disasterTitleHTML'> Graph Details</h4>
            </div>

            <div class="panel-body">
            

                <div class = "col-lg-3 col-md-3 col-sm-6 col-xs-6">
                   <canvas id="cassualtiesChart" width="10" height="10"></canvas>
                   <center><h5><b> Cassualties </b></h5></center>                  
                </div>
                <div class = "col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <canvas id="damagedHouses" width="10" height="10"></canvas>                  
                    <center><h5><b> Damaged Houses </b></h5></center>
                </div>
                <div class = "col-lg-3 col-md-3 col-sm-6 col-xs-6">  
                    <canvas id="evacuees" width="10" height="10"></canvas>                  
                    <center><h5><b> Evacuees </b></h5></center>
                </div>                 
                <div class = "col-lg-3 col-md-3 col-sm-6 col-xs-6">    
                    <canvas id="costOfAssistance" width="10" height="10"></canvas>             
                    <center><h5><b> Cost of Assistance </b></h5></center>
                </div>

                <span class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <br><br>
                            <h4> Evacuation Center used: </h4>
                           
                           <div class="list-group">
                                <div class="list-group" id="evacuation_list">
                                    
                                </div>
                            </div>
                </span>

                <span class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4> Images taken: </h4>
                          <div class="list-group">
                                <div class="list-group" id="">
                                    <a href="#" class="list-group-item">
                                    
                                    <!-- conflict @ mobile. 

                                    3 images with both side toggle that slides from left to right width credits to user @ middle-->                         
                                    
                                    <img src = "img/slide1.jpg" title = "ur pussy after i do u" style = "width: 355px; height: 280px;">
                                    <img src = "img/slide2.jpg" title = "west side represent" style = "width: 355px; height: 280px;">
                                    <img src = "img/slide3.jpg" title = "us vs u" style = "width: 355px; height: 280px;">
                                    
                                </a>
                                </div>
                            </div>                        
                </span>
           
            </div>
            
        </div>
    </div>
    </div>

<?php include('library/html/footer.php'); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/app/mylibrary.js"></script>
    <script src="js/app/loginscript.js"></script>


    <script src="js/chart.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
   integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
   crossorigin=""></script>
    
</body>

</html>
<!-- MAP SCRIPTS -->

<script>
    
    var mymap = L.map('mapid').setView([51.505, -0.09], 13);



L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v10/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2Rycm1vIiwiYSI6ImNqMzBhZXQxNDAwYWszMnFuejIyNG80cDkifQ.HQTrzbN7u43NV496Hujsnw', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.mapbox-streets-v7',
    accessToken: 'pk.eyJ1IjoiY2Rycm1vIiwiYSI6ImNqMzBhZXQxNDAwYWszMnFuejIyNG80cDkifQ.HQTrzbN7u43NV496Hujsnw'
}).addTo(mymap);

</script>


<!-- Disaster Details Scripts -->

<script>
                <?php                   
                    // DISASTER PROIFLE DISPLAY

                    $sql ='SELECT * FROM disaster_profile';

                    $result = $db->connection->query($sql);
                    $count = mysqli_num_rows($result);
                   
                    while($row = $result->fetch_assoc()){
                       
                        ?>
                        document.getElementById('disasterListHTML').innerHTML +=''+'<a href = "#"  class = "list-group-item">' + '<?php echo $row['NAME']; ?>' +'</a>';
                <?php
                   }
                    
                    // DISASTER VERIFIED DISPLAY 

                    $sql ='SELECT * FROM disaster_declare WHERE ISVERIFIED = 1';

                    $result = $db->connection->query($sql);
                    $count = mysqli_num_rows($result);
                   
                    while($row = $result->fetch_assoc()){
                       
                        ?>
                        document.getElementById('declare_listHTML').innerHTML +=''+'<li><a href="#">' + '<?php echo $row['NICKNAME']; ?>' +'</a></li>';
                <?php
            }   

                    // EVACUATION LIST
                    $sql ='SELECT * FROM evacuation_list';

                    $result = $db->connection->query($sql);
                    $count = mysqli_num_rows($result);
                   
                    while($row = $result->fetch_assoc()){
                       
                        ?>
                        document.getElementById('evacuation_list').innerHTML +=''+

                        '<a href="#" class="list-group-item"><h4 class="list-group-item-heading">' + '<?php echo $row['EVACNAME']; ?>' +'</h4><div class="list-group-item-text">' + '<?php echo $row['EVACADDRESS1']; ?>' +'</div><small>Capacity: ' + '<?php echo $row['CAPACITY']; ?>' +'<span class = "pull-right"><small> Duration: 3/28/17 -  4/20/17 </small></span></small></a>'
                <?php
                }
             ?>  

           
$('.list-group-item').on('click', function() {
    var $this = $(this);
    var $alias = $this.data('');

    $('.active').removeClass('active');
    $this.toggleClass('active')

    // Pass clicked link element to another function
    myfunction($this, $alias)
})

function myfunction($this) {
    console.log($this.text());  // Will log Paris | France | etc...

    console.log($alias);  // Will output whatever is in data-alias=""
}





<!-- CHART SCRIPTS -->

<script>
var ctx = document.getElementById("cassualtiesChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Dead", "Injured", "Missing"],
        datasets: [{
            label: '# of Cassualties',
            data: [

                           <?php                   
                    // DISASTER CASSUALTIES

                    $sql ='SELECT CSLTDEAD, CSLTINJURED, CSLTMISSING FROM disaster_reports';

                    $result = $db->connection->query($sql);
                    $count = mysqli_num_rows($result);
                    $CSLTDEADTOTAL = 0;
                    $CSLTINJUREDTOTAL = 0;
                    $CSLTMISSINGTOTAL = 0;

                    while($row = $result->fetch_assoc())
                    {
                        $CSLTDEADTOTAL += $row['CSLTDEAD'];
                        $CSLTINJUREDTOTAL += $row['CSLTINJURED'];
                        $CSLTMISSINGTOTAL += $row['CSLTMISSING'];
                    }
                    ?>

                        '<?php echo($CSLTDEADTOTAL); ?>','<?php echo($CSLTINJUREDTOTAL); ?>','<?php echo($CSLTMISSINGTOTAL); ?>'],
            backgroundColor: [
            'rgba(237,153,91,0.8)',
            'rgba(245,79,85,0.8)',
            'rgba(203,80,80,0.8)'
           ],
            borderColor: [
            'rgba(237,153,91,1)',
            'rgba(245,79,85,1)',
            'rgba(203,80,80,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
                animation:{
                    animateScale:true
                }
            }
});

var ctx = document.getElementById("damagedHouses");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Totally Damaged", "Partially Damaged"],
        datasets: [{
            label: '# of Damaged Houses',
            data: [

                <?php                   
                    // DAMAGED HOUSES

                    $sql ='SELECT DMGTOTALLY, DMGPARTIALLY FROM disaster_reports';

                    $result = $db->connection->query($sql);
                    $count = mysqli_num_rows($result);
                    $DMGTOTALLYTOTAL = 0;
                    $DMGPARTIALLYTOTAL = 0;
                    
                    while($row = $result->fetch_assoc())
                    {
                        $DMGTOTALLYTOTAL += $row['DMGTOTALLY'];
                        $DMGPARTIALLYTOTAL += $row['DMGPARTIALLY'];
                    }
                    ?>

                        '<?php echo($DMGTOTALLYTOTAL); ?>','<?php echo($DMGPARTIALLYTOTAL); ?>'

            ],
            backgroundColor: [
                'rgba(203,80,80,0.8)',
                'rgba(232,226,214,0.8)'
            ],
            borderColor: [
                'rgba(203,80,80,1)',
                'rgba(232,226,214,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
                animation:{
                    animateScale:true
                }
            }
});


var ctx = document.getElementById("evacuees");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Evacuees", "Remaining Population"],
        datasets: [{
            label: '# of Votes',
            data: [700, 5000],
            backgroundColor: [
                'rgba(143,136,86,0.8)',
                'rgba(237,153,91,0.8)'
            
            ],
            borderColor: [
              'rgba(143,136,86,1)',
              'rgba(237,153,91,1)'
            
            ],
            borderWidth: 1
        }]
    },
    options: {
                animation:{
                    animateScale:true
                }
            }
});


var ctx = document.getElementById("costOfAssistance");
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        datasets: [{
        data: [
                <?php                   
                    // DAMAGED HOUSES

                    $sql ='SELECT DSWD, LGU, NGO FROM disaster_cost';

                    $result = $db->connection->query($sql);
                    $count = mysqli_num_rows($result);
                    $DSWDTOTAL = 0;
                    $LGUTOTAL = 0;
                    $NGOTOTAL = 0;
                    
                    while($row = $result->fetch_assoc())
                    {
                        $DSWDTOTAL += $row['DSWD'];
                        $LGUTOTAL += $row['LGU'];
                        $NGOTOTAL += $row['NGO'];
                    }
                    ?>

                        '<?php echo($DSWDTOTAL); ?>','<?php echo($LGUTOTAL); ?>','<?php echo($NGOTOTAL)?>'

        ],
        
        backgroundColor: [

            'rgba(237,153,91,0.8)',
            'rgba(245,79,85,0.8)',
            'rgba(203,80,80,0.8)'
            ],
        
        borderColor: [
          
            'rgba(237,153,91,1)',
            'rgba(245,79,85,1)',
            'rgba(203,80,80,1)'
            ],
            borderWidth: 1
    }],

    labels: [
        'DSWD',
        'LGU',
        'NGO',
    ]

    },
    options: {
                animation:{
                    animateScale:true
                }
            }
});
</script>

