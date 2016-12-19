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
if(isset($_POST["submit_btn_personal_details"]))  
 {  

$user_first_name = $_POST["user_first_name"];
$user_last_name = $_POST["user_last_name"];
$user_gender = $_POST["user_gender"];
$user_email = $_POST["user_email"];
$user_birthday = $_POST["user_birthday"];
$user_location = $_POST["user_location"];
$user_country = $_POST["user_country"];
$user_website = $_POST["user_website"];
$user_facebook = $_POST["user_facebook"];
$user_twitter = $_POST["user_twitter"];
$user_details = $_POST["user_details"];
$user_paypal = $_POST["user_paypal"];

$originaluser_birthday = $user_birthday;
$newBirthDate = date("Y-m-d", strtotime($originaluser_birthday));
//echo $newStartDate;

if($user_email != "")  
{  
$sql = "UPDATE users SET user_email = '".$user_email."' WHERE user_name = '".$_SESSION['user_name']."'";  
if ($connection->query($sql) === TRUE) {	
	}

 } 



      $sql_to_add_favorites = "UPDATE users_details SET first_name = '".$user_first_name."', last_name = '".$user_last_name."', description = '".$user_details."', gender = '".$user_gender."', date_of_birth = '".$newBirthDate."', location = '".$user_location."', country = '".$user_country."', website = '".$user_website."', facebook = '".$user_facebook."', twitter = '".$user_twitter."', paypal = '".$user_paypal."' WHERE user_id = '".$_SESSION['user_name']."'";  
	  ?>
	<meta http-equiv="refresh" content="0">
	<?php
      if(mysqli_query($connection, $sql_to_add_favorites))  
      {  
           //something
      }  
	  
	  
//Get last insert ID
$last_id = $connection->insert_id;

//Upload image

}

	
//End update records	

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

}} 



$get_image_name = $_GET["name"]; 
$get_folder = $_GET["folder"]; 
$image_path = "".$get_folder."/images/".$get_image_name."";

//Check last ID and add the image
$sql_product_id = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
$result_id = mysqli_query($connection, $sql_product_id); 	
if($get_image_name != "")  
{  
$sql = "UPDATE users_details SET profile_image = '".$image_path."' WHERE user_id = '".$_SESSION['user_name']."'";  
if ($connection->query($sql) === TRUE) {	
	}

 } 
?>

		<?php
			//Load user details
 $connect_user_details = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_user_details = "SELECT * FROM users_details WHERE user_id = '".$_SESSION['user_name']."'";
 $result_user_details = mysqli_query($connect_user_details, $sql_user_details); 	  


									//Start of the loop
									if(mysqli_num_rows($result_user_details) > 0)  
									{  
										 while($row_user_details = mysqli_fetch_array($result_user_details))  
										 {  
									 
?>

<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Hi <?php echo $row_user_details[first_name]; ?></h3>
								<p>Welcome to the financial overview.</p>
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

	
  <form role="form" action="" method="post" id="uploadAjaxImage" enctype="multipart/form-data">
	  
	<div class="contact">
		<div class="container">
			<div class="contact-grid">
			
			
			
		
	<div class="container" style="padding-top: 0px;">
  <div class="row">

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-left">
       
	<a href="<?php echo $url; ?>/users_profile_payment.php"><img src="<?php echo $url; ?>/functions/payment_gateways/paypal/images/paypal-payments.gif"/></a><br><br>
	<a href="<?php echo $url; ?>/users_profile_payment.php"><img src="<?php echo $url; ?>/functions/payment_gateways/stripe/images/secure-payments-stripe.gif"/></a>
	
	  
	<br><br>	
	<a href="<?php echo $url; ?>/users_profile_password.php" role="button" class="btn btn-info pull-left">Change password</a>
	<br><br>	
    <a href="<?php echo $url; ?>/users_profile_edit.php" role="button" class="btn btn-danger pull-left">Back to the profile</a>    
    <br><br>	    
		</div>
    </div>
	
	</form>
	<form name="submit_form" method="post">

	
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Manage your finance </h3><br><br>
        
		<div class="form-group">
          <label class="col-lg-3 control-label">PayPal:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="To get your payouts" value="<?php echo $row_user_details['paypal'] ?>" name="user_paypal" type="email">
          </div>
        </div>
		
		 <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
		  <br>
            
			    <input type="submit" name="submit_btn_personal_details" value="Save changes" class="btn btn-success" />
			</form>
			
            <span></span>
  
          </div>
        </div>
      </form>
	  <br><br><br><br>
		<div class="form-group">
          <label class="col-lg-3 control-label">Current coins:</label>
          <div class="col-lg-8">
            <?php 
	include 'functions/show_number_paid_coins.php';
	?>
	
	<p class="history-text">Coins are required to donate projects. If you like to support, please upgrade your coins first. <br>The price of 1 coin is just <b><?php echo $selected_currency; ?> 1</b><br><br>
          </div>
        </div>

		
		
		
       
    </div>
  </div>
</div>		
			
			<?php
	  			//End of the loop
			}  
			}  
			?>
			

		<!-- Bootstrap CSS and bootstrap datepicker CSS used for styling the demo pages-->
        <link rel="stylesheet" href="<?php echo $url; ?>/themes/views/js/datepicker/css/datepicker.css">
        <link rel="stylesheet" href="<?php echo $url; ?>/themes/views/js/datepicker/css/bootstrap.css">
		
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="<?php echo $url; ?>/themes/views/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo $url; ?>/themes/views/js/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
			
			// When the document is ready
            $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
		<!-- End bootstrap -->			
			
			
			
		
			</div>
		</div>
	</div>
<!-- //contact -->

<?php 
// include footer
include 'views/modules/footer.php';
?>