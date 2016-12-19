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

?>