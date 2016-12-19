<?php
//Update database to create visitor analytics row
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

$query_update = "SELECT * from users_analytics WHERE user_id = '".$_SESSION['user_name']."'";
 if ($result=mysqli_query($connection,$query_update))
  {
   if(mysqli_num_rows($result) < 1)
    {
		  $sql_user_details = $connection->query("INSERT INTO users_analytics(user_id) VALUES('" . $_SESSION['user_name'] . "')");
		  ?><!--<meta http-equiv="refresh" content="0">--><?php
        return $sql_user_details;
		
    }}
?>