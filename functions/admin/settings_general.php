<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Check if source is in demo mode


if(isset($_POST["submit"])){


$title = $_POST["title"];
$description = $_POST["description"];
$contact_email = $_POST["contact_email"];
$secret_key = $_POST["secret_key"];
$logo = $_POST["selectedImage"];
$tvshows = $_POST["tvshows"];
$user_id = "1";
$hide_copyright = $_POST["hide_copyright"];
$subdomain = $_POST["subdomain"];
$sharethis = $_POST["sharethis"];
$disqus = $_POST["disqus"];
$seo = $_POST["seo_status"];
	
	if ($test_state =="not_active") {
$sql = "UPDATE settings_general SET title = '".$title."',description = '".$description."',contact_email = '".$contact_email."',secret_key = '".$secret_key."',logo = '".$logo."',subdomain = '".$subdomain."',hide_copyright = '".$hide_copyright."',sharethis = '".$sharethis."',disqus = '".$disqus."',seo = '".$seo."'";

$sql_admin = "UPDATE users SET user_email = '".$contact_email."' WHERE user_id = '".$user_id."'";

include 'functions/admin/create_filemanager_config.php';

//Create FTP config file with updated secret key
$myfile = fopen("libraries/responsivefilemanager/filemanager/config/config.php", "w") or die("Unable to open file!");
$txt = $header_config;
fwrite($myfile, $txt);
$txt = $subdomain;
fwrite($myfile, $txt);
$txt = $header_config_second;
fwrite($myfile, $txt);
$txt = $secret_key;
fwrite($myfile, $txt);
$txt = $footer_config;
fwrite($myfile, $txt);
fclose($myfile);

	//Check if SEO links are required
	if ($seo == "yes") {

		//Create htaccess file for url rewrites
		include 'functions/admin/create_htaccess_file.php';

		$myfile_htaccess = fopen(".htaccess", "w") or die("Unable to open file!");
		$txt_htaccess = $full_htaccess_config;
		fwrite($myfile_htaccess, $txt_htaccess);
		fclose($myfile_htaccess);

	}
	
	if ($seo == "no") {

		//Create htaccess file for url rewrites
		include 'functions/admin/create_empty_htaccess_file.php';

		$myfile_htaccess = fopen(".htaccess", "w") or die("Unable to open file!");
		$txt_htaccess = $full_htaccess_config;
		fwrite($myfile_htaccess, $txt_htaccess);
		fclose($myfile_htaccess);

	}
}

if ($connection->query($sql) === TRUE) {
if ($connection->query($sql_admin) === TRUE) {
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
}}

else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $connection->error."');</script>";
}}
//End update records

// SQL Query
$sql = "SELECT * FROM settings_general";
$results = $connection->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
		
?>

		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

			<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Website Title <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="title" value="<?php echo $row["title"];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Website Description <span class="required">*</span></label>
				<div class="col-md-8">
					<textarea class="resizable_textarea form-control" name="description" placeholder="Enter your website description here..."><?php echo htmlspecialchars($row["description"]); ?></textarea>
				</div>
			</div>
			<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Admin Email Address <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="contact_email" value="<?php echo $row["contact_email"];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>

			<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Unique Secure Key <span class="required">*</span>
                        </label>
				<div class="col-md-8">
				
<?php
	if ($test_state =="active") {
		?>
<input type="text" name="secret_key" placeholder="Disabled in demo mode" id="first-name" required="required" class="form-control col-md-7 col-xs-12">

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input type="text" name="secret_key" value="<?php echo $row["secret_key"];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
			
<?php } ?>				
				
				
					
				</div>
			</div>
			
			<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Enter your subdomain <span class=""></span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="subdomain" value="<?php echo $row["subdomain"];?>" placeholder="(optional if you are using a subdomain, like /my/subdomain)" id="first-name"  class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			
			<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Enter ShareThis account <span class=""></span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="sharethis" value="<?php echo $row["sharethis"];?>" placeholder="(optional if you like to use sharethis.com)" id="first-name"  class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			
			<div class="form-group">

				<label class="control-label col-md-2" for="first-name">Enter Disqus account <span class=""></span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="disqus" value="<?php echo $row["disqus"];?>" placeholder="(optional if you like to use disqus.com)" id="first-name"  class="form-control col-md-7 col-xs-12">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2">Enable SEO links <span class="required">*</span></label>
				<div class="col-md-8">
					<select class="form-control" name="seo_status">
						<?php
						if ($row["seo"] != "") {
						?>
						<option selected="selected"><?php echo $row["seo"];?></option>
						<?php
						} else {
							?>
						<option disabled selected>Choose option</option>
						<?php
						}
						?>

						<option value="yes">Yes</option>
						<option value="no">No</option>
						 </select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-md-2">Hide W3layouts copyright <span class="required">*</span></label>
				<div class="col-md-8">
					<select class="form-control" name="hide_copyright">
						<?php
						if ($row["hide_copyright"] != "") {
						?>
						<option selected="selected"><?php echo $row["hide_copyright"];?></option>
						<?php
						} else {
							?>
						<option disabled selected>Choose option</option>
						<?php
						}
						?>

						<option value="yes">Yes</option>
						<option value="no">No</option>
						 </select>
				</div>
			</div>



			</div>

			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-13">
					<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_settings_general.php';
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
			
<?php } ?>	<br />
				</div>
			</div>

		</form>

		<?php
}}
$connection->close();
?>