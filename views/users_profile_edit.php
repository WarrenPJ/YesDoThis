<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	
	
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Update record
if(isset($_POST["submit_btn_personal_details"]))  
 {  

$user_first_name = $_POST["user_first_name"];
$user_last_name = $_POST["user_last_name"];
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

$originaluser_birthday = $user_birthday;
$newBirthDate = date("Y-m-d", strtotime($originaluser_birthday));
//echo $newStartDate;

if($user_email != "")  
{  
$sql = "UPDATE users SET user_email = '".$user_email."' WHERE user_name = '".$_SESSION['user_name']."'";  
if ($connection->query($sql) === TRUE) {	
	}

 } 



      $sql_to_add_favorites = "UPDATE users_details SET first_name = '".$user_first_name."', last_name = '".$user_last_name."', description = '".$user_details."', gender = '".$user_gender."', date_of_birth = '".$newBirthDate."', location = '".$user_location."', country = '".$user_country."', website = '".$user_website."', facebook = '".$user_facebook."', twitter = '".$user_twitter."', paypal = '".$user_paypal."' WHERE user_id = '".$_SESSION['user_name']."'";  
	  ?>
	<meta http-equiv="refresh" content="0">
	<?php
      if(mysqli_query($connection, $sql_to_add_favorites))  
      {  
           //something
      }  
	  
	  
//Get last insert ID
$last_id = $connection->insert_id;

//Upload image

}

	
//End update records	

//Check user ID
$sql_user_details = "SELECT user_id FROM users WHERE user_name = '".$_SESSION['user_name']."'";
$result_user_details = mysqli_query($connection, $sql_user_details); 	  

//Start of the loop
if(mysqli_num_rows($result_user_details) > 0)  
{  
 while($row_user_details = mysqli_fetch_array($result_user_details))  
 { 
//echo $row_user_details['user_id'];
//echo $_SESSION['user_name'];

//Check if folder exist for user ID
if (!file_exists("files_public/upload/".$row_user_details['user_id']."")) {
    mkdir("files_public/upload/".$row_user_details['user_id']."", 0777, true);
	mkdir("files_public/upload/".$row_user_details['user_id']."/images", 0777, true);
}
?>

	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
		$(document).ready(function (e) {
			$("#uploadAjaxImage").on('submit',(function(e) {
				e.preventDefault();
				$("#message").empty();
				$('#loading').show();
					$.ajax({
						url: "<?php echo $url; ?>/files_public/ajax_upload_profile.php?user=<?php echo $row_user_details['user_id']; ?>&last_id=<?php echo $last_id; ?>", // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
							$('#loading').hide();
							$("#message").html(data);
						}
					});
			}));

			// Function to preview image after validation
			$(function() {
				$("#file").change(function() {
					$("#message").empty(); // To remove the previous error message
					var file = this.files[0];
					var imagefile = file.type;
					var match= ["image/jpeg","image/png","image/jpg"];
					if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
					{
						$('#previewing').attr('src','noimage.png');
						$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
						return false;
					}
					else
					{
						var reader = new FileReader();
						reader.onload = imageIsLoaded;
						reader.readAsDataURL(this.files[0]);
					}
				});
			});
			function imageIsLoaded(e) {
				$("#file").css("color","#FFFFFF");
				$('#image_preview').css("display", "block");
				$('#previewing').attr('src', e.target.result);
				$('#previewing').attr('width', '250px');
				$('#previewing').attr('height', '230px');
			};
		});
	</script>	

<?php 

}} 



$get_image_name = $_GET["name"]; 
$get_folder = $_GET["folder"]; 
$image_path = "".$get_folder."/images/".$get_image_name."";

//Check last ID and add the image
$sql_product_id = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
$result_id = mysqli_query($connection, $sql_product_id); 	


if(isset($_GET['name'])) {
    // id  exists
$sql = "UPDATE users_details SET profile_image = '".$image_path."' WHERE user_id = '".$_SESSION['user_name']."'";  

if ($connection->query($sql) === TRUE) {	
	}
}

