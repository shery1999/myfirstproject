
<!-- testing bar chart -->
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<?php
include 'db_count.php';
?>
  <canvas id="myChart" style="width:80%;max-width:80%"></canvas>

  <script>
    var xValues = ['Users', 'Blogs', 'Categories'];
    var yValues = [<?php echo $ucount; ?> ,<?php echo $bcount; ?>,<?php echo $ccount; ?> , 0];
    var barColors = ["blue", "yellow", "green", "orange", "brown"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: "BAR CHART"
        }
      }
    });
  </script>