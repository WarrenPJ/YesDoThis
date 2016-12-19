<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
include 'views/modules/styling.php';
	include 'views/modules/header.php';
	
	
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Update record
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {  
	  



//Get last insert ID
$last_id = $connection->insert_id;



}


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
?>
	
	
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Update your project</h3>
								<p>Your almost done. Just enter the fields below and click save.</p>
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
			<h3>Select your project image</h3>
			<div class="contact-grid">

			
		
			
<div class="container">
<div class="row">
	


  
  
  <!-- Add Dropzone -->
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/libraries/dropzone/css/dropzone.css" />
<script type="text/javascript" src="<?php echo $url; ?>/libraries/dropzone/js/dropzone.js"></script>
  
  <div class="image_upload_div">
	  <form action="<?php echo $url; ?>/files_public/upload_project_image.php" class="dropzone">
	  <input type="hidden" name="folder_id" value="<?php echo $row_user_details['user_id']; ?>">
	  <input type="hidden" name="product_id" value="<?php echo $_GET["id"]; ?>">
    </form>
 
 
 

 
</div>

</div>			
	 <br><br>		
		<a href="<?php echo $url; ?>/product_details_edit.php?id=<?php echo $_GET['id']; ?>" role="button" class="btn btn-info pull-right">Save and go back</a>
			
  
			
			
			</div>	</div>
			

	
		</div>
	</div>
<!-- //contact -->


<?php 
 }}
	
// include footer
include 'views/modules/footer.php';
?>