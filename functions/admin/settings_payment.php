<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}


	

//Update record
if(isset($_POST["submit"])){

	

$price_membership = $_POST["price_membership"];
$price_membership_b = $_POST["price_membership_b"];
$price_membership_c = $_POST["price_membership_c"];
$number_of_coins = $_POST["number_of_coins"];
$number_of_coins_b = $_POST["number_of_coins_b"];
$number_of_coins_c = $_POST["number_of_coins_c"];
$currency = $_POST["currency"];
$paypal_active = $_POST["paypal_active"];
$paypal_sandbox = $_POST["paypal_sandbox"];
$paypal_account = $_POST["paypal_account"];
$stripe_active = $_POST["stripe_active"];
$stripe_account = $_POST["stripe_account"];
$payout_fee = $_POST["payout_fee"];

//Check if source is in demo mode
if ($test_state =="not_active") {
	
$sql = "UPDATE settings_payment SET paypal_active = '".$paypal_active."',price_membership = '".$price_membership."',price_membership_b = '".$price_membership_b."',price_membership_c = '".$price_membership_c."',currency = '".$currency."',number_of_coins = '".$number_of_coins."',number_of_coins_b = '".$number_of_coins_b."',number_of_coins_c = '".$number_of_coins_c."',paypal_sandbox = '".$paypal_sandbox."',paypal_account = '".$paypal_account."',stripe_active = '".$stripe_active."',stripe_account = '".$stripe_account."',fee = '".$payout_fee."'";
}
if ($connection->query($sql) === TRUE) {

?>
	<script type='text/javascript'>
		window.onload = function() {
			if (!localStorage.justOnce) {
				localStorage.setItem("justOnce", "true");
				window.location.reload();
			}
		}
	</script>
	<?php
}

else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $connection->error."');</script>";
}}
//End update records

// SQL Query
$sql = "SELECT * FROM settings_payment";
$results = $connection->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
		
