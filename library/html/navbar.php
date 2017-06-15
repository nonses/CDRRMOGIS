
<?php
  $user = false;
  $username = '';
  if(isset($_SESSION['USER_USERNAME']) and isset($_SESSION['USER_TYPE']))
  {
    $user = true;
    $username = $_SESSION['USER_USERNAME'];

    $session_USER_FIRSTNAME = htmlspecialchars($_SESSION['USER_FIRSTNAME']);
    $session_USER_MIDDLENAME = htmlspecialchars($_SESSION['USER_MIDDLENAME']);
    $session_USER_LASTNAME = htmlspecialchars($_SESSION['USER_LASTNAME']);

    
    switch($_SESSION["USER_TYPE"])
    {
      case 'A':
        include('library/form/adminOnly.php');
        include('library/html/adminmodal.php');  
        break;
      case 'B':

        include('library/form/cdrrmoOnly.php');
        include('library/html/cdrrmomodal.php');
        break;
       default:
       $user = false; 

    }
  }

    // I HAVE NO TRUST IN THIS

    $currentpage = strtolower($_SERVER['REQUEST_URI']);

    $pagepass = "/cdrrmomap/index.php";
    $pagepass2 =  "/cdrrmomap/";


    if($pagepass == $currentpage || $pagepass2 == $currentpage)
    {

?>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id = "navbarmain">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                     </button>
                        <img link = "#" class = "navbar-left hidden-xs page-scroll" src="img/cdrrmoseal.png" style = "width: 50px; height: 50px;">
                        <a href="#" class="navbar-brand page-scroll hidden-sm"> &nbsp; Iloilo City Disaster Risk Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                         
                             <a class="page-scroll" href="#"></a>
                      </li>
                   
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                
                    <li>
                        <a href="overview.php"><span class="glyphicon glyphicon-book"></span> &nbsp;Overview</a>
                    </li>
                    <li>
                         <a href = "archive.php"><span class="glyphicon glyphicon-hdd"></span> &nbsp;Disaster Archive</a>
                    </li>

                    <li>
                         <a href="disaster.php"><span class="glyphicon glyphicon-blackboard"></span> &nbsp;Forecast</a>
                    </li> 
                    <li>
                         <a href = "#"><span class="glyphicon glyphicon-map-marker"></span> &nbsp;Heatmap</a>
                    </li>

                    <li>
                <?php if($user)
                { 
                ?>
                <li> 
                  <button type ="button" style = "padding-top: 15px; text-decoration: none;" name = "dashboard" id = "dashboard" class = "btn btn-link" data-toggle = "modal" data-target = "#dashboardmodal"> <span class="glyphicon glyphicon-user"></span> &nbsp;Dashboard</button>
                </li>
        
                <?php  
                }  
                else  
                {  
                ?>  
                <li>
                  <button type ="button"  style = "padding-top: 15px; text-decoration: none;" name = "login" id = "login" class = "btn btn-link" data-toggle = "modal" data-target = "#myModal">
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp;Login</button>
                </li>
                <?php  
                }  
                ?>  
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php
}
else
{
?>


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id = "navbarmain">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                     </button>
                        <img class = "navbar-left hidden-xs page-scroll" src="img/cdrrmoseal.png" style = "width: 50px; height: 50px;">
                        <a href="index.php" class="navbar-brand page-scroll hidden-sm"> &nbsp; Iloilo City Disaster Risk Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                         
                             <a class="page-scroll" href="#"></a>
                      </li>
                   
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                
                    <li>
                        <a href="overview.php"><span class="glyphicon glyphicon-book"></span> &nbsp;Overview</a>
                    </li>
                    <li>
                         <a href = "archive.php"><span class="glyphicon glyphicon-hdd"></span> &nbsp;Disaster Archive</a>
                    </li>

                    <li>
                         <a href="disaster.php"><span class="glyphicon glyphicon-blackboard"></span> &nbsp;Forecast</a>
                    </li> 
                    <li>
                         <a href = "#"><span class="glyphicon glyphicon-map-marker"></span> &nbsp;Heatmap</a>
                    </li>

                    <li>
                <?php if($user)
                { 
                ?>
                <li> 
                  <button type ="button" style = "padding-top: 15px; text-decoration: none;" name = "dashboard" id = "dashboard" class = "btn btn-link" data-toggle = "modal" data-target = "#dashboardmodal"> <span class="glyphicon glyphicon-user"></span> &nbsp;Dashboard</button>
                </li>
        
                <?php  
                }  
                else  
                {  
                ?>  
                <li>
                  <button type ="button"  style = "padding-top: 15px; text-decoration: none;" name = "login" id = "login" class = "btn btn-link" data-toggle = "modal" data-target = "#myModal">
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp;Login</button>
                </li>
                <?php  
                }  
                ?>  
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br><br><br>

<?php
}
?>

