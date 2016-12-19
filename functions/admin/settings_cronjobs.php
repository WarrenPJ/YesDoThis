<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// SQL Query
$sql = "SELECT * FROM settings_general";
$results = $connection->query($sql);


if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
		
?>
	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

		<div class="form-group">

			<label class="control-label col-md-2" for="first-name">Hourly cron <span class="required">*</span>
                        </label>
			<div class="col-md-8">

			
<?php
	if ($test_state =="active") {
?>
<input id="runhour" name="runhour" type="text" value="<?php echo $url; ?>/functions/cronjobs/hour.php?secretpass=disabled-in-demo-mode" class="form-control col-md-7 col-xs-12" />

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input id="runhour" name="runhour" type="text" value="<?php echo $url; ?>/functions/cronjobs/hour.php?secretpass=<?php echo $row["secret_key"];?>" class="form-control col-md-7 col-xs-12" />
			
<?php } ?>			
			

				
				<span class="btn btn-success" onClick="return fieldtoclipboard.copyfield(event, 'runhour')">Copy</span>


				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
				<script type="text/javascript">
					function runhour() {
						$.get("<?php echo $url; ?>/functions/cronjobs/hour.php?secretpass=<?php echo $row["secret_key"];?>");
							return false;
						}
				</script>

				<a href="#" onclick="runhour();" class="btn btn-primary">Run</a>

			</div>
		</div>

		<div class="form-group">

			<label class="control-label col-md-2" for="first-name">Daily cron <span class="required">*</span>
                        </label>
			<div class="col-md-8">

<?php
	if ($test_state =="active") {
?>
<input id="rundaily" name="rundaily" type="text" value="<?php echo $url; ?>/functions/cronjobs/daily.php?secretpass=disabled-in-demo-mode" class="form-control col-md-7 col-xs-12" />

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input id="rundaily" name="rundaily" type="text" value="<?php echo $url; ?>/functions/cronjobs/daily.php?secretpass=<?php echo $row["secret_key"];?>" class="form-control col-md-7 col-xs-12" />
			
<?php } ?>	

				
				<span class="btn btn-success" onClick="return fieldtoclipboard.copyfield(event, 'rundaily')">Copy</span>



				<script type="text/javascript">
					function rundaily() {
						$.get("<?php echo $url; ?>/functions/cronjobs/daily.php?secretpass=<?php echo $row["secret_key"];?>");
							return false;
						}
				</script>

				<a href="#" onclick="rundaily();" class="btn btn-primary">Run</a>

			</div>
		</div>

		<div class="form-group">

			<label class="control-label col-md-2" for="first-name">Send single email <span class="required">*</span>
                        </label>
			<div class="col-md-8">

<?php
	if ($test_state =="active") {
?>
<input id="sendemail" name="sendemail" type="text" value="<?php echo $url; ?>/functions/cronjobs/send_email.php?secretpass=disabled-in-demo-mode" class="form-control col-md-7 col-xs-12" />
	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input id="sendemail" name="sendemail" type="text" value="<?php echo $url; ?>/functions/cronjobs/send_email.php?secretpass=<?php echo $row["secret_key"];?>" class="form-control col-md-7 col-xs-12" />
			
<?php } ?>	

				
				<span class="btn btn-success" onClick="return fieldtoclipboard.copyfield(event, 'sendemail')">Copy</span>

				<script type="text/javascript">
					function sendemail() {
						$.get("<?php echo $url; ?>/functions/cronjobs/send_email.php?secretpass=<?php echo $row["secret_key"];?>");
							return false;
						}
				</script>

				<a href="#" onclick="sendemail();" class="btn btn-primary">Run</a>

			</div>
		</div>

		<div class="form-group">

			<label class="control-label col-md-2" for="first-name">Send bulk email <span class="required">*</span>
                        </label>
			<div class="col-md-8">

<?php
	if ($test_state =="active") {
?>
<input id="sendbulkemail" name="sendbulkemail" type="text" value="<?php echo $url; ?>/functions/cronjobs/send_bulk.php?secretpass=disabled-in-demo-mode" class="form-control col-md-7 col-xs-12" />
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input id="sendbulkemail" name="sendbulkemail" type="text" value="<?php echo $url; ?>/functions/cronjobs/send_bulk.php?secretpass=<?php echo $row["secret_key"];?>" class="form-control col-md-7 col-xs-12" />
			
<?php } ?>	

				
				<span class="btn btn-success" onClick="return fieldtoclipboard.copyfield(event, 'sendbulkemail')">Copy</span>



				<script type="text/javascript">
					function sendbulkemail() {
						$.get("<?php echo $url; ?>/functions/cronjobs/send_bulk.php?secretpass=<?php echo $row["secret_key"];?>");
							return false;
						}
				</script>

				<a href="#" onclick="sendbulkemail();" class="btn btn-primary">Run</a>
			</div>
		</div>



	<!-- JQVMap -->
	<script src="<?php echo $url; ?>/themes/admin/assets/js/fieldtoclipboard.js"></script>

	<?php
}}
$connection->close();
?>