?>

		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Manage your payment gateway solutions </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />

						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

							<div class="item form-group">
								<label class="control-label col-md-2" for="email">Price for coins (a) <span class="required">*</span>
                        </label>
								<div class="col-md-8">
									<input type="text" id="text" name="price_membership" value="<?php echo $row["price_membership"];?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="item form-group">
								<label class="control-label col-md-2" for="email">Coins per payment (a) <span class="required">*</span>
                        </label>
								<div class="col-md-8">
									<input type="text" id="text" name="number_of_coins" value="<?php echo $row["number_of_coins"];?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>							
							
								<div class="item form-group">
								<label class="control-label col-md-2" for="email">Price for coins (b) <span class="required">*</span>
                        </label>
								<div class="col-md-8">
									<input type="text" id="text" name="price_membership_b" value="<?php echo $row["price_membership_b"];?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="item form-group">
								<label class="control-label col-md-2" for="email">Coins per payment (b) <span class="required">*</span>
                        </label>
								<div class="col-md-8">
									<input type="text" id="text" name="number_of_coins_b" value="<?php echo $row["number_of_coins_b"];?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>							

															<div class="item form-group">
								<label class="control-label col-md-2" for="email">Price for coins (c <span class="required">*</span>
                        </label>
								<div class="col-md-8">
									<input type="text" id="text" name="price_membership_c" value="<?php echo $row["price_membership_c"];?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="item form-group">
								<label class="control-label col-md-2" for="email">Coins per payment cb) <span class="required">*</span>
                        </label>
								<div class="col-md-8">
									<input type="text" id="text" name="number_of_coins_c" value="<?php echo $row["number_of_coins_c"];?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>	
							
							<div class="item form-group">
								<label class="control-label col-md-2" for="email">Payout fee <span class="required">*</span>
                        </label>
								<div class="col-md-8">
									<input type="text" id="text" name="payout_fee" value="<?php echo $row["fee"];?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Select your default currency <span class="required">*</span></label>
								<div class="col-md-8">
									<select class="form-control" name="currency">
						<?php
						if ($row["currency"] != "") {
						?>
						<option selected="selected"><?php echo $row["currency"];?></option>
						<?php
						} else {
							?>
						<option disabled selected>Choose option</option>
						<?php
						}
						?>

						<option value="USD">Dollar</option>
						<option value="EUR">Euro</option>
						<option value="POUND">Pound</option>
						 </select>
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-2 control-label">PayPal
                        </label>
								<div class="col-md-8">
									<div class="checkbox">
										<label>
							
							
							
							<?php if($row['paypal_active'] == "yes"){ ?>
													<input type="hidden" name="paypal_active" value="no">
    <input type="checkbox" name="paypal_active" value="yes" checked="checked">

		
	<?php } ?>

							<?php if($row['paypal_active'] == "no"){ ?>
								<input type="hidden" name="paypal_active" value="no">
    <input type="checkbox" name="paypal_active" value="yes" >
	<?php } ?>	
	
								<?php if($row['paypal_active'] == ""){ ?>
						<input type="hidden" name="paypal_active" value="no">
    <input type="checkbox" name="paypal_active" value="yes" >
	<?php } ?>	

                            </label>
									</div>

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Stripe
                        </label>
								<div class="col-md-8">
									<div class="checkbox">
										<label>
							
														<?php if($row['stripe_active'] == "yes"){ ?>
													<input type="hidden" name="stripe_active" value="no">
    <input type="checkbox" name="stripe_active" value="yes" checked="checked">

		
	<?php } ?>

							<?php if($row['stripe_active'] == "no"){ ?>
								<input type="hidden" name="stripe_active" value="no">
    <input type="checkbox" name="stripe_active" value="yes" >
	<?php } ?>	
	
								<?php if($row['stripe_active'] == ""){ ?>
						<input type="hidden" name="stripe_active" value="no">
    <input type="checkbox" name="stripe_active" value="yes" >
	<?php } ?>	
							
                             
                            </label>
									</div>

								</div>
							</div>
					</div>
				</div>
			</div>

			<!-- Start payment settings -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Payment Details </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />

						<!-- Show if PayPal is active -->
						<?php if($row['paypal_active'] == "yes"){ ?>
						<div class="item form-group">
							<label class="control-label col-md-2" for="email">Your PayPal Email Account <span class="required">*</span>
                        </label>
							<div class="col-md-8">
								<input type="email" id="email" name="paypal_account" value="<?php echo $row["paypal_account"];?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<br> <br>

						<div class="form-group">
							<label class="col-md-2 control-label">Enable Sandbox Mode
                        </label>
							<div class="col-md-8">
								<div class="checkbox">
									<label>

							
							<?php if($row['paypal_sandbox'] == "yes"){ ?>
													<input type="hidden" name="paypal_sandbox" value="no">
    <input type="checkbox" name="paypal_sandbox" value="yes" checked="checked">

		
	<?php } ?>

							<?php if($row['paypal_sandbox'] == "no"){ ?>
								<input type="hidden" name="paypal_sandbox" value="no">
    <input type="checkbox" name="paypal_sandbox" value="yes" >
	<?php } ?>	
	
								<?php if($row['paypal_sandbox'] == ""){ ?>
						<input type="hidden" name="paypal_sandbox" value="no">
    <input type="checkbox" name="paypal_sandbox" value="yes" >
	<?php } ?>	

                            </label>
								</div>

							</div>
						</div>


						<?php } ?>
						<br>
						<!-- Show if Stripe is active -->

						<?php if($row['stripe_active'] == "yes"){ ?>


						<div class="item form-group"><br>
							<label class="control-label col-md-2" for="email">Your Stripe Account <span class="required">*</span>
                        </label>
							<div class="col-md-8">
								<input type="text" id="text" name="stripe_account" value="<?php echo $row["stripe_account"];?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<?php } ?>

						<br><br>
						<div class="form-group">
							<div class="col-md-13">
								<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_settings_payment.php';
					echo '" class="btn btn-primary">';
					?>

									Cancel</a>

<?php
	if ($test_state =="active") {
?>
<input type="submit" class="btn btn-success" value="Save (disabled)" name="" disabled />

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input type="submit" class="btn btn-success" value="Save" name="submit" />
			
<?php } ?><br />
							</div>
						</div>

						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>

		<?php
}}
$connection->close();
?>