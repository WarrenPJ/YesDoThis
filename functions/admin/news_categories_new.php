<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}


//Update category record
if(isset($_POST["submit"])){

$title = $_POST["title"];
$status = $_POST["status"];

mysqli_query($connection, "INSERT INTO news_category 
(`category`, `active`) VALUES ('".$title."','".$status."')");


    $last_id = $connection->insert_id;



?>
	<script type='text/javascript'>
		window.location = "admin_news_categories_edit.php?id=<?php echo $last_id; ?>";
	</script>
	<?php
}

//End update records

	
?>

		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">


			<div class="form-group">
				<label class="control-label col-md-2" for="first-name">Category title <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" placeholder="Enter your category title" id="first-name" required="required" name="title" class="form-control col-md-7 col-xs-12">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2">Status <span class="required">*</span></label>
				<div class="col-md-8">
					<select class="form-control" name="status">

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
					echo '/admin_news_categories.php';
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

$connection->close();
?>