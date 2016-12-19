<?php
error_reporting(E_ERROR | E_PARSE);	
include '../../config/db.php';

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Check if the secrect pass is used - example yoururl.com/functions/cronjobs/send_email.php?secretpass=hmAPcrkqjDhMkJw
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
$empty = "0000-00-00";

//Check if there are messages that should be send
$sql = "SELECT * FROM inbox WHERE send_date = '".$datenow."' AND receive_date = '".$empty."'";
$results = $connection->query($sql);
 
 if ($results->num_rows > 0) {

while($row = $results->fetch_assoc()) {

// Now if there at least one message, get the user email accounts
$sql_email_one = "SELECT user_email FROM users WHERE user_name = '".$row['to_id']."'";
$results_email_one = $connection->query($sql_email_one);
//Loop through and echo all the records

    while ($row_email_one = mysqli_fetch_array($results_email_one)) {

	
//Get the contact support address
$sql_settings = "SELECT contact_email FROM settings_general";
$results_settings = $connection->query($sql_settings);
//Loop through and echo all the records

    while ($row_settings = mysqli_fetch_array($results_settings)) {	
	
//Check if the message should be send to one or all users
	
 if ($row['to_id'] != "all") {	
 //Send to one user
 
		//Convert br to lines
		$clean_description = $row['description'];
		$breaks = array("<br />","<br>","<br/>");  
		$clean_description = str_ireplace($breaks, "\r\n", $clean_description);  
		
		//Get contact name
		$from = $row_settings['contact_email'];

		//Add headers to prevent spam
		//$headers .= 'From: ' . $from . "\r\n";
		$headers .= 'Reply-To: ' . $from . "\r\n";
		$headers .= 'Return-Path: ' . $from . "\r\n";
		$headers = 'From: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

		$to = $row_email_one['user_email']; // The column where your e-mail was stored.
		$subject = $row['subject'];
		$message = $clean_description;
		mail($to, $subject, $message, $headers);
		
		
		$empty = "0000-00-00";
		$current_date = date('Y-m-d');
		
		 if ($row['repeat'] == "never") {
			$datenow = date('Y-m-d');
			
		$sql_update_inbox = "UPDATE inbox SET receive_date = '".$current_date."' WHERE send_date = '".$datenow."' AND receive_date = '".$empty."'";
		if ($connection->query($sql_update_inbox) === TRUE) {
		}	
			
		 }
		 if ($row['repeat'] == "week") {
			// $current_date = date('Y-m-d');
			 $start_date = date('Y-m-d');
			$date = strtotime($start_date);
			$date = strtotime("+7 day", $date);
			$datenow = date('Y/m/d', $date);
			//echo $datenow;
			
		$sql_update_inbox = "UPDATE inbox SET send_date = '".$datenow."' WHERE send_date = '".$current_date."' AND receive_date = '".$empty."'";
		if ($connection->query($sql_update_inbox) === TRUE) {
		}
			
			
		 }
		 if ($row['repeat'] == "month") {
			// $current_date = date('Y-m-d');
			 $start_date = date('Y-m-d');
			$date = strtotime($start_date);
			$date = strtotime("+1 month", $date);
			$datenow = date('Y/m/d', $date);
			//echo $datenow;
			
			$sql_update_inbox = "UPDATE inbox SET send_date = '".$datenow."' WHERE send_date = '".$current_date."' AND receive_date = '".$empty."'";
		if ($connection->query($sql_update_inbox) === TRUE) {
		}
			
		 }
		 if ($row['repeat'] == "year") {
			// $current_date = date('Y-m-d');
			 $start_date = date('Y-m-d');
			$date = strtotime($start_date);
			$date = strtotime("+1 year", $date);
			$datenow = date('Y/m/d', $date);
			//echo $datenow;
			
			$sql_update_inbox = "UPDATE inbox SET send_date = '".$datenow."' WHERE send_date = '".$current_date."' AND receive_date = '".$empty."'";
		if ($connection->query($sql_update_inbox) === TRUE) {
		}
			
		 }		 

} 
	
	
     //Send script loaded
    }

 }}  }
 
?>