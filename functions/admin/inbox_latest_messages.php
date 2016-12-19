<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}



// SQL Query
$sql = "SELECT * FROM inbox WHERE to_id = '".$_SESSION['user_name']."' ORDER BY send_date DESC LIMIT 0, 10";
$results = $connection->query($sql);
//Loop through and echo all the records
while ($row = $results->fetch_assoc()){
//Loop with style is started


//Make second connection and loop to get user details
// SQL Query
$sql_user_email = "SELECT * FROM users_details WHERE user_id = '".$row['from_id']."'";
$results_user_email = $connection->query($sql_user_email);
while ($row_user_email = $results_user_email->fetch_assoc()){

$original_description = $row["description"];
$original_subject = $row["subject"];

?>

	<a href="admin_inbox.php?id=<?php echo $row["id"];?>">
		<div class="mail_list">
			<div class="left">
				<i class="fa fa-edit"></i>
			</div>
			<div class="right">
				<h3><?php echo substr($original_subject, 0, 10);?><small><?php echo $row["send_date"];?></small></h3>
				<p><small>from: <?php echo $row_user_email["first_name"];?> <?php echo $row_user_email["last_name"];?></small></p>
				<p>
					<?php echo substr($original_description, 0, 70);?>
				</p>
			</div>
		</div>
	</a>

	<?php
//End the loop
}}
$connection->close();
?>