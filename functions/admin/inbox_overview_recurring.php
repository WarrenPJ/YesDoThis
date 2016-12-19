<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

$get_all    = "all";

 // SQL Query
 $to_all = "all";
$sql = "SELECT * FROM inbox WHERE id = '".$_GET['id']."' AND to_id = '".$to_all."' AND from_id = '".$_SESSION['user_name']."' ";
$results = $connection->query($sql);
 
 if ($results->num_rows > 0) {

while($row = $results->fetch_assoc()) {

//Make second connection and loop to get user details
// SQL Query
$sql_user_email = "SELECT * FROM users_details WHERE user_id = '".$row['from_id']."'";
$results_user_email = $connection->query($sql_user_email);
while ($row_user_email = $results_user_email->fetch_assoc()){

?>

	<style>
		div.x_panel {
			min-height: 600px;
		}
	</style>


	<div class="inbox-body">
		<div class="mail_heading row">
			<div class="col-md-8">
				<div class="btn-group">


					<?php 

if ($row['subject'] !="Welcome administrator") {
    //Show delete button
?>

					<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_inbox_recurring.php?id=';
		echo $_GET["id"];
		echo '&delete=';
		echo $_GET["id"];
		echo '" class="btn btn-danger btn-xs">';
		?>
					<i class="fa fa-delete btn-danger"></i> Delete</a>



					<?php
//Delete message rows in database
   if($_GET['delete']!="" AND $row['subject'] !="Welcome administrator"):
    extract($_GET);
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM inbox WHERE id='$id'");
?>

						<!-- Get latest row -->
						<?php

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}
					
//Get last ID if no get is available
$sql_last = "SELECT * FROM inbox WHERE to_id = '".$to_all."' AND from_id = '".$_SESSION['user_name']."' ORDER BY id DESC LIMIT 0, 1";
$results_last = $connection->query($sql_last);
 if ($results_last->num_rows > 0) {
   while($row_last = $results_last->fetch_assoc()) {	


//echo $row_last['id'];


   ?>

							<!-- Redirect to the last id -->
							<script type='text/javascript'>
								window.location = "admin_inbox_recurring.php?id=<?php echo $row_last['id']; ?>";
							</script>

							<?php }}

   ?>


							<?php
endif;
?>

								<?php
} else {
    //Hide delete button
}
?>

				</div>
			</div>
			<div class="col-md-4 text-right">
				<p class="date"> Will be send on
					<?php echo $row['send_date']; ?>
				</p>
				<p class="date"> Will repeat
					<?php
							    if ($row['repeat'] != "never") {
							  echo "each";
								}
							   if ($row['repeat'] == "never") {
							   //
								}
							   ?>

						<?php
							    echo $row['repeat'];
							   ?>
				</p>
			</div>
			<div class="col-md-12">
				<h4> <?php echo $row['subject']; ?></h4>
			</div>
		</div>
		<div class="sender-info">
			<div class="row">
				<div class="col-md-12">
					<strong><?php echo $row_user_email['first_name']; ?> <?php echo $row_user_email['last_name']; ?></strong>
					<span></span> to
					<strong>me</strong>
					<a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
				</div>
			</div>
		</div>
		<div class="view-mail">
			<p>
				<?php   echo htmlspecialchars_decode(stripslashes($row['description']));
 ?>
			</p>
		</div>

	</div>

	<?php
 }}} 
$connection->close();
?>