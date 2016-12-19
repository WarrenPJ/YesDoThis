<?php
//Update record
if(isset($_POST["submit"])){

//Convert title to a slug
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST["title"])));


$title = $_POST["title"];
$description = addslashes($_POST['description']);
$image = $_POST["selectedImage"];
$category = $_POST["category"];
$date = $_POST["type"];
$active = $_POST["active_status"];

//Replace divs
$description_a = str_replace( '<div>', '', $description );
$description_b = str_replace( '</div>', '', $description_a );
$description_c = str_replace( '<div', '', $description_b );
$description_d = str_replace( '</div', '', $description_c );

//HTML entry for description
$description_html = htmlentities($description_d);

//Generate unique product urls
//SQL Query
$sql_product_slug = "SELECT post_url,id FROM news WHERE post_url = '".$slug."'";
$results_product_slug = $connection->query($sql_product_slug);

if ($results_product_slug->num_rows > 0) {
    // output data of each row
	
$unique_slug = uniqid("".$slug."-");

$sql = "UPDATE news SET title = '".$title."',description = '".$description_html."',image = '".$image."',category = '".$category."',date = now(),post_url = '".$unique_slug."',active = '".$active."' WHERE id = '".$_GET['id']."'";
	
}
    else{
     
			//Do not exisist so create the item
				 
$sql = "UPDATE news SET title = '".$title."',description = '".$description_html."',image = '".$image."',category = '".$category."',date = now(),post_url = '".$slug."',active = '".$active."' WHERE id = '".$_GET['id']."'";
			
    }






if ($connection->query($sql) === TRUE) {

?>
	<script type='text/javascript'>
		window.onload = function() {
			if (!localStorage.justOnce) {
				localStorage.setItem("justOnce", "true");
				window.location.reload();
			}
		}
	</script>
	<?php
}

else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $connection->error."');</script>";
}}
//End update records

// SQL Query
$sql = "SELECT * FROM news WHERE id = '".$_GET['id']."'";
$results = $connection->query($sql);

//Make second connection to get all categories
$sql_news_category = "SELECT * FROM news_category ORDER BY category ASC";
$results_news_category = $connection->query($sql_news_category);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
		
?>


<!-- Summernote -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <!-- include jquery -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 

  <!-- include libs stylesheets -->

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

  <!-- include summernote -->
  <link rel="stylesheet" href="<?php echo $url; ?>/libraries/summernote/dist/summernote.css">
  <script type="text/javascript" src="<?php echo $url; ?>/libraries/summernote/dist/summernote.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300,
        tabsize: 2
      });
    });
  </script>
  
  <style>
  .note-group-select-from-files {
  display: none;
}
</style>
<!-- /Summernote -->


		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

			<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Title <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="title" value="<?php echo $row["title"];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Description <span class="required">*</span></label>
				<div class="col-md-8">
			




<textarea class="summernote" id="summernote" name="description" rows="18"><?php echo html_entity_decode($row["description"]); ?>
					</textarea>

			
				<!--<div class="summernote"></div>
				
					<textarea class="resizable_textarea form-control" name="description" placeholder="Enter your product description here..."><?php echo htmlspecialchars($row["description"]); ?></textarea>-->
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Active <span class="required">*</span></label>
				<div class="col-md-8">
					<select id="active_status" class="form-control" name="active_status">

						
						<?php
						if ($row["active"] != "yes") {
						?>
						<option selected="selected"><?php echo $row["active"]; ?></option>
						<?php
						} else {
							?>
						<option disabled selected>Choose option</option>
						<?php
						}
						?>

                            <option value="yes" <?php echo ($row["active"] == 'yes')?"selected":"" ?>>Yes</option>
                            <option value="no">No</option>
						</select>
				</div>
			</div>				
			
			<div class="form-group">
				<label class="control-label col-md-2">Category <span class="required">*</span></label>
				<div class="col-md-8">

					<select class="form-control" name="category">
						
						<?php
						if ($row["category"] != "") {
						?>
						<option selected="selected"><?php echo $row["category"];?></option>
						<?php
						} else {
							?>
						<option disabled selected>Choose option</option>
						<?php
						}
						?>
						
						<?php
						//Loop all categories
						while($row_news_cateogory=$results_news_category->fetch_array())
						{
						 ?>
							<option value="<?php echo $row_news_cateogory['category']; ?>"><?php echo $row_news_cateogory['category']; ?></option>
							<?php
						}
						?>
						</select>

				</div>
			</div>

			
			
			<div class="form-group">
				<label class="control-label col-md-2">Select your image <span class="required">*</span></label>
				<div class="col-md-8">

					<!-- Load all available files -->
					<?php
						  include 'functions/admin/videos_image_viewer.php';
						 ?>

				</div>
			</div>

			</div>

			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-13">
					<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_news.php';
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