<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}


// SQL Query
$sql = "SELECT * FROM users_details ORDER BY id DESC LIMIT 0, 5";
$results = $connection->query($sql);
//Loop through and echo all the records
while ($row = $results->fetch_assoc()){
//Loop with style is started


?>

	<li class="media event">
		<a class="pull-left border-aero profile_thumb">
			<i class="fa fa-user aero"></i>
		</a>
		<div class="media-body"><br>
			<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_manage_users_edit.php?id=';
		echo $row["user_id"];
		echo '">';
		?>

			<?php echo $row["first_name"];?>
			<?php echo $row["last_name"];?>
			</a>

			</strong>
			</p>

		</div>
	</li>

	<?php
//End the loop
}
$connection->close();
?>