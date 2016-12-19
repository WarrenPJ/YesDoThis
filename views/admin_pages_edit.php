<?php
//Check admin permissions
include 'functions/admin_check_permissions.php';
 
// include header, menu and top navigation
include 'views/admin/header.php';
include 'views/admin/menu.php';
include 'views/admin/navigation.php';
?>

	<style>
		img.video_image_edit {
			max-width: 350px;
		}
		
		.form-control-serie {
			border-radius: 0;
			width: 100%;
		}
		
		.form-control-serie:focus {
			border-color: #CCD0D7;
			box-shadow: none !important;
		}
		
		.cropper .docs-buttons> .form-control-serie {
			margin-right: 5px;
			margin-bottom: 10px;
		}
		
		.top_search .form-control-serie {
			border-right: 0;
			box-shadow: inset 0 1px 0px rgba(0, 0, 0, 0.075);
			border-radius: 25px 0px 0px 25px;
			padding-left: 20px;
			border: 1px solid rgba(221, 226, 232, 0.49);
		}
		
		.top_search .form-control-serie:focus {
			border: 1px solid rgba(221, 226, 232, 0.49);
			border-right: 0;
		}
		
		select.form-control-serie {
			height: 30px !important;
			padding-left: 12px !important;
		}
	</style>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Edit Page</h3>
				</div>


			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Page Details </h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br />

<?php
//Update record
if(isset($_POST["submit"])){

//Convert title to a slug
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST["title"])));


$title = $_POST["title"];
$description = addslashes($_POST['description']);
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
$sql_product_slug = "SELECT post_url,id FROM pages WHERE post_url = '".$slug."'";
$results_product_slug = $connection->query($sql_product_slug);

if ($results_product_slug->num_rows > 0) {
    // output data of each row
	
$unique_slug = uniqid("".$slug."-");

$sql = "UPDATE pages SET title = '".$title."',description = '".$description_html."',post_url = '".$unique_slug."',active = '".$active."' WHERE id = '".$_GET['id']."'";

	
}
    else{
     
			//Do not exisist so create the item
				 
$sql = "UPDATE pages SET title = '".$title."',description = '".$description_html."',post_url = '".$slug."',active = '".$active."' WHERE id = '".$_GET['id']."'";

			
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
$sql = "SELECT * FROM pages WHERE id = '".$_GET['id']."'";
$results = $connection->query($sql);

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
	

			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-13">
					<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_pages.php';
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
			
<?php } ?><br />
				</div>
			</div>

		</form>

		<?php
}}
$connection->close();
?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->
	<?php 
	// include footer
	//include 'views/admin/footer.php';
	?>
<!-- Custom Theme No Scroller Scripts -->
					<script src="<?php echo $url; ?>/themes/admin/assets/js/custom-no-scroller.js"></script>

	</body>

	</html>