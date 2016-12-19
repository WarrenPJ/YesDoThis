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
								<h3>Manage your password</h3>
								<p>You can change your password anytime you need. Right here.</p>
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
			<h3>Manage your password</h3>
			<div class="contact-grid">
			
			
			
			
	<div class="container" style="padding-top: 0px;">
  <div class="row">



    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
	
	
	
<?php session_start();
//include "connect.php"; //connects to the database
if (isset($_POST['user_password_new'])){
	$username = $_SESSION['user_name'];
	$query="SELECT user_email FROM `users` WHERE user_name='$username'";
	$result   = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count=mysqli_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		
		 $user_password  = $_POST['user_password'];
     //$regular_expression = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

		
		$rows=mysqli_fetch_array($result);
		//$pass  =  $rows['user_password_hash'];//FETCHING PASS
		//echo "your pass is ::".($pass)."";
		$to = $rows['user_email'];
		//echo "your email is ::".$email;
		//Details for sending E-mail

		           $activation_key =md5($user_email.time());
                //$salt = 'randomstring'; //generate random string
                //$hashed_value = md5($salt.$user_password);

                $user_password = $_POST['user_password_new'];

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

	$sql = "UPDATE users SET user_password_hash = '".$user_password_hash."' WHERE user_name = '".$username."'";
if ($connection->query($sql) === TRUE) {
	$confirmed = "Password has been changed";
}
		
	}}
?>

<form name="submit_form" method="post">
	<?php echo $confirmed; ?>
	<fieldset class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your new password (min 6 characters)" name="user_password_new" pattern=".{6,}" required autocomplete="off">
	</fieldset>

	<fieldset class="form-group">
		<label for="exampleInputPassword1">Confirm new password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm new password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off">
	</fieldset>

	<input type="submit" name="submit_btn_password" value="Save changes" class="btn btn-success" />
	
	<br><br>	
	<a href="<?php echo $url; ?>/users_profile_edit.php" role="button" class="btn btn-danger pull-left">Back to the profile</a>
	
</form>	
	
	
	

    </div>
  </div>
</div>		
			

			</div>
		</div>
	</div>
<!-- //contact -->

<?php 
// include footer
include 'views/modules/footer.php';
?>