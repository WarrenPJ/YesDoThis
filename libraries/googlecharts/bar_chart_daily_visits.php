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
    	google.load('visualization', '1', {packages: ['corechart', 'bar']});
	google.setOnLoadCallback(drawMaterial);

	function drawMaterial() {
	      var data = google.visualization.arrayToDataTable([
	        ['Country', 'New Visitors', 'Multiple IPs'],
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
  
   <div id="barchart" style="max-width: 1400px; height: 500px;"></div>
     

  </body>
</html>