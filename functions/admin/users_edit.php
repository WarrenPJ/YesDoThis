<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Update user record
if(isset($_POST["submit"])){

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$admin_permissions = $_POST["admin_permissions"];
$gender = $_POST["gender"];
$date_of_birth = $_POST["date_of_birth"];
$membership_days = $_POST["membership_days"];
$user_gender = $_POST["user_gender"];
$user_email = $_POST["user_email"];
$user_birthday = $_POST["user_birthday"];
$user_location = $_POST["user_location"];
$user_country = $_POST["user_country"];
$user_website = $_POST["user_website"];
$user_facebook = $_POST["user_facebook"];
$user_twitter = $_POST["user_twitter"];
$user_details = $_POST["user_details"];
$user_paypal = $_POST["user_paypal"];
$image = $_POST["selectedImage"];

$originaluser_birthday = $date_of_birth;
$newBirthDate = date("Y-m-d", strtotime($originaluser_birthday));
//echo $newStartDate;


if($user_email != "")  
{  
$sql = "UPDATE users SET user_email = '".$user_email."' WHERE user_name = '".$_GET['id']."'";  
if ($connection->query($sql) === TRUE) {	
	}

 } 

      $sql = "UPDATE users_details SET first_name = '".$first_name."', last_name = '".$last_name."', profile_image = '".$image."', description = '".$user_details."', gender = '".$gender."', date_of_birth = '".$newBirthDate."', location = '".$user_location."', country = '".$user_country."', website = '".$user_website."', facebook = '".$user_facebook."', twitter = '".$user_twitter."', paypal = '".$user_paypal."',admin = '".$admin_permissions."' WHERE user_id = '".$_GET['id']."'";
      $sql = "UPDATE users_details SET first_name = '".$first_name."', last_name = '".$last_name."', profile_image = '".$image."', description = '".$user_details."', gender = '".$gender."', date_of_birth = '".$newBirthDate."', location = '".$user_location."', country = '".$user_country."', website = '".$user_website."', facebook = '".$user_facebook."', twitter = '".$user_twitter."', paypal = '".$user_paypal."',admin = '".$admin_permissions."' WHERE user_id = '".$_GET['id']."'";


$sql_membership = "UPDATE users_membership SET days = '".$membership_days."' WHERE user_id = '".$_GET['id']."'";


if ($admin_permissions != 'no') {

    // Add message with instructions to the inbox

	$subject = "Welcome administrator";
$description = "Hi there,<br><br>Welcome aboard! We are pleased to have you working with us. You were selected for employment due to the attributes that you have displayed that appear to match the qualities we are looking for in a good administrator.";
$send_from_user = "system";

//Format date

$today = date("Y-m-d");
	
	mysqli_query($connection, "INSERT INTO inbox 
(`subject`, `description`, `from_id`, `to_id`, `send_date`) VALUES ('".$subject."','".$description."','".$_SESSION['user_name']."','".$_GET['id']."','".$today."')");
	
} else {

   // Do nothing
   
}

if ($connection->query($sql) === TRUE) {
if ($connection->query($sql_membership) === TRUE) {

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
$sql = "SELECT * FROM users_details WHERE user_id = '".$_GET['id']."'";
$results = $connection->query($sql);

//Make second connection to get membership days
$sql_user_membership = "SELECT * FROM users_membership WHERE user_id = '".$_GET['id']."'";
$results_user_membership = $connection->query($sql_user_membership);

	
//Make third connection to get email account
// SQL Query
$sql_user_email = "SELECT * FROM users WHERE user_name = '".$_GET['id']."'";
$results_user_email = $connection->query($sql_user_email);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {


    while($row_user_email = $results_user_email->fetch_assoc()) {
    while($row_user_membership = $results_user_membership->fetch_assoc()) {		
?>

		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

			<div class="form-group">
				<label class="control-label col-md-2" for="first-name">First Name <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="first_name" id="first-name" value="<?php echo $row["first_name"];?>" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="first-name">Last Name <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" name="last_name" id="first-name" value="<?php echo $row["last_name"];?>" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Gender <span class="required">*</span></label>
				<div class="col-md-8">
					<select class="form-control" name="gender">
                            <option disabled selected>Choose option</option>
                            <option value="male" <?php echo ($row["gender"] == 'male')?"selected":"" ?>>Male</option>
                            <option value="female" <?php echo ($row["gender"] == 'female')?"selected":"" ?>>Female</option>
                          </select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Date Of Birth <span class="required">*</span>
                        </label>
				<div class="col-md-2">

					<!-- Add datepicker code. Note: jquery in the footer is disabled on this page to run the script -->
					<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
					<link rel="stylesheet" href="/resources/demos/style.css">
					<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
					<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
					<script>
						$(function() {
							$("#datepicker").datepicker();
						});
					</script>

					<input id="datepicker" name="date_of_birth" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $row["date_of_birth"];?>" required="required" type="text">
				</div>
			</div>

			<div class="item form-group">
				<label class="control-label col-md-2" for="email">Email <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="email" id="email" name="user_email" value="<?php echo $row_user_email["user_email"];?>" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			</div>
			
			
		<div class="item form-group">
			<label class="col-lg-2 control-label">Place of living:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Where do you live?" value="<?php echo $row['location'] ?>" name="user_location" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Country:</label>
            <div class="col-lg-8">
                             <select id="country" name="user_country" class="form-control">
							 				<?php
												if ($row["country"] != "") {
						?>
						<option selected="selected"><?php echo $row["country"];?></option>
						<?php
						} else {
							?>
						<option disabled selected>(please select a country)</option>
						<?php
						}
						?>
							 
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BA">Bosnia and Herzegowina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Cote d'Ivoire</option>
                            <option value="HR">Croatia (Hrvatska)</option>
                            <option value="CU">Cuba</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="TP">East Timor</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="FX">France, Metropolitan</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard and Mc Donald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran (Islamic Republic of)</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libyan Arab Jamahiriya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macau</option>
                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Reunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint LUCIA</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SK">Slovakia (Slovak Republic)</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SH">St. Helena</option>
                            <option value="PM">St. Pierre and Miquelon</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen Islands</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands (British)</option>
                            <option value="VI">Virgin Islands (U.S.)</option>
                            <option value="WF">Wallis and Futuna Islands</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="YU">Yugoslavia</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                  
          </div>
        </div>
		
		<div class="form-group">
          <label class="col-lg-2 control-label">Website URL:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Do you have a website? (optional)" value="<?php echo $row['website'] ?>" name="user_website" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Facebook:</label>
          <div class="col-lg-8">
            <input class="form-control"placeholder="Do you have Facebook? (optional)" value="<?php echo $row['facebook'] ?>" name="user_facebook" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Twitter:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Do you have a Twitter? (optional)" value="<?php echo $row['twitter'] ?>" name="user_twitter" type="text">
          </div>
        </div>
		
		<div class="form-group">
          <label class="col-lg-2 control-label">PayPal:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="To get your payouts" value="<?php echo $row['paypal'] ?>" name="user_paypal" type="email">
          </div>
        </div>
		
				
		<div class="form-group">
          <label class="col-lg-2 control-label">Personal description:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" placeholder="Enter some details about yourself" value="<?php echo $row['description'] ?>" name="user_details">
          </div>
        </div>		
		
		
			<script>
	//Numbers only
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>


			<div class="form-group">
				<label class="control-label col-md-2" for="first-name">Coins <span class="required">*</span>
                        </label>
				<div class="col-md-8">
					<input type="text" id="first-name" name="membership_days" value="<?php echo $row_user_membership["days"];?>" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Administrator Permissions <span class="required">*</span></label>
				<div class="col-md-8">
					<select class="form-control" name="admin_permissions">
                            <option disabled selected>Choose option</option>
                            <option value="no" <?php echo ($row["admin"] == 'no')?"selected":"" ?>>No</option>
                            <option value="yes" <?php echo ($row["admin"] == 'yes')?"selected":"" ?>>Yes</option>
                          </select>
				</div>
			</div>
			
						<div class="form-group">
				<label class="control-label col-md-2">Select profile image <span class="required">*</span></label>
				<div class="col-md-8">

					<?php
						  include 'functions/admin/videos_image_viewer.php';
						 ?>

				</div>
			</div>
			
			
			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-13">

					<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_manage_users.php';
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
			
<?php } ?>							
						
						<br />
				</div>
			</div>

		</form>

		<?php
	}}}}
$connection->close();
?>