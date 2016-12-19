<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}


?>

		<!-- Register layout -->

		<!DOCTYPE html>
		<html>

		<head>
			<title>Register your account</title>
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
			<h1>Register your account now</h1>
			<div class="login-form">
				<div class="top-form">
					<h2>Register</h2>
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


						<!-- register form -->
						<form method="post" action="register.php" name="registerform">

							<!-- the user name input field uses a HTML5 pattern check -->

							<input id="login_input_username" placeholder="Username (2 to 64 characters)" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

							<!-- the email input field uses a HTML5 email type check -->
							<input id="login_input_email" placeholder="Email address" class="login_input" type="text" name="user_email" required />

							<input id="login_input_password_new" placeholder="Password (min. 6 characters)" class="login_input" type="text" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

							<input id="login_input_password_repeat" placeholder="Repeat password" class="login_input" type="text" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
							<br><br>
							<input type="submit" name="register" value="Register" />

						</form>

					</div>
					<div class="sign-up">
						<p>You have an account?<a href="index.php">Login</a></p>
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

		<!-- /Register layout -->