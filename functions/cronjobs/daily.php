<?php
error_reporting(E_ERROR | E_PARSE);	
include '../../config/db.php';

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}

//Check if the secrect pass is used - example yoururl.com/functions/cronjobs/daily.php?secretpass=hmAPcrkqjDhMkJw
if ( !isset($_GET['secretpass'])
  || $_GET['secretpass'] != $private_secretkey )
{
    //Try to be fancy ("HTTP" response is for mod_php, "Status:" is for FastCGI)
    header("HTTP/1.1 404 Not Found");
    header( "Status: 404 File Not Found" );
    exit(0);

    //Or, if you'd rather, you can just:
    die( "Unauthorized access." );
}

// If secret pass is correct run the jobs below

//Calculate total days left
$sql_video_genre = "SELECT * FROM product";
$result_video_genre = mysqli_query($link, $sql_video_genre); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_video_genre) > 0)  
{  
while($row = mysqli_fetch_array($result_video_genre))  
{ 
	
	
$active = "no";
$complete_status = "complete";
$todaydate = date("Y-m-d");

$start_status = "started";
// Activate product when start date is equal to today
$query_start = "UPDATE `product` SET `complete_status` = '".$start_status."' WHERE `start_date` = '".$todaydate."'";

// Execute the query
$result_start = $link->query($query_start);

// Deactivate and close products with end date equal to today
$query = "UPDATE `product` SET `active` = '".$active."', `complete_status` = '".$complete_status."' WHERE `end_date` = '".$todaydate."'";

// Execute the query
$result = $link->query($query);




// Calculate payout fee
$sql_get_funding = "SELECT * FROM product_funding WHERE `payout_status` = 'progress' AND `paid` = ''";
$results_get_funding = $link->query($sql_get_funding);

// Loop through and echo all the records

while ($row_get_funding = $results_get_funding->fetch_assoc())
	{

$sql_get_product_id = "SELECT * FROM product WHERE `complete_status` = 'complete' AND `id` = '".$row_get_funding["product_id"]."'";
$results_get_product_id = $link->query($sql_get_product_id);

// Loop through and echo all the records

while ($row_get_product_id = $results_get_product_id->fetch_assoc())
	{	
		
		

$percentage = $payout_fee;
$totalWidth = $row_get_funding['funded'];
$new_width = ($percentage / 100) * $totalWidth;		
//,`paid_date` = '".$todaydate."'
$query_payout_fee = "UPDATE `product_funding` SET `paid` = '".$new_width."' WHERE `payout_status` = 'progress' AND `paid` = '' AND `product_id` = '".$row_get_product_id["id"]."'";

// Execute the query
$result_payout_fee = $link->query($query_payout_fee);	

	}}



}}
?>