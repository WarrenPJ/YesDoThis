<?php

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

//Full url
$urlpart = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$urlpart);
$dir = "";
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}
//echo $dir;

$url = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$dir;

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
	//$row['paypal_account']
	$my_paypal = $row['paypal_account'];

// Your test stripe sanbox url, Replace it with live url after successful testing.
$price_membership = $row["price_membership"];
$selected_currency = $row["currency"];
$stripe_account = $row["stripe_account"];

	}}


												?>

	<form action="payment.php" method="POST">
		<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $stripe_account; ?>" data-image="<?php echo $url; ?>/functions/payment_gateways/stripe/images/secure.png" data-name="Membership"
			data-label="Pay with Card" data-description="Order coins" data-locale="auto" data-currency="<?php echo $selected_currency; ?>" data-bitcoin="false" data-amount="<?php echo $price_membership; ?>00" />
		</script>
	</form>

	
	<style>
		.web {
			font-family: tahoma;
			size: 12px;
			top: 10%;
			border: 1px solid #CDCDCD;
			border-radius: 10px;
			padding: 10px;
			width: 45%;
			margin: auto;
			height: auto;
		}
		
		h1,
		h2 {
			margin: 3px 0;
			font-size: 13px;
			text-decoration: underline;
		}
		
		.tLink {
			font-family: tahoma;
			size: 12px;
			padding-left: 10px;
			text-align: center;
		}
		
		.talign_right {
			text-align: right;
		}
		
		.username_availability_result {
			display: block;
			width: auto;
			float: left;
			padding-left: 10px;
		}
		
		.input {
			float: left;
		}
		
		.error {
			color: #FF0000;
			font-size: 12px;
		}
	</style>