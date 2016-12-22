<?php
//Check admin permissions
include 'functions/admin_check_permissions.php';
 
// include header, menu and top navigation
include 'views/admin/header.php';
include 'views/admin/menu.php';
include 'views/admin/navigation.php';
?>

	<!-- page content --> <!-- Test Comment -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Charts <small></small></h3>
				</div>

			</div>

			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Visitor Graph</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<?php
include 'libraries/googlecharts/bar_chart_daily_visits.php';
?>





						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Browsers Pie</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>

								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<?php
include 'libraries/googlecharts/pie_chart.php';
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
	include 'views/admin/footer.php';
	include 'views/admin/charts.php';
	?>


	</body>

	</html>