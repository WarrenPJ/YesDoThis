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

$get_image_name = $_GET["name"]; 
$get_folder = $_GET["folder"]; 
$image_path = "".$get_folder."/images/".$get_image_name."";

//Check last ID and add the image
$sql_product_id = "SELECT * FROM product WHERE id = '".$get_product_id."'";
$result_id = mysqli_query($connection, $sql_product_id); 	
if(mysqli_num_rows($result_id) > 0)  
{  
 while($row_id = mysqli_fetch_array($result_id))  
 { 
$last_added_id = $row_id[id];
$sql = "UPDATE product SET image = '".$image_path."' WHERE id = '".$get_product_id."'";

if ($connection->query($sql) === TRUE) {	
	}



 } }

?>

	
	
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Your product is updated</h3>
								<p>You will be redirect to your overview.</p>
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
			<h3>Product is updated</h3>
			<div class="contact-grid">

			
<!-- Summernote -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

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
      <div class="form-group">
        <label for="InputName">Hold on we will forward you to the edit page</label>
        <div class="input-group">
          						<script type='text/javascript'>
		window.location = "<?php echo $url; ?>/product_details_edit.php?id=<?php echo $get_product_id; ?>";
	</script>
          <span class="input-group-addon"></span></div>
      </div>
    
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

	
// include footer
include 'views/modules/footer.php';
?>