<?php session_start();

//include "connect.php"; //connects to the database
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$query="SELECT user_email FROM `users` WHERE user_email='$username'";
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


			//Check if the user has an activation code already otherwise update the current code
		$query_reset="SELECT * FROM `users_reset` WHERE user_email='$username'";
	$result_reset   = mysqli_query($connection, $query_reset) or die(mysqli_error($connection));
	$count=mysqli_num_rows($result_reset);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
	
		//Update existing row
		$sql = "UPDATE users_reset SET password = '".$user_password_hash."',activation_code = '".$activation_key."' WHERE user_email = '".$username."'";
if ($connection->query($sql) === TRUE) {
}
	
}
		else
		{
			//Insert new row
	      $sqlInsertUser = $connection->query("INSERT INTO users_reset (user_email, password,activation_code) VALUES('$username', '$user_password_hash','$activation_key')");
				
	}		

//Full url
$urlpart = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$urlpart);
$dir = "";
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}
//echo $dir;

$url = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$dir;





		$body='Please verify your email <br/> <br/> <a href="'.$url.'password_reset_confirm.php?key='.$activation_key.'">'.$url.'password_reset_confirm.php?key='.$activation_key.'</a>';
	
		
		
//Load contact email 
		$sql_menu_check = "SELECT contact_email FROM settings_general";
$results_menu_check = $connection->query($sql_menu_check);

if ($results_menu_check->num_rows > 0) {
    // output data of each row
    while($row_menu_check = $results_menu_check->fetch_assoc()) {
		
		

		$from = $row_menu_check["contact_email"];
			
		}}
			
		$subject = "Password recovery request";
		$headers1 = "From: $from\n";
		$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
		$headers1 .= "X-Priority: 1\r\n";
		$headers1 .= "X-MSMail-Priority: High\r\n";
		$headers1 .= "X-Mailer: Just My Server\r\n";
		$sentmail = mail ( $to, $subject, $body, $headers1 );
	} else {
	if ($_POST ['username'] != "") {
	    $fmsg = "Email is not found in our database";
		}
		}
	//If the message is sent successfully, display sucess message otherwise display an error message.
	if($sentmail==1)
	{
		$smsg = "Please check your email to confirm this request.";
	}
		else
		{
		if($_POST['username']!="")
		$nmsg = "Cannot send password to your e-mail address.Problem with sending mail...";
	}
}
?>


<!-- Register layout -->

<!DOCTYPE html>
<html>

<head>
	<title>Reset your password now</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	

<?php
//Full url
$urlpart = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$urlpart);
$dir = "";
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}
//echo $dir;

$url = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$dir;
?>
	
	<link href="<?php echo "" . $url."";?>themes/login/css/style.css" rel='stylesheet' type='text/css' />
	<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<!--//webfonts-->
</head>

<body>
	<!--SIGN UP-->
	<h1>Reset your password now</h1>
	<div class="login-form">
		<div class="top-form">
			<h2>Lost password</h2>
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
				<form class="form-signin" method="POST">

					<?php if(isset($smsg)){ ?>
					<div class="alert alert-success" role="alert">
						<?php echo $smsg; ?> </div>
					<?php } ?>
					<?php if(isset($fmsg)){ ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $fmsg; ?> </div>
					<?php } ?>

					<!-- the user name input field uses a HTML5 pattern check -->

					<input id="login_input_username" placeholder="Email address" class="login_input" type="text" name="username" required />

					<input id="login_input_password_new" placeholder="New password (min. 6 characters)" class="login_input" type="text" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

					<input id="login_input_password_repeat" placeholder="Repeat password" class="login_input" type="text" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
					<br><br>
					<input type="submit" name="register" value="Reset password" />

				</form>

			</div>
			<div class="sign-up">
				<p>New Here?<a href="index.php">Sign Up</a></p>
			</div>
		</div>
	</div>
	<div class="copyrights">
	<p>
	
	

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
		Template by <a href="http://w3layouts.com" rel="nofollow">w3layouts</a>

						<?php }} ?>
	
	</p>
	
		
	</div>
</body>

</html>
<!--/SIGN UP-->

<!-- /Register layout -->

