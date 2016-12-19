<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// SQL Query
$sql = "SELECT * FROM users_details ORDER BY id DESC";
$results = $connection->query($sql);
//Loop through and echo all the records
while ($row = $results->fetch_assoc()){
//Loop with style is started

//Make second connection and loop to get membership days
// SQL Query
$sql_user_membership = "SELECT * FROM users_membership WHERE user_id = '".$row['user_id']."'";
$results_user_membership = $connection->query($sql_user_membership);
while ($row_user_membership = $results_user_membership->fetch_assoc()){
	
//Make third connection and loop to get email account
// SQL Query
$sql_user_email = "SELECT * FROM users WHERE user_name = '".$row['user_id']."'";
$results_user_email = $connection->query($sql_user_email);
while ($row_user_email = $results_user_email->fetch_assoc()){
?>

	<tr>
		<td>
			<?php echo $row["first_name"];?>
			<?php echo $row["last_name"];?>
		</td>
		<td>
		
<?php
	if ($test_state =="active") {
?>
	Hidden is demo mode
	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
			<?php echo $row_user_email["user_email"];?>
<?php } ?>
			
		</td>
		<td>

			<?php
if ($row_user_membership["days"] > "0") {
    echo "<button type=\"button\" class=\"btn btn-success btn-xs\">Yes</button>";
} else {
    echo "<button type=\"button\" class=\"btn btn-danger btn-xs\">No</button>";
}
?>
		</td>
		<td>

			<?php
if ($row_user_membership["days"] > "0") {
    echo $row_user_membership["days"];
} else {
    echo "0";
}
?>
		</td>
		<td>

			<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_manage_users_edit.php?id=';
		echo $row["user_id"];
		echo '" class="btn btn-info btn-xs">';
		?>
			<i class="fa fa-pencil"></i> Edit </a>
			
			
<?php
	if ($test_state =="active") {
?>
<i class="fa fa-trash-o btn btn-danger btn-xs"></i><button class="btn btn-danger btn-xs">Delete (disabled) </button></a>
	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
			<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_manage_users.php?id=';
		echo $row["user_id"];
		echo '" class="btn btn-danger btn-xs">';
		?>
			<i class="fa fa-trash-o"></i> Delete </a>
			
<?php } ?>			
			
			
			

		</td>
	</tr>

	
<?php
	if ($test_state =="not_active") {
?>
	
	
	<?php
//Delete user rows in database
   if($_GET['id']!=""):
    extract($_GET);
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM users_details WHERE user_id='$id'");
	$connection->query("DELETE FROM users WHERE user_name='$id'");
	$connection->query("DELETE FROM users_favorite WHERE user_id='$id'");
	$connection->query("DELETE FROM users_membership WHERE user_id='$id'");
?>
		<script>
			window.onload = function() {
				if (!window.location.hash) {
					window.location = window.location + '#loaded';
					window.location.reload();
				}
			}
		</script>
		<?php
endif;
?>
<?php } ?>	
<?php
//End the loop
}}}
$connection->close();
?>