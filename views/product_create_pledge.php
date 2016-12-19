<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	
$get_product_id = $_GET["product"]; 

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
$description = $_POST["description"];
$price = $_POST["price"];
$delivery_date = $_POST["date"];
$author = $_SESSION['user_name'];


$originalDeliveryDate = $delivery_date;
$newDeliveryDate = date("Y-m-d", strtotime($originalDeliveryDate));
//echo $newStartDate;

	//Replace divs
$description_a = str_replace( '<div>', '', $description );
$description_b = str_replace( '</div>', '', $description_a );
$description_c = str_replace( '<div', '', $description_b );
$description_d = str_replace( '</div', '', $description_c );

//HTML entry for description
$description_html = htmlentities($description_d);
//echo $_POST["video_file"];

	 

	 
mysqli_query($connection, "INSERT INTO product_pledge 
(`title`, `product_id`, `description`, `price`, `author`) 
VALUES ('".$title."','".$get_product_id."','".$description_html."','".$price."','".$author."')");

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

?>
<script type='text/javascript'>
		window.location = "product_create_pledge_date.php?id=<?php echo $_GET['id']; ?>&user=<?php echo $row_user_details['user_id']; ?>&product=<?php echo $last_id; ?>";
	</script>
<?php

	 
}

	
//End update records	

?>

	
	

<?php 

}} 
?>
	
	
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Add rewards to your project</h3>
								<p>Reward your funders with everything you like. Just add your rewards below.</p>
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
			<h3> 

<?php
	//Count number of funders
$query_pledge_results = $connection->query("SELECT COUNT(*) FROM `product_pledge` WHERE product_id = '".$get_product_id."'");
$row_count_pledge = $query_pledge_results->fetch_row();

				if ($row_count_pledge[0] == "0") {
					echo "Create your first reward"; }
				if ($row_count_pledge[0] == "1") {
					echo "Create your second reward"; }
				if ($row_count_pledge[0] == "2") {
					echo "Create your third reward"; }
				if ($row_count_pledge[0] == "3") {
					echo "Create your fourth reward"; }
				if ($row_count_pledge[0] == "4") {
					echo "Create your final reward"; }
				if ($row_count_pledge[0] > "4") {
					echo "Maximum number of reward is created"; 
				?>
									<script type='text/javascript'>
		window.location = "<?php echo $url; ?>/users_product.php";
	</script>
				<?php
				}
	
				
				?>
		

				
				
			
			</h3>
			<div class="contact-grid">

		
			
<div class="container">
<div class="row">
	

  <form role="form" action="" method="post" id="uploadAjaxImage" enctype="multipart/form-data">
    <div class="col-lg-12">
      <div class="form-group">
        <label for="InputName">Your reward title</label>
        <div class="input-group">
          <input type="text" class="form-control" name="title" id="InputName" placeholder="Enter title" required>
          <span class="input-group-addon"></span></div>
      </div>
      <div class="form-group">
		  <label for="InputEmail">Short description of the reward</label>
        <div class="input-group">
          <input type="text" class="form-control" id="InputEmail" name="description" placeholder="Enter a short description" required  >
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
		  <label for="InputEmail">Amount to donate</label>
        <div class="input-group">
          <input type="text" class="form-control" id="InputEmail" name="price" placeholder="Enter your amount" required onkeypress="return isNumber(event)" >
          <span class="input-group-addon"></span></div>
      </div>
	  

		
			

     <!-- <input type="submit" name="submit" id="submit" value="Save your project" class="btn btn-info pull-right">-->
			
			 <input type="submit" name="submit_btn_personal_details" value="Move to the next step" class="btn btn-info pull-right" />
			 <a href="<?php echo $url; ?>/users_product.php" class="btn btn-danger pull-right">Stop creating rewards</a>
    </div>
  </form>
 
</div>

</div>			
	 <br><br>		
			
	<style>
				input.btn.btn-info.pull-right {
    margin-left: 15px;
}

				</style>		
			
			</div>	</div>
	

	
		</div>
	</div>
<!-- //contact -->


<?php 

	
// include footer
include 'views/modules/footer.php';
?>