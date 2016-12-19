<?php
include 'config/db.php';

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// SQL Query
$sql = "SELECT * FROM settings_payment";
$results = $connection->query($sql);

//Full url
$url = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
	//$row['paypal_account']
	$my_paypal = $row['paypal_account'];

// Your test paypal sanbox url, Replace it with live url after successful testing.
if ($row["paypal_sandbox"] == "yes") {
$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
} else {
$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
}

$price_membership = $row["price_membership"];
$price_membership_b = $row["price_membership_b"];
$price_membership_c = $row["price_membership_c"];

$selected_currency = $row["currency"];
$paypal_account = $row["paypal_account"];

	}}

?>