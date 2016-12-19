<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}


// SQL Query
$sql = "SELECT * FROM product_category ORDER BY category ASC";
$results = $connection->query($sql);
//Loop through and echo all the records
while ($row = $results->fetch_assoc()){
//Loop with style is started

?>

	<tr>

	


			<td>
				<?php echo $row["category"];?>
			</td>
			<td>
<?php
						if ($row["active"] != "yes") {
						?>
				<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_categories.php?active=';
		echo $row["id"];
		echo '" class="btn btn-danger btn-xs">';
		?>
				<i class="fa fa-remove"></i> No <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?>	</a>

				<?php
						} else {
							?>


					<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_categories.php?deactive=';
		echo $row["id"];
		echo '" class="btn btn-success btn-xs">';
		?>
					<i class="fa fa-check"></i> Yes <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?>	</a>

					<?php
						}
						?>

			</td>
			<td>
				<!--<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> New </a>-->

				<?php
if ($row["category"] == "Undefined") { ?>

					<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_categories_new.php';
		echo '" class="btn btn-primary btn-xs">';
		?>
					<i class="fa fa-pencil"></i> New </a>

					<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_categories_edit.php?id=';
		echo $row["id"];
		echo '" class="btn btn-info btn-xs">';
		?>
					<i class="fa fa-pencil"></i> Edit </a>

					<?php
} else {
?>
						<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_categories_new.php';
		echo '" class="btn btn-primary btn-xs">';
		?>
						<i class="fa fa-pencil"></i> New </a>
						<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_categories_edit.php?id=';
		echo $row["id"];
		echo '" class="btn btn-info btn-xs">';
		?>
						<i class="fa fa-pencil"></i> Edit </a>
						<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_products_categories.php?id=';
		echo $row["id"];
		echo '" class="btn btn-danger btn-xs">';
		?>
						<i class="fa fa-trash-o"></i> Delete <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?>	</a>
						<?php
}
?>

			</td>
	</tr>
<?php
	if ($test_state =="not_active") {
?>

	<?php
//Delete rows in database
   if($_GET['id']!=""):
    extract($_GET);
    $id = $connection->real_escape_string($_GET['id']);
	$title_undefined = "Undefined";

		//Update category to undefined before deletion
	//Make connection to get all categories
$sql_product_category = "SELECT * FROM product_category  WHERE id = '".$id."'";
$results_product_category = $connection->query($sql_product_category);
while($row_product_update = $results_product_category->fetch_assoc()) {	
	
$sql_news = "UPDATE news SET category = '".$title_undefined."' WHERE category = '".$row_product_update['category']."'";
if ($connection->query($sql_news) === TRUE) {
}}
	//Delete row
    $connection->query("DELETE FROM product_category WHERE id='$id' AND category != 'Undefined'");
	

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








//Make active
   if($_GET['active']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['active']);
$sql = "UPDATE product_category SET active = '".$active_status_yes."' WHERE id = '".$active."' AND active = '".$active_status_no."'";

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


//Make deactive
   if($_GET['deactive']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['deactive']);
$sql = "UPDATE product_category SET active = '".$active_status_no."' WHERE id = '".$active."' AND active = '".$active_status_yes."'";

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






//End the loop
}
$connection->close();
?>