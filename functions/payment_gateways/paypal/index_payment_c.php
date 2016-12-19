<?php
 require_once('config.php');
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

$url = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$dir;												?>

		<form class="form-horizontal" role="form" id="paypalForm" method="post" action="<?php echo $paypal_url; ?>">
			<input type="hidden" name="business" value="<?php echo $paypal_account; ?>">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="credits" value="510">
			<input type="hidden" name="userid" value="1">
			<input type="hidden" name="cpp_header_image" value="">
			<input type="hidden" name="no_shipping" value="1">
			<input type="hidden" name="handling" value="0">
			<input type="hidden" name="cancel_return" value="<?php echo $url; ?>/payment_c.php?type=cancel">
			<input type="hidden" name="return" value="<?php echo $url; ?>/payment_c.php?type=success">

			<input type="hidden" class="form-control" name="amount" placeholder="Enter Amount" required="required" value="<?php echo $price_membership_c; ?>">
			<input type="hidden" class="form-control" name="quantity" placeholder="Enter Quantity" value="1" required="required">
			<input type="hidden" class="form-control" name="currency_code" placeholder="Enter Currency Type" value="<?php echo $selected_currency; ?>" required="required">
			<input type="hidden" class="form-control" name="item_name" placeholder="Order coins" value="Order coins">

			
			<input type="image" src="<?php echo $url; ?>/functions/payment_gateways/paypal/images/paypal-button.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		

		</form>