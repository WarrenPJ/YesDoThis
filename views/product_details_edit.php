<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
	include 'views/modules/styling.php';
	include 'views/modules/header.php';

	$get_product_id = $_GET["id"]; 
	
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}


//Update record
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {  
	 


	 
//Convert title to a slug
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST["title"])));

$title = $_POST["title"];
$short_description = $_POST["short_description"];
$description = addslashes($_POST['description']);
$funding_goal = $_POST["funding_goal"];
$video_file = $_POST["video_file"];
$category = $_POST["category"];
$video_url = $_POST["video_url"];
$location = $_POST["location"];
$country = $_POST["country"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$complete_status = $_POST["complete_status"];
$active = $_POST["active_status"];
$author = $_SESSION['user_name'];

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


	 
	 

//Generate unique product urls
//SQL Query
$sql_product_slug = "SELECT post_url,id FROM product WHERE post_url = '".$slug."'";
$results_product_slug = $connection->query($sql_product_slug);

if ($results_product_slug->num_rows > 0) {
    // output data of each row
	
$unique_slug = uniqid("".$slug."-");

$sql = "UPDATE product SET title = '".$title."',short_description = '".$short_description."',description = '".$description_html."',funding_goal = '".$funding_goal."',category = '".$category."',post_url = '".$unique_slug."' WHERE id = '".$_GET['id']."' AND author = '".$_SESSION['user_name']."'"; 
	 if ($connection->query($sql) === TRUE) {
	 }
	
}
    else{
     
			//Do not exisist so create the item
				 
$sql = "UPDATE product SET title = '".$title."',short_description = '".$short_description."',description = '".$description_html."',funding_goal = '".$funding_goal."',category = '".$category."',post_url = '".$slug."' WHERE id = '".$_GET['id']."' AND author = '".$_SESSION['user_name']."'"; 
	 if ($connection->query($sql) === TRUE) {
	 }
			
    }
	 
	 
	 
	 
	 
	 
	 

	 

//Get last insert ID
$last_id = $connection->insert_id;

//Upload image

	 
//Check user ID
$sql_user_details = "SELECT user_id FROM users WHERE user_name = '".$_SESSION['user_name']."'";
$result_user_details = mysqli_query($connection, $sql_user_details); 	  

//Start of the loop
if(mysqli_num_rows($result_user_details) > 0)  
{  
 while($row_user_details = mysqli_fetch_array($result_user_details))  
 { 
//echo $row_user_details['user_id'];
//echo $_SESSION['user_name'];

//Check if folder exist for user ID
if (!file_exists("files_public/upload/".$row_user_details['user_id']."")) {
    mkdir("files_public/upload/".$row_user_details['user_id']."", 0777, true);
	mkdir("files_public/upload/".$row_user_details['user_id']."/images", 0777, true);
}
	 
?>
	
 
	 
	<?php 
	 
	 
}

	
//End update records	

?>

	
	

<?php 

}} 


// SQL Query
$sql = "SELECT * FROM product WHERE id = '".$get_product_id."' AND author = '".$_SESSION['user_name']."'"; 
$results = $connection->query($sql);


if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
?>
	
	
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Edit your project</h3>
								<p>Make every change you like right here.</p>
							</div>
						</li>
					</ul>
				</div>
			</section>	
				<!--FlexSlider-->
					<link rel="stylesheet" href="<?php echo $url; ?>/themes/views/css/flexslider.css" type="text/css" media="screen" />
					<script defer src="<?php echo $url; ?>/themes/views/js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
			<!--End-slider-script-->
		</div>
	</div>
<!-- //banner1 -->
<!-- contact -->
	<div class="contact">
		<div class="container">
			<h3>Edit your project</h3>
			<div class="contact-grid">
			
			
		
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
			
<div class="container">
<div class="row">
	

  <form role="form" action="" method="post" id="uploadAjaxImage" enctype="multipart/form-data">
    <div class="col-lg-12">
		<?php
//If product is active date cannot be changed anymore
if ($row[complete_status] != 'not_started') {
?>	
	<a href="#" class="btn btn-danger" role="button">Project is started and may not be changed</a>
<?php } ?>
			
