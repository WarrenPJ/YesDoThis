<?php
	error_reporting(E_ERROR | E_PARSE);
	include '../../config/db.php';

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}


//Check if the secrect pass is used - example yoururl.com/functions/cronjobs/hour.php?secretpass=hmAPcrkqjDhMkJw
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

$datenow = date('Y-m-d');

//Get total amount for the day
foreach($link->query('SELECT SUM(amount)   
FROM users_payments WHERE date = CURDATE()') as $row) {  
//echo $row['SUM(amount)']; 

$currentamount = $row['SUM(amount)'];


//Update payment row
$query_to_check_videos_category_status = "SELECT * from statistics_payments WHERE date = CURDATE()";
$result_videos_category_status = $link->query($query_to_check_videos_category_status);
	if ($result_videos_category_status->num_rows > 0) {

	//If exisit already
	//echo $row['SUM(amount)'];
	mysqli_query($link, "UPDATE statistics_payments SET amount = ".$currentamount." WHERE date = CURDATE()");	
	
	}  else {
		//No results
		mysqli_query($link, "INSERT INTO statistics_payments (`date`) VALUES ('".$datenow."')");
		
	}
} 


//Refund coins if deadline is not reached
$sql_funding_refund = "SELECT * FROM product_funding WHERE `payout_status` = 'cancelled'";
$result_funding_refund = mysqli_query($link, $sql_funding_refund); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_funding_refund) > 0)  
{  
while($row_product_funding = mysqli_fetch_array($result_funding_refund))  
{ 
	
	//Get all funders for the product
	$sql_funders = "SELECT * FROM product_funders WHERE `product_id` = '".$row_product_funding['product_id']."'";
	$result_funders = mysqli_query($link, $sql_funders); 

	//Start of the loop
	//Get the video path with correct domain information
	if(mysqli_num_rows($result_funders) > 0)  
	{  
	while($row_get_funders = mysqli_fetch_array($result_funders))  
	{ 
	
		//Now update the users_membership row with the donated coins
		$query_update_membership = "UPDATE `users_membership` SET `days` = `days` + '".$row_get_funders['total']."' WHERE `user_id` = '".$row_get_funders['user_id']."'";
		// Execute the query
		$result_update_membership = $link->query($query_update_membership);
		
		//Now remove the rows in the product_funders table
		$query_remove_funder = "DELETE FROM `product_funders` WHERE `product_id` = '".$row_product_funding['product_id']."'";
		// Execute the query
		$result_remove_funder = $link->query($query_remove_funder);

}}
	}}


//Remove information in test state active
if ($test_state =="active") {

	$query_remove_funder_part_a = "DELETE FROM `product` WHERE `id` > '234'";
	  $query_remove_funder_part_b = "DELETE FROM `product_pledge` WHERE `id` > '237'";
	  
	  $sql_update_row_a = "UPDATE users_details SET first_name = 'Jane', last_name = 'Do', description = 'This is my sample description for my profile', gender = 'female', date_of_birth = '1990-03-03', location = 'New York', country = 'USA', website = 'www.mywebsite.com', facebook = 'myfacebook', profile_image = '0/images/sample.png', twitter = 'mytwitter', paypal = 'mypaypal' WHERE user_id = 'demo'";
	  $sql_update_row_b = "UPDATE users_details SET first_name = 'Jennifer', last_name = 'Supergirl', description = 'This is my sample description for my profile', gender = 'female', date_of_birth = '1990-03-03', location = 'New York', country = 'USA', website = 'www.mywebsite.com', facebook = 'myfacebook', profile_image = '0/images/sample.png', twitter = 'mytwitter', paypal = 'mypaypal' WHERE user_id = 'superman'";

	// Execute the query
		$result_remove_funder = $link->query($query_remove_funder_part_a);
		$result_remove_funder = $link->query($query_remove_funder_part_b);
		 if(mysqli_query($link, $sql_update_row_a))  
					{  
							 //something
					}  
		 if(mysqli_query($link, $sql_update_row_b))  
					{  
							 //something
					}	
	
	
}



			

?>