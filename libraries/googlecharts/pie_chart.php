<?php
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $con->connect_error);
}
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>


    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	['Browser', 'Visits'],
             <?php 
	        	$query = "SELECT count(ip) AS count, browser FROM users_analytics GROUP BY browser";

	        	$exec = mysqli_query($con,$query);
	        	while($row = mysqli_fetch_array($exec)){

	        		echo "['".$row['browser']."',".$row['count']."],";
	        	}
	   ?>
        ]);

        var options = {
          title: '',
		            is3D: 'true',
          width: 400,
          height: 400,
		  chartArea: {'width': '90%', 'height': '75%'},
          legend: {'position': 'bottom'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
      

   
  </head>
  <body>
  
   <div id="piechart" style="max-width: 500px; height: 500px;"></div>
     

  </body>
</html>