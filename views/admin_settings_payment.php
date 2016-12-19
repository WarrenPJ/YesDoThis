<?php
//Check admin permissions
include 'functions/admin_check_permissions.php';
 
// include header, menu and top navigation
include 'views/admin/header.php';
include 'views/admin/menu.php';
include 'views/admin/navigation.php';
?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Payment Settings</h3>
				</div>


			</div>


			<?php
include 'functions/admin/settings_payment.php';
?>



				<!-- /page content -->
				<?php 
	// include footer
	include 'views/admin/footer.php';
	?>


				</body>

				</html>