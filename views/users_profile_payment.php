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
								<p>Select the amount of coins you like to have.</p>
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
<!-- pricing table -->

<link href="<?php echo $url; ?>/themes/pricing/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
<!--start-pricing-tablel-->
<script src="<?php echo $url; ?>/themes/pricing/js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo $url; ?>/themes/pricing/js/modernizr.custom.53451.js"></script> 

 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>							
 <div class="pricing-plans">
 
	 
 
 <?php
 // SQL Query
$sql = "SELECT * FROM settings_payment";
$results = $connection->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

$price_membership = $row["price_membership"];
$price_membership_b = $row["price_membership_b"];
$price_membership_c = $row["price_membership_c"];

$number_of_coins = $row["number_of_coins"];
$number_of_coins_b = $row["number_of_coins_b"];
$number_of_coins_c = $row["number_of_coins_c"];

$selected_currency = $row["currency"];


	}}
?>
 
<style>
div.price-head {
    margin-left: 200px;
    padding-top: 30px;
}

div.pricing-grids {
    margin-top: 30px;
}


	 </style> 
 
 
					 <div class="wrap">
						 <div class="price-head">You need coins before you can donate. Each <?php echo $selected_currency; ?> is equal to 1 coin. Please make your selection to start.		 	</div>
						<div class="pricing-grids">
<div class="pricing-grid2">
							<div class="price-value two">
								<h4>Starter</h4>
								<h3><a href="#small-dialog-membership-b"><i><?php echo $selected_currency; ?></i><span><?php echo $price_membership; ?></span></a></h3>
								<h5>Suitable for starters</h5>								
							</div>
							<div class="price-bg">
							<ul>
								<li class="whyt"><img src="<?php echo $url; ?>/themes/pricing/images/1.png" /><?php echo $number_of_coins; ?> coins</li>
								<li><img src="<?php echo $url; ?>/themes/pricing/images/2.png" />for start donations.</li>
																<?php 
	// include payment gateways
	include 'functions/payment_gateways/paypal/index.php';
	include 'functions/payment_gateways/stripe/index.php';
	?>
							</ul>

							</div>
						</div>
						<div class="pricing-grid2">
							<div class="price-value two">
								<h4>Funder</h4>
								<h3><a href="#small-dialog-membership-b"><i><?php echo $selected_currency; ?></i><span><?php echo $price_membership_b; ?></span></a></h3>
								<h5>Suitable for everybody</h5>								
							</div>
							<div class="price-bg">
							<ul>
								<li class="whyt"><img src="<?php echo $url; ?>/themes/pricing/images/1.png" /><?php echo $number_of_coins_b; ?> coins</li>
								<li><img src="<?php echo $url; ?>/themes/pricing/images/2.png" />for general donations.</li>
																<?php 
	// include payment gateways
	include 'functions/payment_gateways/paypal/index_payment_b.php';
	include 'functions/payment_gateways/stripe/index_payment_b.php';
	?>
							</ul>

							</div>
						</div>
						<div class="pricing-grid3">
							<div class="price-value three">
								<h4>Professional</h4>
								<h3><a href="#small-dialog-membership-c"><i><?php echo $selected_currency; ?></i><span><?php echo $price_membership_c; ?></span></a></h3>
								<h5>For real donations</h5>								
							</div>
							<div class="price-bg">
							<ul>
								<li class="whyt"><img src="<?php echo $url; ?>/themes/pricing/images/1.png" /><?php echo $number_of_coins_c; ?> coins</li>
								<li><img src="<?php echo $url; ?>/themes/pricing/images/2.png" />for real donations.</li>
							<?php 
	// include payment gateways
	include 'functions/payment_gateways/paypal/index_payment_c.php';
	include 'functions/payment_gateways/stripe/index_payment_c.php';
	?>
							</ul>

							</div>
						</div>
							<div class="clear"> </div>
							
<?php
	if ($test_state =="active") {
?>
								<br><br><br>						
	<p class='error'>
		<strong>Testing Card Number</strong> - 4242424242424242<br />
		<strong>Card Expiry Date</strong> - 1234 <br />
		<strong>CVV Number</strong> - 999 <br />

	</p>	
	
<?php	
}
							?>
							
						
							
							
							
							
							
						<div class="clear"> </div>
					</div>
				
				</div>
	<!--//End-pricingplans-->
		<br><br><br>

<?php 
// include footer
include 'views/modules/footer.php';
?>