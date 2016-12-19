<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// SQL Query
$sql = "SELECT * FROM product ORDER BY title ASC";
$results = $connection->query($sql);
//Loop through and echo all the records
while ($row = $results->fetch_assoc()){
//Loop with style is started

$image_path = "<img src=\"" . $url."/files_public/upload/" . $row["image"]."\" class=\"video_thumbs_small\" height=\"70\" width=\"60\" alt=\"\">";
	
	
	
$sql_to_add_favorites = "UPDATE product SET complete_status = 'started'";
		 if(mysqli_query($connection, $sql_to_add_favorites))  
					{  
							 //something
					}  	
	
	
	
?>

	<style>
		img.video_thumbs_small {
			max-height: 70px;
			max-width: 60px;
		}
	</style>

	<tr>
		<td>
			<?php echo $image_path; ?>
		</td>
		<td>
			<?php echo $row["title"];?>
		</td>
		<td>
			<?php echo $row["category"];?>
		</td>
		<td>

			<?php
						if ($row["active"] != "yes") {
						?>
				<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products.php?active=';
		echo $row["id"];
		echo '" class="btn btn-danger btn-xs">';
		?>
				<i class="fa fa-remove"></i> No 
<?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?>
				
				</a>

				<?php
						} else {
							?>


					<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products.php?deactive=';
		echo $row["id"];
		echo '" class="btn btn-success btn-xs">';
		?>
					<i class="fa fa-check"></i> Yes 
<?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?>					
					
					</a>

					<?php
						}
						?>


		</td>
		<td>

	
			
		
			<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_edit.php?id=';
		echo $row["id"];
		echo '" class="btn btn-info btn-xs">';
		?>

			<i class="fa fa-pencil"></i> Edit </a>
			
			

			
			<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products.php?id=';
		echo $row["id"];
		echo '" class="btn btn-danger btn-xs">';
		?>
			<i class="fa fa-trash-o"></i> Delete 
<?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?>			
			</a>
			
		</td>
	</tr>
<?php
	if ($test_state =="not_active") {
?>

<?php
//Delete news rows in database
   if($_GET['id']!=""):
    extract($_GET);
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM product WHERE id='$id'");
	  $connection->query("DELETE FROM product_pledge WHERE product_id='$id'");
	  $connection->query("DELETE FROM product_funders WHERE product_id='$id'");
	  $connection->query("DELETE FROM product_funding WHERE product_id='$id'");
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

//Make news active
   if($_GET['active']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['active']);
$sql = "UPDATE product SET active = '".$active_status_yes."' WHERE id = '".$active."' AND active = '".$active_status_no."'";

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

//Make news deactive
   if($_GET['deactive']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['deactive']);
$sql = "UPDATE product SET active = '".$active_status_no."' WHERE id = '".$active."' AND active = '".$active_status_yes."'";

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

}
?>

<?php } ?>