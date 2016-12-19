<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
$get_pledge = $_GET["pledge"]; 
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
include 'functions/user_check_membership_days.php';

?>

<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Confirm your donation</h3>
								<p>Check the amount below to confirm your donation.</p>
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

			
			
	<?php 
				$sql_pledge = "SELECT * FROM product_pledge WHERE id = '".$get_pledge."'";
$result_pledge = mysqli_query($connect, $sql_pledge); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_pledge) > 0)  
{  
while($row = mysqli_fetch_array($result_pledge))  
{  
	
if(isset($_POST["submit"])){

$product_id = $row["product_id"];
$user_id = $_SESSION['user_name'];
$pledge_id = $row["id"];
$donate_amount = $row["price"];

mysqli_query($connection, "INSERT INTO product_funders 
(`product_id`, `user_id`, `pledge_id`, `total`) VALUES ('".$product_id."','".$user_id."','".$pledge_id."','".$donate_amount."')");
	
//Lower the coin number
mysqli_query($connection, "UPDATE users_membership SET days = days - '".$donate_amount."' WHERE user_id = '".$user_id."'");	
	
//Update funders total count
$sql_pledge_count = "SELECT SUM(total) FROM product_funders WHERE product_id = '".$product_id."'";
$result_pledge_count = mysqli_query($connect, $sql_pledge_count); 
//Start of the loop
if(mysqli_num_rows($result_pledge_count) > 0)  
{  
while($row_count = mysqli_fetch_array($result_pledge_count))  
{  	
	
	 //echo "Total sum". $row_count['SUM(total)'];
	mysqli_query($connection, "UPDATE product_funding SET funded = '".$row_count['SUM(total)']."' WHERE product_id = '".$product_id."'");	
}	}

	
	
//Update funders backers count
$sql_pledge_count_backers = "SELECT COUNT(total) FROM product_funders WHERE product_id = '".$product_id."'";
$result_pledge_count_backers = mysqli_query($connect, $sql_pledge_count_backers); 
//Start of the loop
if(mysqli_num_rows($result_pledge_count_backers) > 0)  
{  
while($row_count_backers = mysqli_fetch_array($result_pledge_count_backers))  
{  	
	
	 //echo "Total sum". $row_count['SUM(total)'];
	mysqli_query($connection, "UPDATE product_funding SET backers = '".$row_count_backers['COUNT(total)']."' WHERE product_id = '".$product_id."'");	
}	}	
	
		
	
$donation_done = "Thank you for your donation!";
?>
	<!--<script type='text/javascript'>
		window.location = "<?php echo $url; ?>/users_donation_overview.php";
	</script>-->
	<?php
}
//End update records
	
?>

<?php
			if ($donation_done != "") {
  ?>
	<div class="contact">
		<div class="container">
			<h3><?php echo $donation_done ?></h3>
			<div class="contact-grid">
			</div></div></div>
				
						<?php
} else {
   ?>
				


<!-- contact -->
	<div class="contact">
		<div class="container">
			<h3>Confirm your donation</h3>
			<div class="contact-grid">
			

<style>
div.col-md-8 {
padding-top: 8px;
}
</style>				
				
							
	<div class="container" style="padding-top: 0px;">
  <div class="row">

    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
     
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
             <div class="form-group">
							 
	
          <label class="col-md-3 control-label">Donate:</label>
          <div class="col-md-8">
           <?php echo $row["price"]; ?> <?php echo $selected_currency; ?>
          </div>
		  
        </div>

		             <div class="form-group">
          <label class="col-md-3 control-label">Reward:</label>
          <div class="col-md-8">
            For this donation you get: <?php echo $row["title"]; ?>
          </div>
		  
        </div>
       
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
						
	<?php
//Check if the user has enough coins to donate
		$query_to_check_existing_membership_days = "SELECT * from users_membership WHERE user_id = '".$_SESSION['user_name']."'";
	$result_membership = $conn_to_check_existing_membership_days->query($query_to_check_existing_membership_days);
		if ($result_membership->num_rows > 0) {
    // output data of each row
		while($row_the_user = $result_membership->fetch_assoc()) {

		if ($row_the_user[days] > $row["price"]) {
		?>
		<input type="submit" class="btn btn-primary" value="Confirm" name="submit" />
		<?php
		} else {
		?>
		You need more coins before you can donate. <br><a href="<?php echo $url; ?>/users_profile_payment.php">Click here to order more coins</a><br><br>
		<?php
		}
		?>

		<?php
		}}
		?>		 						


						
       
            <span></span>
						<a href="javascript:history.go(-1)" class="btn btn-default">Go back</a>
          
          </div>
        </div>
      </form>
    </div>
  </div>
</div>		

			</div>
		</div>
	</div>
<!-- //contact -->

<?php
}
?>	


<?php }} ?>


<?php 
// include footer
include 'views/modules/footer.php';
?>