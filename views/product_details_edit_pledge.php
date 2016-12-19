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
$description = $_POST["description"];
$price = $_POST["price"];
$delivery_date = $_POST["delivery_date"];
$pledge_id = $_POST["pledge_id"];

$originalDate = $delivery_date;
$newDate = date("Y-m-d", strtotime($originalDate));
//echo $newStartDate;


	//Replace divs
$description_a = str_replace( '<div>', '', $description );
$description_b = str_replace( '</div>', '', $description_a );
$description_c = str_replace( '<div', '', $description_b );
$description_d = str_replace( '</div', '', $description_c );

//HTML entry for description
$description_html = htmlentities($description_d);
//echo $_POST["video_file"];

	 
$sql = "UPDATE product_pledge SET title = '".$title."',description = '".$description_html."',price = '".$price."' WHERE id = '".$_GET['id']."' AND author = '".$_SESSION['user_name']."'"; 
	 if ($connection->query($sql) === TRUE) {
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

	 
?>
<script type='text/javascript'>
		window.location = "product_details_edit_pledge_date.php?id=<?php echo $_GET['id']; ?>&user=<?php echo $row_user_details['user_id']; ?>&product=<?php echo $pledge_id; ?>";
	</script>	
	<?php 
	 
	 
}

	
//End update records	

?>

	
	

<?php 

}} 


// SQL Query
$sql_pledge = "SELECT * FROM product_pledge WHERE id = '".$get_product_id."' AND author = '".$_SESSION['user_name']."'"; 
$results_pledge = $connection->query($sql_pledge);


if ($results_pledge->num_rows > 0) {
    // output data of each row
    while($row_pledge = $results_pledge->fetch_assoc()) {
?>
	
	
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Manage your reward</h3>
								<p>Here you can update your rewards.</p>
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
			<h3>Edit your reward</h3>
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
  <input type="hidden" name="pledge_id" value="<?php echo $row_pledge[product_id]; ?>">
    <div class="col-lg-12">
	<a href="<?php echo $url;?>/product_details_edit.php?id=<?php echo $row_pledge[product_id]; ?>" class="btn btn-primary" role="button">Back to the project</a>
		

	<a href="<?php echo $url;?>/product_details_edit_pledge.php?id=<?php echo $row_pledge[id]; ?>&remove=<?php echo $row_pledge[id]; ?>" class="btn btn-danger" role="button">Remove reward</a>		
			<br><br>

			
<?php
//Delete news rows in database
   if($_GET['remove']!=""):
    extract($_GET);
    $id = $connection->real_escape_string($_GET['remove']);
    $connection->query("DELETE FROM product_pledge WHERE id='$id' AND author = '".$_SESSION['user_name']."'");

?>
	<script type='text/javascript'>
		window.location = "<?php echo $url;?>/product_details_edit.php?id=<?php echo $row_pledge[product_id]; ?>";
	</script>

		<?php
endif;
																												 ?>
			

      <div class="form-group">
        <label for="InputName">Your reward title</label>
        <div class="input-group">
          <input type="text" class="form-control" name="title" id="InputName" value="<?php echo $row_pledge[title]; ?>" required>
          <span class="input-group-addon"></span></div>
      </div>
      <div class="form-group">
        <label for="InputMessage">Description of the reward</label>
        <div class="input-group">
<textarea class="form-control" id="summernote" name="description" rows="18"><?php echo $row_pledge[description]; ?></textarea>
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
		  <label for="InputEmail">Amount for reward</label>
        <div class="input-group">
          <input type="text" class="form-control" id="InputEmail" name="price" value="<?php echo $row_pledge[price]; ?>" required onkeypress="return isNumber(event)" >
          <span class="input-group-addon"></span></div>
      </div>
	  <div class="form-group">
			<!--<span id='loading' ><img src="ajax-loader.gif" /></span>-->
			
	
	
      
     <!-- <input type="submit" name="submit" id="submit" value="Save your project" class="btn btn-info pull-right">-->
			 <input type="submit" name="submit_btn_personal_details" value="Save and move to your reward date" class="btn btn-info pull-right" />
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