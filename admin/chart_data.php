<?php
include 'connection.php';
include 'db_count.php';

if ($result->num_rows > 0) {
  //Converting the results into an associative array
  while ($row = $result->fetch_assoc()) {
    $jsonArrayItem = array();
    $jsonArrayItem['label'] = $bcount;
    $jsonArrayItem['value'] = $ccount;
    //append the above created object into the main array.
    array_push($jsonArray, $jsonArrayItem);
  }
}

header('Content-type: application/json');
//output the return value of json encode using the echo function. 
echo json_encode($jsonArray);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Fusion Charts Column 2D Sample</title>
</head>

<body>
  <div id="chart-container">FusionCharts will render here</div>
  <script src="js/jquery-2.1.4.js"></script>
  <script src="js/fusioncharts.js"></script>
  <script src="js/fusioncharts.charts.js"></script>
  <script src="js/themes/fusioncharts.theme.zune.js"></script>
  <script src="js/app.js"></script>
</body>

</html>