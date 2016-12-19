<?php
	$servername = $_POST['servername'];
	$databaseusername = $_POST['databaseusername'];
	$databasepassword = $_POST['databasepassword'];
	$databasename = $_POST['databasename'];
	$websitetitle = $_POST['websitetitle'];
	$adminname = $_POST['adminname'];
	$emailaddress = $_POST['emailaddress'];

$header_config = '<?php

/**
 * Configuration for: Database Connection
 *
 * For more information about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 *
 * DB_HOST: database host, usually it\'s "127.0.0.1" or "localhost", some servers also need port info
 * DB_NAME: name of the database. please note: database and database table are not the same thing
 * DB_USER: user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT.
 * DB_PASS: the password of the above user
 */
define("DB_HOST", "localhost");
define("DB_NAME", "saaspand_projectfunding");
define("DB_USER", "saaspand_superma");
define("DB_PASS", ".Oki=Q5FTHT~0OQGP8");

//Include secure calls to the database
$servername = "localhost";
$username = "saaspand_superma";
$password = ".Oki=Q5FTHT~0OQGP8";
$dbname = "saaspand_projectfunding";

//Do not edit the rows below
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//SQL Query
$sql = "SELECT * FROM settings_general";
$results = $connection->query($sql);


if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
	

//General details
$website_title = $row["title"];
$private_secretkey = $row["secret_key"];

	}}
	
	
	
	
	
//SQL Query
$sql_payments = "SELECT * FROM settings_payment";
$results_payments = $connection->query($sql_payments);

if ($results_payments->num_rows > 0) {
    // output data of each row
    while($row_payments = $results_payments->fetch_assoc()) {
	

//Payment details
$selected_currency = $row_payments["currency"];

	}}	


';


?>