<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
$type = "movie"; 
$episode = "1"; 
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	?>

<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Manage All Your Projects</h3>
								<p>No difficult stuff. Just simple clicks and easy management.</p>
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
<!--gallery-->
	<div class="gallery">		
		<div class="container">
			<h3><a href="<?php echo $url; ?>/users_product.php">Your projects</a> | <a href="<?php echo $url; ?>/users_products_status.php">Show donation status</a></h3>
			<div class="top-gallery">
		
				
				

				
				
				<style>
li.blocks {
    padding-right: 55px;
    padding-top: 20px;
    width: 250px;
    height: 200px;
}

img.img-responsive {
    height: 200px;
    width: 250px;
}

				</style>	
			
			
<?php
//Prevent text to a limit
function softTrim($text, $count, $wrapText='...'){

    if(strlen($text)>$count){
        preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    }else{
        $wrapText = '';
    }
    return $text . $wrapText;
}	
	
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// Load most recent videos with large information
$active = "yes";
// SQL Query
$sql = "SELECT * FROM product WHERE author = '".$_SESSION['user_name']."' ORDER BY views DESC LIMIT 0, 999";
$result = $connection->query($sql);
//Loop through and echo all the records

while ($row = $result->fetch_assoc()){
//Loop with style is started
;

$image_path = "<img src=\"" . $url."/files_public/upload/" . $row["image"]."\" class=\"img-responsive\" alt=\"\">";

?>						

				<div class="col-md-3 gallery-grid gallery1">
					<?php 	echo '<a href="';
								echo $url;	
								echo '/product_details_edit.php?id=';
								echo $row["id"];
								echo '" class="swipebox-off"';
								echo '>';
				?>
			<?php echo $image_path; ?>
					
					
			
						<div class="textbox">
							<h4><?php echo softTrim($row["title"], 10); ?></h4>
							<p><?php echo softTrim($row["short_description"], 75); ?></p>
					</div>
					</a>
				</div>
			



<?php
//End the loop
}

?>			
			
			

				<div class="clearfix"> </div>
			</div>		

			<link rel="stylesheet" href="<?php echo $url; ?>/themes/views/css/swipebox.css">
						<script src="<?php echo $url; ?>/themes/views/js/jquery.swipebox.min.js"></script> 
							<script type="text/javascript">
								jQuery(function($) {
									$(".swipebox").swipebox();
								});
							</script>
		</div>
	</div>	
<!--//gallery-->

<?php 
// include footer
include 'views/modules/footer.php';
?>