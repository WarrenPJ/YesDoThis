<?php
  $con =mysqli_connect($servername, $username, $password, $dbname);
if ($connection->connect_error) {
die("Connection failed: " . $con->connect_error);
}


 
   /* select all the weekly tasks from the table googlechart */
  $result = $con->query('SELECT * FROM statistics_payments ORDER BY date ASC
       ');
 

  $rows = array();
  $table = array();
  $table['cols'] = array(
 
    // Labels for your chart, these represent the column titles.
    /* 
        note that one column is in "string" format and another one is in "number" format 
        as pie chart only required "numbers" for calculating percentage 
        and string will be used for Slice title
    */
    array('label' => 'date', 'type' => 'string'),
    array('label' => 'income', 'type' => 'number')
 
);
    /* Extract the information from $result */
    foreach($result as $r) {
 
      $temp = array();
 
      // The following line will be used to slice the Pie chart
   
     $temp[] = array('v' => (string) $r['date']); 
 
      // Values of the each slice
 
      $temp[] = array('v' => (int) $r['amount']); 
      $rows[] = array('c' => $temp);
    }
 
$table['rows'] = $rows;
 
// convert data into JSON format
$jsonTable = json_encode($table);
//echo $jsonTable;
 
 
?>
 
 
 
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
 
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
 
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
 
    function drawChart() {
 
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           //title: 'Charts title',
           hAxis: {title: '', titleTextStyle: {color: 'blue'}},
          is3D: 'true',
          width: 850,
          height: 400,
		  chartArea: {'width': '90%', 'height': '75%'},
          legend: {'position': 'bottom'}
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
	  
	  //To use another chart, change LineChart in example PieChart
      var chart = new google.visualization.LineChart(document.getElementById('chart_line'));
      chart.draw(data, options);
    }
    </script>
  
 
 
    <!--this is the div that will hold the pie chart-->
    <div id="chart_line"></div>