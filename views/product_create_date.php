<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
include 'views/modules/styling.php';
	include 'views/modules/header.php';
	$folder_id = $_GET["user"];	
	
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
	
$sql = "UPDATE product SET 
		start_date = '".$newStartDate."',
		end_date = '".$newEndDate."' WHERE id = '".$_GET['id']."'";
		

//Get last insert ID
$last_id = $connection->insert_id;

if ($connection->query($sql) === TRUE) {


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
		window.location = "product_create_image.php?id=<?php echo $_GET['id']; ?>&user=<?php echo $row_user_details['user_id']; ?>";
	</script>
	<?php
}}}		




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
			<h3>Select your start and end date</h3>
			<div class="contact-grid">

			

			
<div class="container">
<div class="row">
	

  <form role="form" action="" method="post" id="uploadAjaxImage" enctype="multipart/form-data">
  
  
  
    <div class="col-lg-12">

			
	        <div class="form-group">
		<label for="InputName">Project start date</label>
        <div class="input-group">
					 <input class="form-control" id="start_date" name="start_date" placeholder="YYYY/MM/DD" type="text"/>
	
          <span class="input-group-addon"></span></div>
      </div>			
	
			
		        <div class="form-group">
		<label for="InputName">Project end date</label>
        <div class="input-group">
					 <input class="form-control" id="end_date" name="end_date" placeholder="YYYY/MM/DD" type="text"/>
	
          <span class="input-group-addon"></span></div>
      </div>				
			
			
<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

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
			

						

      
     <!-- <input type="submit" name="submit" id="submit" value="Save your project" class="btn btn-info pull-right">-->
			 <input type="submit" name="submit_btn_personal_details" value="Go to the next step" class="btn btn-info pull-right" />
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