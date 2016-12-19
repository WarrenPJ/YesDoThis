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
?>
	
	
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Create your new project</h3>
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
	  <input type="hidden" name="folder_id" value="<?php echo $_GET["user"]; ?>">
	  <input type="hidden" name="product_id" value="<?php echo $_GET["id"]; ?>">
    </form>
 
 
 

 
</div>

</div>			
	 <br><br>		
		<a href="<?php echo $url; ?>/product_details_edit.php?id=<?php echo $_GET['id']; ?>" role="button" class="btn btn-info pull-right">Now create your rewards</a>
			
  
			
			
			</div>	</div>
			

	
		</div>
	</div>
<!-- //contact -->


<?php 

	
// include footer
include 'views/modules/footer.php';
?>