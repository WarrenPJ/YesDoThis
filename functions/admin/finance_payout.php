<?php

// Create connection

$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($connection->connect_error)
	{
	die("Connection failed: " . $connection->connect_error);
	}



// SQL Query

$sql_get_funders = "SELECT * FROM product_funding";
$results_get_funders = $connection->query($sql_get_funders);

// Loop through and echo all the records

while ($row_get_funders = $results_get_funders->fetch_assoc())
	{

	// Loop with style is started

		
		$sql_get_product = "SELECT * FROM product WHERE `id` = '".$row_get_funders["product_id"]."'";
$results_get_product = $connection->query($sql_get_product);

// Loop through and echo all the records

while ($row_get_product = $results_get_product->fetch_assoc())
	{

		
				$sql_get_user = "SELECT * FROM users_details WHERE `user_id` = '".$row_get_product["author"]."'";
$results_get_user = $connection->query($sql_get_user);

// Loop through and echo all the records

while ($row_get_user = $results_get_user->fetch_assoc())
	{
	
?>


<tr>
	  <td><?php
	echo $row_get_product["author"]; ?></td>
	 <td><?php
	echo $row_get_user["paypal"]; ?></td>
	  <td><?php
	echo $row_get_funders["paid"]; ?></td>
	  <td><?php
	echo $row_get_funders["paid_date"]; ?></td>
	  <td>
			
				<?php
						if ($row_get_funders["payout_status"] != "done") {
						?>
				<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_funding_overview.php?active=';
		echo $row_get_funders["id"];
		echo '" class="btn btn-danger btn-xs">';
		?>
				<i class="fa fa-remove"></i> Confirm payment <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?></a>

				<?php
						} else {
							?>


					<?php 	echo '<a href="';
		echo '#';
		echo '" class="btn btn-success btn-xs">';
		?>
					<i class="fa fa-check"></i> Paid already <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?></a>

					<?php
						}
						?>		
			
			
			
			
			</td>
</tr>	 
<?php
	if ($test_state =="active") {
?>

		<?php

//Make news active
   if($_GET['active']!=""):
    extract($_GET);
    $active = $connection->real_escape_string($_GET['active']);
$sql = "UPDATE product_funding SET payout_status = 'done' WHERE id = '".$active."'";

if ($connection->query($sql) === TRUE) {
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
}
endif;

//End the loop
		?>





<?php

	// End the loop
	}}}
	}

$connection->close();
?>
