<?php
// Turn off all error reporting
error_reporting(0);
	
//If users membership row is not exist, create one
$conn_to_membership_check = mysqli_connect($servername, $username, $password, $dbname);  
$query_update_membership = "SELECT * from users_membership WHERE user_id = '".$_SESSION['user_name']."'";
 if ($result_membership=mysqli_query($conn_to_membership_check,$query_update_membership))
  {
   if(mysqli_num_rows($result_membership) < 1)
    {
		  $sql_membership = $conn_to_membership_check->query("INSERT INTO users_membership(user_id) VALUES('" . $_SESSION['user_name'] . "')");
		  ?><meta http-equiv="refresh" content="0"><?php
        return $sql_membership;
		
    }}	

?>