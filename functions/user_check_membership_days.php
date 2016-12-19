<?php

//Check if the user has membership days
$conn_to_check_existing_membership_days = mysqli_connect($servername, $username, $password, $dbname);

	$query_to_check_existing_membership_days = "SELECT * from users_membership WHERE user_id = '".$_SESSION['user_name']."' AND days < '1'";
	$result_membership = $conn_to_check_existing_membership_days->query($query_to_check_existing_membership_days);
		if ($result_membership->num_rows > 0) {
    // output data of each row
    while($row_the_user = $result_membership->fetch_assoc()) {
?>
	<script type='text/javascript'>
		window.location = "<?php echo $url;?>/users_profile_payment.php";
	</script>
	<?php

	//End the loop
    }
	} else {
		//No results
	}
      ?>