<?php
//If product is active date cannot be changed anymore
if ($row[complete_status] == 'not_started') {
?>	

	<?php
						if ($row["active"] != "yes") {
						?>
				<?php 	echo '<a href="';
		echo $url;	
		echo '/product_details_edit.php?active=';
		echo $row["id"];
		echo '&id=';
		echo $get_product_id;
		echo '" class="btn btn-danger">';
		?>
				<i class="fa fa-remove"></i> Not active </a>

				<?php
						} else {
							?>


					<?php 	echo '<a href="';
		echo $url;	
		echo '/product_details_edit.php?deactive=';
		echo $row["id"];
		echo '&id=';
		echo $get_product_id;
		echo '" class="btn btn-success">';
		?>
					<i class="fa fa-check"></i> Active </a>

					<?php
						}
																					 
																					 

//Make  active
   if($_GET['active']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['active']);
$sql = "UPDATE product SET active = '".$active_status_yes."' WHERE id = '".$active."' AND active = '".$active_status_no."' AND author = '".$_SESSION['user_name']."'";

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


//Make  deactive
   if($_GET['deactive']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['deactive']);
$sql = "UPDATE product SET active = '".$active_status_no."' WHERE id = '".$active."' AND active = '".$active_status_yes."' AND author = '".$_SESSION['user_name']."'";

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
																					 
						?>		

						
		<?php
//If product is active date cannot be changed anymore
if ($row[complete_status] == 'not_started') {
?>	
			<a href="<?php echo $url;?>/product_details_date.php?id=<?php echo $row["id"];?>" class="btn btn-warning" role="button">Change dates</a>
			<a href="<?php echo $url;?>/product_details_image.php?id=<?php echo $row["id"];?>" class="btn btn-success" role="button">Change image</a>

			

<br><br>



	
<?php
	//Get all pledges
	//Count number of funders
	
	
$sql_pledges = "SELECT * FROM product_pledge WHERE product_id = '".$get_product_id."' AND author = '".$_SESSION['user_name']."'"; 
$result_pledges = mysqli_query($connection, $sql_pledges); 	  

//Start of the loop
if(mysqli_num_rows($result_pledges) > 0)  
{  
$counter = 0;
 while($row_pledges = mysqli_fetch_array($result_pledges))  
 { 


 $counter++; // or $counter = $counter + 1;

?>

<a href="<?php echo $url;?>/product_details_edit_pledge.php?id=<?php echo $row_pledges["id"];?>" class="btn btn-info" role="button">Manage reward <?php echo $counter; ?></a>





	

	  
<?php }} ?>	  


<?php
$query_pledge_results = $connection->query("SELECT COUNT(*) FROM `product_pledge` WHERE product_id = '".$get_product_id."' AND author = '".$_SESSION['user_name']."'");
$row_count_pledge = $query_pledge_results->fetch_row();


				if ($row_count_pledge[0] < "5") { 
					?><a href="<?php echo $url;?>/product_create_pledge.php?id=<?php echo $row["id"];?>&product=<?php echo $get_product_id;?>" class="btn btn-primary" role="button">Create your next reward</a><?php
					
				}
?>

			<?php } ?>
			
<?php } ?>			


	  <br><br>
      <div class="form-group">
        <label for="InputName">Your project title</label>
        <div class="input-group">
          <input type="text" class="form-control" name="title" id="InputName" value="<?php echo $row[title]; ?>" required>
          <span class="input-group-addon"></span></div>
      </div>
	
	
	
	
      <div class="form-group">
		  <label for="InputEmail">Short project description</label>
        <div class="input-group">
          <input type="text" class="form-control" id="InputEmail" name="short_description" value="<?php echo $row[short_description]; ?>" required  >
          <span class="input-group-addon"></span></div>
      </div>
      <div class="form-group">
        <label for="InputMessage">Project details</label>
        <div class="input-group">



<textarea class="summernote" id="summernote" name="description" rows="18"><?php echo html_entity_decode($row["description"]); ?>
					</textarea>

			
				<!--<div class="summernote"></div>
				
					<textarea class="resizable_textarea form-control" name="description" placeholder="Enter your product description here..."><?php echo htmlspecialchars($row["description"]); ?></textarea>-->
			<span class="input-group-addon"></span>	</div>
			</div>			
			
	   <div class="form-group">
		  <label for="InputEmail">Category</label>
        <div class="input-group">
          <select class="form-control" name="category">
						
						<?php
						
//Make second connection to get all categories
$sql_video_category = "SELECT * FROM product_category ORDER BY category ASC";
$results_video_category = $connection->query($sql_video_category);
						
						
						
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
          <span class="input-group-addon"></span></div>
      </div>
	  
	  
<script>
	//Numbers only
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
	  
	   <div class="form-group">
		  <label for="InputEmail">Goal for funding</label>
        <div class="input-group">
          <input type="text" class="form-control" id="InputEmail" name="funding_goal" value="<?php echo $row[funding_goal]; ?>" required onkeypress="return isNumber(event)" >
          <span class="input-group-addon"></span></div>
      </div>
	
	
			
	

 		<?php
//If product is active date cannot be changed anymore
if ($row[complete_status] == 'not_started') {
?>	     
     <!-- <input type="submit" name="submit" id="submit" value="Save your project" class="btn btn-info pull-right">-->
			 <input type="submit" name="submit_btn_personal_details" value="Update your project" class="btn btn-info pull-right" />
<?php } ?>
    </div>
  </form>
 
</div>

</div>			
	 <br><br>		
			
			
			
			</div>	</div>
			

	
		</div>
	</div>
<!-- //contact -->


<?php 
																					}}
	
// include footer
include 'views/modules/footer.php';
?>