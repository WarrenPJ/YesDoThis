<?php session_start();
//include "connect.php"; //connects to the database


if (isset($_GET['key'])){
	$userkey = $_GET['key'];
	$query="SELECT * FROM `users_reset` WHERE activation_code = '".$userkey."'";
	$result   = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count=mysqli_num_rows($result);
	

	
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		

		//Make second connection to get user information
$sql_user_check = "SELECT * FROM users_reset WHERE activation_code = '".$userkey."'";
$results_user_check = $connection->query($sql_user_check);

if ($results_user_check->num_rows > 0) {
    // output data of each row
    while($row_user_check = $results_user_check->fetch_assoc()) {
	
			$updateuser = $row_user_check["user_email"];
			$updatepass = $row_user_check["password"];
			$sql = "UPDATE users SET user_password_hash = '".$updatepass."' WHERE user_email = '".$updateuser."'";
			$connection->query("DELETE FROM users_reset WHERE activation_code ='$userkey'");
			if ($connection->query($sql) === TRUE) {
}
			

}
		}		}	}	

$url = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
?>

					<script>
					
					// similar behavior as an HTTP redirect
					window.location.replace("<?php echo $url; ?>");
					</script>