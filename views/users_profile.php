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

$get_user = $_GET["name"]; 

			//Load user details
 $connect_user_details = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_user_details = "SELECT * FROM users_details WHERE user_id = '".$get_user."'";
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
								<h3>Hi</h3>
								<p>Welcome to at the profile. This is all about the selected user.</p>
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
			

		
        
        
		</div>
    </div>
	


	
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Personal info</h3><br><br>
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <?php echo $row_user_details["first_name"]; ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <?php echo $row_user_details["last_name"]; ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Gender:</label>
          <div class="col-lg-8">

			   <?php echo $row_user_details["gender"];?>
          </div>
        </div>
       
        <div class="form-group">
          <label class="col-lg-3 control-label">Birthday:</label>
          <div class="col-lg-8">
            <div class="ui-select">
             <?php echo $row_user_details['date_of_birth'] ?>
            </div>
          </div>
     </div>
		
		
		

		<div class="form-group">
			<label class="col-lg-3 control-label">Place of living:</label>
          <div class="col-lg-8">
         <?php echo $row_user_details['location'] ?>
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Country:</label>
            <div class="col-lg-8">
                        <?php echo $row_user_details["country"];?>
                  
          </div>
        </div>
		
		<div class="form-group">
          <label class="col-lg-3 control-label">Website URL:</label>
          <div class="col-lg-8">
           <?php echo $row_user_details['website'] ?>
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Facebook:</label>
          <div class="col-lg-8">
          <?php echo $row_user_details['facebook'] ?>
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-3 control-label">Twitter:</label>
          <div class="col-lg-8">
          <?php echo $row_user_details['twitter'] ?>
          </div>
        </div>
		
		<div class="form-group">
          <label class="col-lg-3 control-label">Personal description:</label>
          <div class="col-lg-8">
           <?php echo $row_user_details['description'] ?>
          </div>
        </div>
		
		
		
		
		
      
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
                    format: "dd/mm/yyyy"
                });  
            
            });
			
			// When the document is ready
            $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
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