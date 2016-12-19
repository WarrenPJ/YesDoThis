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

	<style>
		.icon {
			margin-top: 15px !important;
		}
		/** Mobile media query to hide boxes on small devices **/
		
		@media only screen and (max-width: 767px),
		only screen and (max-device-width: 767px) {
			.lower_income {
				display: none;
			}
		}
	</style>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="row top_tiles">
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-sign-in"></i></div>
						<div class="count">
							<?php
						if ($row_count_users[0] < "1") {
							echo "0";
						} else {
							echo $row_count_users[0];
						}
						?>
						</div>
						<h3>Sign ups</h3>
						<p></p>
					</div>
				</div>
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-star-o"></i></div>
						<div class="count">
							<?php
					if ($row_count_video[0] < "1") {
						echo "0";
					} else {
						echo $row_count_video[0];
					}
					?>
						</div>
						<h3>Products online</h3>
						<p></p>
					</div>
				</div>
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-thumbs-o-up"></i></div>
						<div class="count">
							<?php
					if ($row_count_likes[0] < "1") {
						echo "0";
					} else {
						echo $row_count_likes[0];
					}
					?>
						</div>
						<h3>Blogs online</h3>
						<p></p>
					</div>
				</div>
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-credit-card"></i></div>
						<div class="count">
							<?php
					if ($row_count_payments[0] < "1") {
						echo "0";
					} else {
						echo $row_count_payments[0];
					}
					?>
						</div>
						<h3>Payments</h3>
						<p></p>
					</div>
				</div>
			</div>


			<style>
				.icon {
					margin-top: 15px !important;
				}
				/** Mobile media query to hide boxes on small devices **/
				
				@media only screen and (max-width: 1300px),
				only screen and (max-device-width: 1300px) {
					.hide_income_bar {
						display: none;
					}
					.hide_geo_map {
						display: none;
					}
				}
			</style>

			<div class="row">
				<div class="col-md-12">

					<div class="hide_income_bar">
						<div class="x_panel">
							<div class="x_title">
								<div class="lower_income">
									<!--<h2>Income stats <small>Weekly total</small></h2>--></div>


							</div>
						</div>

						<div class="x_content">
							<div class="col-md-9 col-sm-12 col-xs-12">
								<div class="demo-container" style="height:280px">
									<!--<div id="placeholder33x" class="demo-placeholder"></div>-->

									<?php
						//Load line chart weekly income
						include 'libraries/googlecharts/line_chart_weekly_income.php';
						?>


								</div>


							</div>

							<div class="col-md-3 col-sm-12 col-xs-12">
								<div>
									<div class="x_title">
										<h2>Latest Profiles</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="admin_manage_users.php">Manage users</a>
													</li>
												</ul>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<ul class="list-unstyled top_profiles scroll-view">
										<?php
						// include latest profile information
						include 'functions/admin/users_latest_profiles.php';
						?>


									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>



			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="hide_geo_map">
					<div class="x_panel">
						<div class="x_title">
							<h2>Visitors location <small>geo-presentation</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="dashboard-widget-content">


								<?php
						//Load geo chart to show visitors
						include 'libraries/googlecharts/geo_chart_visitors.php';
						?>
							</div>
						</div>
					</div>
				</div>
			</div>




			<div class="row">
				<div class="col-md-4">
					<div class="x_panel">
						<div class="x_title">
							<h2>Most Recent <small>Products</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="admin_products.php">Manage products</a>
										</li>
									</ul>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<?php
						//Load most viewed movies
						include 'functions/admin/products_most_recent.php';
						?>

						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="x_panel">
						<div class="x_title">
							<h2>Most Recent <small>News</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="admin_news.php">Manage news</a></li>
									</ul>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<?php
						//Load most viewed series
						include 'functions/admin/news_most_recent.php';
						?>


						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="x_panel">
						<div class="x_title">
							<h2>Latest Payments <small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="admin_user_invoice_overview.php">Manage payments</a></li>
									</ul>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<?php
						//Load latest payments
						include 'functions/admin/payments_latest.php';
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
	?>


	</body>

	</html>