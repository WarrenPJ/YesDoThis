<?php
//Check admin permissions
include 'functions/admin_check_permissions.php';
 
// include header, menu and top navigation
include 'views/admin/header.php';
include 'views/admin/menu.php';
include 'views/admin/navigation.php';
?>

<?php
	if ($test_state =="active") {
?>
<style>
button.tip.btn.upload-btn {
    display: none !important;
}

a.tip-left.edit-button.rename-file-paths.rename-file {
    display: none !important;
}

a.tip-left.erase-button.delete-file {
    display: none !important;
}
	
</style>

	
<?php	
}
?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>All your media files <small></small></h3>
				</div>


			</div>

			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Manage your media files and image previews <small>Only mp4 files are allowed for videos</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<iframe name="display" width="100%" height="80%" frameborder="0" marginwidth="0" marginheight="0" src="<?php echo $url; ?>/libraries/responsivefilemanager/filemanager/dialog.php?akey=<?php echo $private_secretkey; ?>"></iframe>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- /page content -->

	<?php 
	// include footer
	//include 'views/admin/footer.php';
	?>


	</body>

	</html>