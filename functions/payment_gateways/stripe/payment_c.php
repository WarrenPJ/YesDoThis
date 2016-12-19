<?php 
try {	
	require_once('Stripe/lib/Stripe.php');
	
	
	include 'config/db.php';

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// SQL Query
$sql = "SELECT * FROM settings_payment";
$results = $connection->query($sql);


if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
	//$row['paypal_account']
	$my_paypal = $row['paypal_account'];

// Your test stripe sanbox url, Replace it with live url after successful testing.
$price_membership = $row["price_membership_c"];
$selected_currency = $row["currency"];
$stripe_account = $row["stripe_account"];
//echo $stripe_account;
			
			//Stripe::setApiKey($stripe_account);
			//Stripe::setApiKey("$stripe_account"); //Replace with your Secret Key

	
	Stripe::setApiKey("sk_test_hOU3tomWQEfPf00jLA2k3B91"); //Replace with your Secret Key
		}}

	
	$charge = Stripe_Charge::create(array(
		"amount" => 2500,
		"currency" => "usd",
		"card" => $_POST['stripeToken'],
		"description" => "Order coins"
	));
	//send the file, this line will be reached if no error was thrown above
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
	   
$amount = $row['price_membership_c']; 
$number_of_coins = $row['number_of_coins_c']; 
$payment_type = "stripe";	   
$datenow = date('Y-m-d');
mysqli_query($conn_to_update_membership_days, "INSERT INTO users_payments 
(`user_id`, `amount`, `payment_type`, `date`) VALUES ('".$_SESSION['user_name']."','".$amount."','".$payment_type."','".$datenow."')");


      $sql_to_membership_days = "UPDATE users_membership SET membership = 'paid', days = days + ".$number_of_coins." WHERE user_id = '".$_SESSION['user_name']."'";  
      if(mysqli_query($conn_to_update_membership_days, $sql_to_membership_days))  
      {  
           //something
      }  
  
    {
		//If exist
		if(mysqli_num_rows($result_to_update_membership_days) > 0){
			
		}}}}}
	
	
	//you can send the file to this email:
	//echo $_POST['stripeEmail'];
}

catch(Stripe_CardError $e) {
	
}

//catch the errors in any way you like

catch (Stripe_InvalidRequestError $e) {
  // Invalid parameters were supplied to Stripe's API

} catch (Stripe_AuthenticationError $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)

} catch (Stripe_ApiConnectionError $e) {
  // Network communication with Stripe failed
} catch (Stripe_Error $e) {

  // Display a very generic error to the user, and maybe send
  // yourself an email
} catch (Exception $e) {

  // Something else happened, completely unrelated to Stripe
}

?>