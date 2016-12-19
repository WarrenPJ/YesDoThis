<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}


?>


		<!-- Login layout -->

		<!DOCTYPE html>
		<html>

		<head>
			<title>Login to your account</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<script type="application/x-javascript">
				addEventListener("load", function() {
					setTimeout(hideURLbar, 0);
				}, false);

				function hideURLbar() {
					window.scrollTo(0, 1);
				}
			</script>
			<link href="themes/login/css/style.css" rel='stylesheet' type='text/css' />
			<!--webfonts-->
			<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
			<!--//webfonts-->
		</head>

		<body>
			<!--SIGN UP-->
			<h1>Login now</h1>
			<div class="login-form">
				<div class="top-form">
					<h2>Login</h2>
					<!--
				<ul class="top-sc-icons">
					<li><a href="#" class="facebook"><img src="themes/login/images/fb.png" /> </a></li>
					<li><a href="#" class="twitter"><img src="themes/login/images/tw.png" /> </a></li>
					<li><a href="#" class="gp"><img src="themes/login/images/gp.png" /> </a></li>
				</ul>
				-->
					<div class="clear"> </div>
				</div>
				<div class="bottom-form">
					<div class="form-top">


					

						
						<!-- form -->
						


	<form method="post" action="login.php" name="loginform">
		
	<?php
	if ($test_state =="active") {
?>
							<input class="wow fadeInRight" data-wow-delay="0.5s" type="text" value="demo" name="user_name" required/>
							<input class="wow fadeInRight" data-wow-delay="0.5s" type="password" value="password" name="user_password" required/>

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
							<input class="wow fadeInRight" data-wow-delay="0.5s" type="text" placeholder="Username" name="user_name" required/>
							<input class="wow fadeInRight" data-wow-delay="0.5s" type="password" placeholder="Password" name="user_password" required/>
			
<?php } ?>	
		


							<input class="wow fadeInLeft" data-wow-delay="0.5s" type="submit" name="login" value="LOGIN NOW" />
						</form>




						
						
						
					

					</div>
					<div class="sign-up">
						<p>No account yet?<a href="register.php">Register</a></p><br>
						<p>Lost password?<a href="password_reset.php">Click here</a></p>
					</div>
				</div>
			</div>
			<div class="copyrights">
			
						<?php
					

					// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}
 // SQL Query

$sql = "SELECT * FROM settings_general WHERE id = '0' AND hide_copyright = 'no'";
$results = $connection->query($sql);
 
 if ($results->num_rows > 0) {

while($row = $results->fetch_assoc()) {


	?>
		<p>Template by <a href="http://w3layouts.com" rel="nofollow">w3layouts</a></p>

						<?php }} ?>			
				
			</div>
		</body>

		</html>
		<!--/SIGN UP-->

		<!-- /Login layout -->