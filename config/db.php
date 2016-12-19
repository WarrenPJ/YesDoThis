<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

/**
 * Configuration for: Database Connection
 *
 * For more information about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 *
 * DB_HOST: database host, usually it's "127.0.0.1" or "localhost", some servers also need port info
 * DB_NAME: name of the database. please note: database and database table are not the same thing
 * DB_USER: user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT.
 * DB_PASS: the password of the above user
 */
define("DB_HOST", "localhost");
define("DB_NAME", "yes_do_this");
define("DB_USER", "root");
define("DB_PASS", "");

//Include secure calls to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yes_do_this";

//Do not edit the rows below
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//SQL Query
$sql = "SELECT * FROM settings_general";
$results = $connection->query($sql);

//Create variables for path
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$domain    = $_SERVER['SERVER_NAME'];

//Full url
$urlpart = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$urlpart);
$dir = "";
for ($i = 0; $i < count($parts) - 1; $i++) {

 $dir .= $parts[$i] . "/";
}


$url = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
	

//General details
$website_title = $row["title"];
$website_description = $row["description"];
$private_secretkey = $row["secret_key"];
$seo_status = $row["seo"];

//Social setting details
$sharethis = $row["sharethis"];
$disqus = $row["disqus"];
	}}

//SQL Query
$sql_payments = "SELECT * FROM settings_payment";
$results_payments = $connection->query($sql_payments);

if ($results_payments->num_rows > 0) {
    // output data of each row
    while($row_payments = $results_payments->fetch_assoc()) {
	

//Payment details
$selected_currency = $row_payments["currency"];
$payout_fee = $row_payments["fee"];

	}}	

	
//SQL Query
$sql_product_status = "SELECT active FROM product  WHERE `complete_status` = 'complete' AND `active` = 'yes'";
$results_product_status = $connection->query($sql_product_status);

if ($results_product_status->num_rows > 0) {
    // output data of each row
    while($row_product_status = $results_product_status->fetch_assoc()) {
	
// Deactivate and close products with end date equal to today
$query = "UPDATE `product` SET `active` = 'no' WHERE `complete_status` = 'complete' AND `active` = 'yes'";

// Execute the query
$result = $connection->query($query);

	}}	

// active or not_active
$test_state = "not_active";

//Reset information in test state active
if ($test_state =="active") {

$demo_pass = "$2y$10\$Vcooq4GTpueNQ0ndRXmfOuR2pA5k6rYh.zAD5esocpgakqnmTQ4Xy";

$query = "UPDATE `users` SET `user_password_hash` = '".$demo_pass."' WHERE `user_name` = 'demo'";
$query_update_c = "UPDATE `users` SET `user_password_hash` = '".$demo_pass."' WHERE `user_name` = 'superman'";

$query_update_a = "UPDATE users_details SET first_name = 'Jane', last_name = 'Do', admin = 'yes', description = 'This is my sample description for my profile', gender = 'female', date_of_birth = '1990-03-03', location = 'New York', country = 'USA', website = 'www.mywebsite.com', facebook = 'myfacebook', profile_image = '0/images/sample.png', twitter = 'mytwitter', paypal = 'mypaypal' WHERE user_id = 'demo'";
$query_update_b = "UPDATE users_details SET first_name = 'Jennifer', last_name = 'Supergirl', admin = 'yes', description = 'This is my sample description for my profile', gender = 'female', date_of_birth = '1990-03-03', location = 'New York', country = 'USA', website = 'www.mywebsite.com', facebook = 'myfacebook', profile_image = '0/images/sample.png', twitter = 'mytwitter', paypal = 'mypaypal' WHERE user_id = 'superman'";
	
	
// Execute the query
$result = $connection->query($query);
$result_update_a = $connection->query($query_update_a);
$result_update_b = $connection->query($query_update_b);
$result_update_c = $connection->query($query_update_c);	
	
}


//Calculate the fake cronjob
error_reporting(E_ERROR | E_PARSE);

$sql_cronjob = "SELECT * FROM cronjob";
$results_cronjob = $connection->query($sql_cronjob);

if ($results_cronjob->num_rows > 0) {
    // output data of each row
    while($row_cronjob = $results_cronjob->fetch_assoc()) {
	//start the jobs
	
	//current time
	$currentDate = date("Y-m-d");
	$currentTime = date("H:i:s");
	$currentDate =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));

	
	$last_run = $row_cronjob['last_time_stamp'];
	$cron_five = $row_cronjob['five'];
	$cron_hour = $row_cronjob['hour'];
	$cron_daily = $row_cronjob['daily'];
	$cron_newsletter = $row_cronjob['newsletter'];

	//update time now
	//$query_time_now = "UPDATE `cronjob` SET `last_time_stamp` = '".$currentDate."'";
	//$result_time_now = $connection->query($query_time_now);	

	//Update the five minute cron
	if(strtotime($cron_five) < strtotime("-5 minutes")) {
		$this_is_new = true;
		$query_time_five = "UPDATE `cronjob` SET `five` = '".$currentDate."'";
		$result_time_five = $connection->query($query_time_five);	
		include "".$url."/functions/cronjobs/five.php?secretpass=".$private_secretkey."";
	}
	//End five minute cron

	//Update the hour cron
	if(strtotime($cron_hour) < strtotime("-60 minutes")) {
		$this_is_new = true;
		$query_time_hour = "UPDATE `cronjob` SET `hour` = '".$currentDate."'";
		$result_time_hour = $connection->query($query_time_hour);	
		include "".$url."/functions/cronjobs/hour.php?secretpass=".$private_secretkey."";
	}
	//End hour cron	
	
	//Update the daily cron
	if(strtotime($cron_daily) < strtotime("-1 days")) {
		$this_is_new = true;
		$query_time_daily = "UPDATE `cronjob` SET `daily` = '".$currentDate."'";
		$result_time_daily = $connection->query($query_time_daily);	
		include "".$url."/functions/cronjobs/daily.php?secretpass=".$private_secretkey."";
	}
	//End hour daily
	
	//Update the newsletter cron
	if(strtotime($cron_newsletter) < strtotime("-5 minutes")) {
		$this_is_new = true;
		$query_time_newsletter = "UPDATE `cronjob` SET `newsletter` = '".$currentDate."'";
		$result_time_newsletter = $connection->query($query_time_newsletter);	
		include "".$url."/functions/cronjobs/send_bulk.php?secretpass=".$private_secretkey."";
		include "".$url."/functions/cronjobs/send_email.php?secretpass=".$private_secretkey."";
	}
	//End hour newsletter

}}