?>

		<?php
			//Load user details
 $connect_user_details = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_user_details = "SELECT * FROM users_details WHERE user_id = '".$_SESSION['user_name']."'";
 $result_user_details = mysqli_query($connect_user_details, $sql_user_details); 	  


									//Start of the loop
									if(mysqli_num_rows($result_user_details) > 0)  
									{  
										 while($row_user_details = mysqli_fetch_array($result_user_details))  
										 {  
									 
?>

<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Hi <?php echo $row_user_details[first_name]; ?></h3>
								<p>Welcome at your profile. Just select what you like to do today.</p>
							</div>
						</li>

					</ul>
				</div>
			</section>	
				<!--FlexSlider-->
					<link rel="stylesheet" href="<?php echo $url; ?>/themes/views/css/flexslider.css" type="text/css" media="screen" />
					<script defer src="<?php echo $url; ?>/themes/views/js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
			<!--End-slider-script-->
		</div>
	</div>
<!-- //banner1 -->
<!-- contact -->

	
  <form role="form" action="" method="post" id="uploadAjaxImage" enctype="multipart/form-data">
	  
	<div class="contact">
		<div class="container">
			<div class="contact-grid">
			
			
			
		
	<div class="container" style="padding-top: 0px;">
  <div class="row">

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
	  
<?php
	//Check if the thumbnail is external loaded
if( strpos($row_user_details["profile_image"], 'images/') == false ) {
	?>
	<img src="<?php echo $url; ?>/files/<?php echo $row_user_details["profile_image"]; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
	<?php
}

//Check if the thumbnail is on the server
if( strpos($row_user_details["profile_image"], 'images/') == true ) {
	?>
	<img src="<?php echo $url; ?>/files_public/upload/<?php echo $row_user_details["profile_image"]; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
	<?php
	
}
?>	  
	  
	  
	  
        
		<br><br>
		<div id="message"></div>
			
		  <input type="file" name="file" id="file" required />
    <br>
	  <input type="submit" name="submit" id="submit" value="Update profile image" class="btn btn-success pull-left">
				
<?php
$query_funders = $connection->query("SELECT COUNT(*) FROM `product_funders` WHERE user_id = '".$_SESSION['user_name']."'");
$row_count_funders = $query_funders->fetch_row();


				if ($row_count_funders[0] > "0") { 
					?>	<br><br>	
	<a href="<?php echo $url; ?>/users_donation_overview.php" role="button" class="btn btn-warning pull-left">My donated projects</a><?php
					
				}
?>					
				
			
	<br><br>	
				
	<a href="<?php echo $url; ?>/users_profile_password.php" role="button" class="btn btn-danger pull-left">Change password</a>
	<br><br>		
    <a href="<?php echo $url; ?>/users_profile_finance.php" role="button" class="btn btn-info pull-left">Manage Finance</a>    
    <br><br>	    
		</div>
    </div>
	
	</form>
	<form name="submit_form" method="post">

	
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3><a href="<?php echo $url; ?>/users_profile_edit.php">Personal info</a> 
				


<?php
$query_pledge_results = $connection->query("SELECT COUNT(*) FROM `product` WHERE author = '".$_SESSION['user_name']."'");
$row_count_pledge = $query_pledge_results->fetch_row();


				if ($row_count_pledge[0] > "0") { 
					?>| <a href="<?php echo $url; ?>/users_product.php">My Projects</a><?php
					
				}
?>				
				
				 </h3>
			
			
			<br><br>
			
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Enter your firstname" name="user_first_name" type="text" value="<?php echo $row_user_details["first_name"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Enter your lastname" name="user_last_name" type="text"  value="<?php echo $row_user_details["last_name"]; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Gender:</label>
          <div class="col-lg-8">

			    <select id="selectbasic" name="user_gender" class="form-control">
				
				<?php
				if ($row_user_details["gender"] != "") {
						?>
						<option selected="selected"><?php echo $row_user_details["gender"];?></option>
						<?php
						} else {
							?>
						<option disabled selected>Choose option</option>
						<?php
						}
						?>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_email" value="<?php echo $_SESSION['user_email'] ?>" type="email" placeholder="<?php echo $_SESSION['user_email'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Birthday:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <input  type="text" class="form-control" placeholder="click to show datepicker" name="user_birthday" id="example1" value="<?php echo $row_user_details['date_of_birth'] ?>" required>
            </div>
          </div>
     </div>
		
		
		

		<div class="form-group">
			<label class="col-lg-3 control-label">Place of living:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Where do you live?" value="<?php echo $row_user_details['location'] ?>" name="user_location" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Country:</label>
            <div class="col-lg-8">
                             <select id="country" name="user_country" class="form-control">
							 				<?php
												if ($row_user_details["country"] != "") {
						?>
						<option selected="selected"><?php echo $row_user_details["country"];?></option>
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
          <label class="col-lg-3 control-label">Website URL:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Do you have a website? (optional)" value="<?php echo $row_user_details['website'] ?>" name="user_website" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Facebook:</label>
          <div class="col-lg-8">
            <input class="form-control"placeholder="Do you have Facebook? (optional)" value="<?php echo $row_user_details['facebook'] ?>" name="user_facebook" type="text">
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Twitter:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="Do you have a Twitter? (optional)" value="<?php echo $row_user_details['twitter'] ?>" name="user_twitter" type="text">
          </div>
        </div>
		<!--
		<div class="form-group">
          <label class="col-lg-3 control-label">PayPal:</label>
          <div class="col-lg-8">
            <input class="form-control" placeholder="To get your payouts" value="<?php echo $row_user_details['paypal'] ?>" name="user_paypal" type="email">
          </div>
        </div>
		-->
				
		<div class="form-group">
          <label class="col-lg-3 control-label">Personal description:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" placeholder="Enter some details about yourself" value="<?php echo $row_user_details['description'] ?>" name="user_details">
          </div>
        </div>
		
		
		
		
		
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
		  <br>
            
			    <input type="submit" name="submit_btn_personal_details" value="Save changes" class="btn btn-success" />
			</form>
			
            <span></span>
  
          </div>
        </div>
      </form>
    </div>
  </div>
</div>		
			
			<?php
	  			//End of the loop
			}  
			}  
			?>
			

		<!-- Bootstrap CSS and bootstrap datepicker CSS used for styling the demo pages-->
        <link rel="stylesheet" href="<?php echo $url; ?>/themes/views/js/datepicker/css/datepicker.css">
        <link rel="stylesheet" href="<?php echo $url; ?>/themes/views/js/datepicker/css/bootstrap.css">
		
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="<?php echo $url; ?>/themes/views/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo $url; ?>/themes/views/js/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });
			
			// When the document is ready
            $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });
        </script>
		<!-- End bootstrap -->			
			
			
			
		
			</div>
		</div>
	</div>
<!-- //contact -->

<?php 
// include footer
include 'views/modules/footer.php';
?>