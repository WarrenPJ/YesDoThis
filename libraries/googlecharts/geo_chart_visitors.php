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

          ['Date', 'Visits'],
            <?php 
	        	$query = "SELECT count(ip) AS count, vdate FROM users_analytics GROUP BY vdate ORDER BY vdate";

	        	$exec = mysqli_query($con,$query);
	        	while($row = mysqli_fetch_array($exec)){

	        		echo "['".$row['vdate']."',".$row['count']."],";
	        	}
	   ?>
         
        ]);

        var options = {
        	title: 'Date wise visits'
        };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
      chart.draw(data, options);
  }
  </script>

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
          title: 'Browser wise visits'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([

          ['Country', 'Visits'],
           <?php 
	        	$query = "SELECT count(ip) AS count, country FROM users_analytics GROUP BY country";

	        	$exec = mysqli_query($con,$query);
	        	while($row = mysqli_fetch_array($exec)){

	        		echo "['".$row['country']."',".$row['count']."],";
	        	}
	   ?>
        ]);

        var options = {
        	
        };

        var chart = new google.visualization.GeoChart(document.getElementById('geochart'));

        chart.draw(data, options);
      }
    </script>
  
    <script type="text/javascript">
    	google.load('visualization', '1', {packages: ['corechart', 'bar']});
	google.setOnLoadCallback(drawMaterial);

	function drawMaterial() {
	      var data = google.visualization.arrayToDataTable([
	        ['Country', 'New Visitors', 'Returned Visitors'],
	      <?php 
	        	$query = "SELECT count(ip) AS count, country FROM users_analytics GROUP BY country";

	        	$exec = mysqli_query($con,$query);

	        	while($row = mysqli_fetch_array($exec)){

	        		echo "['".$row['country']."',";
	        		$query2 = "SELECT count(distinct ip) AS count FROM users_analytics WHERE country='".$row['country']."' ";
	        		$exec2 = mysqli_query($con,$query2);
	        		$row2 = mysqli_fetch_assoc($exec2);
	        			
	        		echo $row2['count'];
	        		
	        		

	        		$rvisits = $row['count']-$row2['count'];

	        		echo ",".$rvisits."],";
	        	}
	   ?>
	      ]);

	      var options = {
	        
	          title: 'Country wise new and returned visitors',
	        
	        bars: 'horizontal'
	      };
	      var material = new google.charts.Bar(document.getElementById('barchart'));
	      material.draw(data, options);
	    }
    </script>

   
  </head>
  <body>
  

   <div id="geochart" style="max-width: 1400px; height: 500px;"></div>
  
   

  </body>
</html>