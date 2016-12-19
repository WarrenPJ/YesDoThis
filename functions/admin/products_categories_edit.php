<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// SQL Query
$sql = "SELECT * FROM product_category WHERE id = '".$_GET['id']."'";
$results = $connection->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
	
//Update category record
if(isset($_POST["submit"])){

$title = $_POST["title"];
$status = $_POST["status"];

$sql = "UPDATE product_category SET category = '".$title."' WHERE id = '".$_GET['id']."' AND category != 'Undefined'";
$sql_status = "UPDATE product_category SET active = '".$status."' WHERE id = '".$_GET['id']."'";
$sql_news = "UPDATE product SET category = '".$title."' WHERE category = '".$row['category']."'";


if ($connection->query($sql) === TRUE) {
if ($connection->query($sql_status) === TRUE) {
if ($connection->query($sql_news) === TRUE) {

?>
	<script type='text/javascript'>
		if (window.location.href.substr(-2) !== '?r') {
			window.location = window.location.href + '?r';
		}
	</script>
	<?php
}}}

else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $connection->error."');</script>";
}}
//End update records

	
?>

		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">



			<?php
if ($row["category"] == "Undefined") { ?>
				<!-- Hide title -->
				<?php
} else {
?>

					<div class="form-group">
						<label class="control-label col-md-2" for="first-name">Category title <span class="required">*</span>
                        </label>
						<div class="col-md-8">
							<input type="text" value="<?php echo $row["category"];?>" id="first-name" required="required" name="title" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<?php
} 
?>

						<div class="form-group">
							<label class="control-label col-md-2">Status <span class="required">*</span></label>
							<div class="col-md-8">
								<select class="form-control" name="status">
						  <?php
						if ($row["active"] != "") {
						?>
						
						
						<?php
						if ($row["active"] == "no") {
						?>
						<option selected="selected" value="no">Not active</option>
						<?php
						} else {
							?>
						<option selected="selected" value="yes">Active</option>
						<?php } ?>

						<?php
						} else {
							?>
						<option selected>Choose option</option>
						<?php
						}
						?>
                         
                            <option value="yes">Active</option>
                            <option value="no">Not active</option>
                          </select>
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-13">
								<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_products_categories.php';
					echo '" class="btn btn-primary">';
					?>

									Cancel</a>

<?php
	if ($test_state =="active") {
?>
<input type="submit" class="btn btn-success" value="Save (disabled)" name="" disabled />

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input type="submit" class="btn btn-success" value="Save" name="submit" />
			
<?php } ?>	<br />
							</div>
						</div>

		</form>

		<?php
}}
$connection->close();
?>