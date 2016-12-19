<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
$type = "movie"; 
$episode = "1"; 
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	?>
	<div class="faq">
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					 <li><a href="<?php echo $url; ?>/index.php">Home</a></li>
					  <li class="active">Payment complete</li>
					</ol>
				</div>
				<div class="agileinfo-news-top-grids">
					<div class="col-md-12 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="bs-example bs-example-tabs" role="tabpanel">
								
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home1">
										<div class="wthree-news-top-left">
										

										Payment is complete
										
										<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					
					
				<div class="clearfix"> </div>
				</div>
			</div>
	</div>

	<?php 
	// include styling and video files
	include 'functions/payment_gateways/stripe/payment.php';
	include 'functions/payment_gateways/paypal/payment.php';
	?>


<?php 
// include footer
include 'views/modules/footer.php';
?>