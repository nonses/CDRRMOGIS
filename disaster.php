<?php
  include('library/form/connection.php');
    include('library/function/functions.php');
  $db = new db();
  session_start();

$disaster_types = array();
$sql = 'SELECT * FROM disaster_type';
$result = $db->connection->query($sql);
while ($row = $result->fetch_assoc()){
    $disaster_types[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Disasters | Disaster Risk Management</title>
  <link rel="icon" href="img/favicon.ico">

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/app.css" rel="stylesheet">
    <style>
        .morris-hover{position:absolute;z-index:1000}.morris-hover.morris-default-style{border-radius:10px;padding:6px;color:#666;background:rgba(255,255,255,0.8);border:solid 2px rgba(230,230,230,0.8);font-family:sans-serif;font-size:12px;text-align:center}.morris-hover.morris-default-style .morris-hover-row-label{font-weight:bold;margin:0.25em 0}
        .morris-hover.morris-default-style .morris-hover-point{white-space:nowrap;margin:0.1em 0}
    </style>
</head>
<body role="document">

<!--LOGIN MODAL HERE-->
<?php include('library/html/loginmodal.php'); ?>
<!--NAVBAR HERE-->
<?php include('library/html/navbar.php'); ?>
  <div class="container"> <!--Content starts here-->
    <div class="page-header">
      <h2>Disasters</h2>
    </div>

      <div class="panel panel-default">
          <div class="panel-heading">
              <p class="panel-title">Statictics</p>
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="container-fluid">
                      <h4>Occurrence of Disasters in Iloilo City</h4>
                      <div class="container-fluid">
                          <div id="disaster-bar">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="panel-title">More Info</p>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php
                    foreach ($disaster_types as $type){
                        ?>
                            <div class="col-lg-6">
                                <a href="disasterview.php?id=<?php echo $type['ID']; ?>" class="thumbnail">
                                    <div class="container-fluid">
                                        <h4><span class="glyphicon glyphicon-stop" style="color: <?php echo hex2rgba($type['COLOR'], .5); ?>;"></span> <?php echo $type['NAME']; ?></h4>
                                    </div>
                                </a>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
  </div>

<!--FOOTER HERE-->
<?php include('library/html/footer.php'); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/1.11.3_jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/app/mylibrary.js"></script>
<script src="js/app/messagealert.js"></script>
<script src="js/app/loginscript.js"></script>
<script>
  var dir = document.URL.substr(0,document.URL.lastIndexOf('/'));
  $(document).ready(function() {
      //Morris charts snippet - js
      $.getScript(dir + '/js/app/raphael-min.js',function(){
          $.getScript(dir + '/js/app/morris.min.js',function(){
              Morris.Bar({
                  element: 'disaster-bar',
                  data: [
                      <?php
                      $chart_data = '';
                      foreach ($disaster_types as $type){
                          $sql = 'SELECT ID FROM disaster_declare WHERE DISASTER = ' . $type['ID'] . ' AND ISVERIFIED = 1';
                          $result = $db->connection->query($sql);
                          $count = mysqli_num_rows($result);
                          $chart_data .= "{label: \"" . $type['NAME'] . "\", value: " . $count . "},\n";
                      }
                      $chart_data = substr($chart_data, 0, strlen($chart_data) - 2);
                      echo $chart_data;
                      ?>
                  ],
                  xkey: 'label',
                  ykeys: ['value'],
                  labels: ['Occurred'],
                  barColors: function (row, series, type) {
                      <?php
                          $color_param = '';
                          foreach ($disaster_types as $type){
                              $color_param .= "[\"" . $type['COLOR'] . "\"],";
                              ?>
                                   if(row.label == "<?php echo $type['NAME']; ?>") return "<?php echo $type['COLOR']; ?>";
                              <?php
                          }
                      ?>
                  }
              });
          });
      });
  });

</script>

</body>
</html>