<?php
//Check admin permissions
include 'functions/admin_check_permissions.php';
 
// include header, menu and top navigation
include 'views/admin/header.php';
include 'views/admin/menu.php';
include 'views/admin/navigation.php';

// include result count function
include 'functions/admin/result_count.php';
?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">

			<div class="page-title">
				<div class="title_left">
					<h3>Email Recurring Message <small>Manage your recurring emails</small></h3>
				</div>


			</div>

			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Inbox <small>Recurring Mail</small></h2>

							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-sm-3 mail_list_column">
									<button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button>
									<!-- Get latest row -->
									<?php

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}
					
//Get last ID if no get is available
$sql_last = "SELECT * FROM inbox WHERE to_id = '".$_SESSION['user_name']."' ORDER BY id DESC LIMIT 0, 1";
$results_last = $connection->query($sql_last);
 if ($results_last->num_rows > 0) {
   while($row_last = $results_last->fetch_assoc()) {	


//echo $row_last['id'];


   ?>

										<?php


					echo '<a href="';
					echo $url;	
					echo '/admin_inbox.php?id=';
					echo $row_last['id'];
					echo '" class="btn btn-sm btn-warning btn-block">';
					?>

											INBOX MESSAGES</a>

											<?php }}

   ?>

											<?php 
									include 'functions/admin/inbox_latest_messages_recurring.php';
									?>


								</div>
								<!-- /MAIL LIST -->

								<!-- CONTENT MAIL -->
								<div class="col-sm-9 mail_view">

									<?php 
									include 'functions/admin/inbox_overview_recurring.php';
									?>


								</div>
								<!-- /CONTENT MAIL -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->



	<!-- compose -->
	<div class="compose col-md-6 col-xs-12">
		<div class="compose-header">
			New Message
			<button type="button" class="close compose-close">
          <span>×</span>
        </button>
		</div>

		<?php 
									include 'functions/admin/inbox_compose.php';
									?>

	</div>
	<!-- /compose -->

	<style>
		textarea {
			width: 100%;
			height: 250px;
		}
	</style>


	<!-- Bootstrap -->
	<script src="<?php echo $url; ?>/themes/admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo $url; ?>/themes/admin/assets/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?php echo $url; ?>/themes/admin/assets/vendors/nprogress/nprogress.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?php echo $url; ?>/build/js/custom.min.js"></script>


	<!-- compose -->
	<script>
		$('#compose, .compose-close').click(function() {
			$('.compose').slideToggle();
		});
	</script>>
	<!-- /compose -->


	<?php 
	// include footer
	//include 'views/admin/footer.php';
	?>
<script src="<?php echo $url; ?>/themes/admin/assets/js/custom-no-scroller.js"></script>

	</body>

	</html>