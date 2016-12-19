<?php
// Turn off all error reporting
error_reporting(0);
	
//Check if payments are done
$connection = new mysqli($servername, $username, $password, $dbname);
$query_update_payments = "SELECT * FROM users_payments";
 if ($result_payments=mysqli_query($connection,$query_update_payments))
  {
   if(mysqli_num_rows($result_payments) < 1)
    {
		?>
	<style>
		img.video_thumbs {
			height: 42px;
			width: 42px;
		}
		
		a.pull-left.date {
			background-color: #ffffff;
		}
	</style>

	<article class="media event">

		<div class="media-body">
			No payments yet
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</article>

	<?php
        return $sql_membership;
		
    }}	

?>

		<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}


// SQL Query
$sql = "SELECT * FROM users_payments ORDER BY id DESC LIMIT 0, 5";
$results = $connection->query($sql);
//Loop through and echo all the records
while ($row = $results->fetch_assoc()){
//Loop with style is started
?>

			<style>
				img.video_thumbs {
					height: 42px;
					width: 42px;
				}
				
				a.pull-left.date {
					background-color: #ffffff;
				}
			</style>

			<article class="media event">
				<a class="pull-left date">
					  
					  <?php 
							echo '<img src="';						  
							echo $url;	
							echo '/themes/admin/assets/images/money.png';
							echo '" class="video_thumbs" alt="">';
							?>

                      </a>
				<div class="media-body">
					<?php echo $selected_currency; ?>
					<?php echo $row["amount"];?>
					<p>By
						<?php echo $row["user_id"];?>,
						<?php echo $row["date"];?>
					</p>
				</div>
			</article>

			<?php
//End the loop
}
$connection->close();
?>