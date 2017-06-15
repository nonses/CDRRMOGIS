
<!-- 

MAPBOX: cdrrmo | cdrrmo2017
**************************************************************************************************************

change everything


OVERVIEW 

>map of iloilo with info of barangays



FOOTER

>about us 
>documentation
>credits


NO NAME

> displays disaster in map


HEATMAP

> displays map datas


> FORECAST

> applied algo to solve tsunami
> estimation of affected disaster


disaster display on map
more on mapping ngd ni
warning forecast


>>>>>>

add logo on navbar
sliding option fade fix at center
change background to open street map of iloilo
change theme
password won't reset
login modal upon close doesn't clear the textbox
buggy dashboard


dashboard form margin i dunno how to remove



AGENDA BEFORE PASS:

FUNCTIONING OVERVIEW
DISASTER DATA ADD
DISASTER DATA DISPLAY
MAP
CASSUALTIES
INSERT BARANGAY DATA
CHOROLOPETH MAP ( DUNNO THE SPELLING) FUNCTIONING

blue upon hover @ footer

 -->




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
    <meta name="description" content="CPU CCS Thesis">
    <meta name="author" content="">

    <title>City Disaster Risk Management</title>    
    <link rel="icon" href="img/favicon.ico">
   
    <link href="css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="css/app.css">

</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navbar Modal -->
  <?php 
  include('library/html/navbar.php'); ?>

<!--  Login Modal -->
  <?php include('library/html/loginmodal.php'); ?>


  <!-- Intro Background Section -->
<div class="jumbotron-container">
  <div class="jumbotron">
    <div class="jumbotext" id = "jumbotextid">
      <p class="jumbotext-main">Iloilo City Disaster Risk Reduction Management Office</p>
      <p class="jumbotext-sub">A Web-based Geographic Information System for the City Disaster Risk Reduction Management Office of Iloilo City </h2>
    </div>
  </div>
</div>


<section id = "intro1">
    <div class = "container-fluid">
      <div class = "row no-pad">
          <h1> Hello World <br> <h4>I am not a good coder</h4></h1>

      </div>
    </div>
</section>



<!-- Footer Section -->

<?php include("library/html/footer.php") ?>

<!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.easing.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/1.11.3_jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/app/mylibrary.js"></script>
    <script src="js/app/messagealert.js"></script>
    <script src="js/app/loginscript.js"></script>

</body>

</html>

