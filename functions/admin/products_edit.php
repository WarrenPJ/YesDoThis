<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Update record
if(isset($_POST["submit"])){

//Convert title to a slug
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST["title"])));

$title = $_POST["title"];
$short_description = $_POST["short_description"];
$description = addslashes($_POST['description']);
$funding_goal = $_POST["funding_goal"];
$video_file = $_POST["video_file"];
$category = $_POST["category"];
$video = $_POST["video"];
$location = $_POST["location"];
$country = $_POST["country"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$complete_status = $_POST["complete_status"];
$image = $_POST["selectedImage"];
$active = $_POST["active_status"];

$originalStartDate = $start_date;
$newStartDate = date("Y-m-d", strtotime($originalStartDate));
//echo $newStartDate;

$originalEndDate = $end_date;
$newEndDate = date("Y-m-d", strtotime($originalEndDate));
//echo $newEndDate;
	
	//Replace divs
$description_a = str_replace( '<div>', '', $description );
$description_b = str_replace( '</div>', '', $description_a );
$description_c = str_replace( '<div', '', $description_b );
$description_d = str_replace( '</div', '', $description_c );

//HTML entry for description
$description_html = htmlentities($description_d);
//echo $_POST["video_file"];

//Remove extension
$file_name_without_extension = $_POST["video_file"];
//echo substr($file_name_without_extension, 0, strrpos($file_name_without_extension, ".")); //filename.test
$video_file_strip = substr($file_name_without_extension, 0, strrpos($file_name_without_extension, ".")); //filename.test
//echo $video_file_strip;



//Generate unique product urls
//SQL Query
$sql_product_slug = "SELECT post_url,id FROM product WHERE post_url = '".$slug."'";
$results_product_slug = $connection->query($sql_product_slug);

if ($results_product_slug->num_rows > 0) {
    // output data of each row
	
$unique_slug = uniqid("".$slug."-");

$sql = "UPDATE product SET 
		title = '".$title."',
		short_description = '".$short_description."',
		description = '".$description_html."',
		funding_goal = '".$funding_goal."',
		category = '".$category."',
		start_date = '".$newStartDate."',
		end_date = '".$newEndDate."',
		image = '".$image."',
		complete_status = '".$complete_status."',
		post_url = '".$unique_slug."',
		active = '".$active."' WHERE id = '".$_GET['id']."'";
	
}
    else{
     
			//Do not exisist so create the item
				 
$sql = "UPDATE product SET 
		title = '".$title."',
		short_description = '".$short_description."',
		description = '".$description_html."',
		funding_goal = '".$funding_goal."',
		category = '".$category."',
		start_date = '".$newStartDate."',
		end_date = '".$newEndDate."',
		image = '".$image."',
		complete_status = '".$complete_status."',
		post_url = '".$slug."',
		active = '".$active."' WHERE id = '".$_GET['id']."'";
			
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
$sql = "SELECT * FROM product WHERE id = '".$_GET['id']."'";
$results = $connection->query($sql);

//Make second connection to get all categories
$sql_video_category = "SELECT * FROM product_category ORDER BY category ASC";
$results_video_category = $connection->query($sql_video_category);

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
				<label class="control-label col-md-2">Short description <span class="required">*</span></label>
				<div class="col-md-8">
					<textarea class="resizable_textarea form-control" name="short_description" placeholder="Enter your introduction here..."><?php echo htmlspecialchars($row["short_description"]); ?></textarea>
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

				<label class="control-label col-md-2" for="first-name">Funding goal <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="funding_goal" value="<?php echo $row["funding_goal"];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
						while($row_video_cateogory=$results_video_category->fetch_array())
						{
						 ?>
							<option value="<?php echo $row_video_cateogory['category']; ?>"><?php echo $row_video_cateogory['category']; ?></option>
							<?php
						}
						?>
						</select>

				</div>
			</div>

			
				<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Project start date <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					 <input class="form-control col-md-7 col-xs-12" id="start_date" name="start_date" value="<?php echo $row['start_date']; ?>" type="text"/> 
				</div>
			</div>
			
			
		
				<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Project end date <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					 <input class="form-control col-md-7 col-xs-12" id="end_date" name="end_date" value="<?php echo $row['end_date']; ?>" type="text"/> 
				</div>
			</div>			
	
		
			
			
<!-- Extra JavaScript/CSS added manually in "Settings" tab -->

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="start_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
	
		$(document).ready(function(){
		var date_input=$('input[name="end_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
			
								

			
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
				<label class="control-label col-md-2">Select your image <span class="required">*</span></label>
				<div class="col-md-8">

					<!-- Load all available video files -->
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
					echo '/admin_products.php';
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
			
<?php } ?>	
						<br />
				</div>
			</div>

		</form>

		<?php
}}
$connection->close();
?>