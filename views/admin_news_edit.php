<?php
//Check admin permissions
include 'functions/admin_check_permissions.php';
 
// include header, menu and top navigation
include 'views/admin/header.php';
include 'views/admin/menu.php';
include 'views/admin/navigation.php';
?>

	<style>
		img.video_image_edit {
			max-width: 350px;
		}
		
		.form-control-serie {
			border-radius: 0;
			width: 100%;
		}
		
		.form-control-serie:focus {
			border-color: #CCD0D7;
			box-shadow: none !important;
		}
		
		.cropper .docs-buttons> .form-control-serie {
			margin-right: 5px;
			margin-bottom: 10px;
		}
		
		.top_search .form-control-serie {
			border-right: 0;
			box-shadow: inset 0 1px 0px rgba(0, 0, 0, 0.075);
			border-radius: 25px 0px 0px 25px;
			padding-left: 20px;
			border: 1px solid rgba(221, 226, 232, 0.49);
		}
		
		.top_search .form-control-serie:focus {
			border: 1px solid rgba(221, 226, 232, 0.49);
			border-right: 0;
		}
		
		select.form-control-serie {
			height: 30px !important;
			padding-left: 12px !important;
		}
	</style>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Edit News Article</h3>
				</div>


			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>News Article Details </h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br />

							<?php
						//Edit video function
						include 'functions/admin/news_edit.php';
					?>


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
<!-- Custom Theme No Scroller Scripts -->
					<script src="<?php echo $url; ?>/themes/admin/assets/js/custom-no-scroller.js"></script>

	</body>

	</html>