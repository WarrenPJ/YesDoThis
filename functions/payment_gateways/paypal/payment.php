<?php
$type = $_GET['type'];
if($type == 'success') {
  //echo "<pre>";
  //print_r($_REQUEST);
 echo "Thank you for your payment. You have upgraded your account now.";
	
	
	//Update membership days if payment complete
$conn_to_update_membership_days = mysqli_connect($servername, $username, $password, $dbname);  
$query_to_update_membership_days = "SELECT * from users_membership WHERE user_id = '".$_SESSION['user_name']."'";

 if ($result_to_update_membership_days=mysqli_query($conn_to_update_membership_days,$query_to_update_membership_days))
  {
   if(mysqli_num_rows($result_to_update_membership_days) > 0)


// SQL Query
$sql = "SELECT * FROM settings_payment";
$results = $conn_to_update_membership_days->query($sql);
	if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {   
	   
$amount = $row['price_membership'];   
$number_of_coins = $row['number_of_coins']; 
$payment_type = "paypal";	   
$datenow = date('Y-m-d');
mysqli_query($conn_to_update_membership_days, "INSERT INTO users_payments 
(`user_id`, `amount`, `payment_type`, `date`) VALUES ('".$_SESSION['user_name']."','".$amount."','".$payment_type."','".$datenow."')");

	   

      $sql_to_membership_days = "UPDATE users_membership SET membership = 'paid', days = days + ".$number_of_coins." WHERE user_id = '".$_SESSION['user_name']."'";  
      if(mysqli_query($conn_to_update_membership_days, $sql_to_membership_days))  
      {  
           //something
		   ?>


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


		<script type="text/javascript">
			<!--
			window.location = "<?php echo $url; ?>/users_profile_finance.php"
				//-->
		</script>
		<?php
      }
  
    {
		//If exist
		if(mysqli_num_rows($result_to_update_membership_days) > 0){
			
		}}}
} }}

if($type == 'cancel') {
  echo "<h1>Payment Canceled</h1>";
}

?>