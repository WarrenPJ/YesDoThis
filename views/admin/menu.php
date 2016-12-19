	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<h3>&nbsp;</h3>
			<ul class="nav side-menu">
				<li>
					<?php
					echo '<a href="';
					echo $url;	
					echo '/admin.php';
					echo '">';
					?>
						<i class="fa fa-home"></i> Home </a>
				</li>
				<li>
					<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_manage_users.php';
					echo '">';
					?>
						<i class="fa fa-users"></i> Users </a>
				</li>
				<li><a><i class="fa fa-desktop"></i> Products <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_products.php';
					echo '">';
					?>
								All products</a>
						</li>
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_products_categories.php';
					echo '">';
					?>
								Manage categories</a>
						</li>
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_products_categories_new.php';
					echo '">';
					?>
								Create new category</a>
						</li>
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_media_files.php';
					echo '">';
					?>Manage your media</a>
						</li>
					</ul>
				</li>
				


				<li><a><i class="fa fa-newspaper-o"></i> News & pages <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_news.php';
					echo '">';
					?>
								All Articles</a>
						</li>
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_news_new.php';
					echo '">';
					?>
								Create news article</a>
						</li>
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_news_categories.php';
					echo '">';
					?>
								Manage categories</a>
						</li>
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_news_categories_new.php';
					echo '">';
					?>
								Create news category</a>
						</li>

			<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_pages.php';
					echo '">';
					?>
								Manage your pages</a>
						</li>
				<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_pages_new.php';
					echo '">';
					?>
								Create pages</a>
						</li>
						
					</ul>
				</li>

				

				
				
				<li>
					<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_charts.php';
					echo '">';
					?>
						<i class="fa fa-bar-chart-o"></i> Charts</a>
				</li>
				<li>

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

						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_inbox.php?id=';
					echo $row_last['id'];
					echo '">';
					?>
								<i class="fa fa-envelope-o"></i> Inbox</a>
						</li>
						<li>

							<?php }}

   ?>


				<li><a><i class="fa fa-money"></i> Finance <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_finance.php';
					echo '">';
					?>
								Income</a>
						</li>
						<li>
							<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_funding_overview.php';
					echo '">';
					?>
								Funding overview</a>
						</li>
					</ul>
				</li>							
							

							<li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li>
										<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_settings_general.php';
					echo '">';
					?>
											General</a>
									</li>
									<li>
										<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_settings_payment.php';
					echo '">';
					?>
											Payments</a>
									</li>
									<li>
										<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_settings_cronjobs.php';
					echo '">';
					?>
											Cronjobs</a>
									</li>
								</ul>
							</li>

		</div>

	</div>
	<!-- /sidebar menu -->

	<!-- /menu footer buttons -->
	<div class="sidebar-footer hidden-small">
		<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_settings_general.php';
					echo '" data-toggle="tooltip" data-placement="top" title="Settings">';
					?>

			<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_finance.php';
					echo '" data-toggle="tooltip" data-placement="top" title="Finance">';
					?>
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
				</a>
				<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_help.php';
					echo '" data-toggle="tooltip" data-placement="top" title="Help">';
					?>
					<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
					</a>
					<?php
					echo '<a href="';
					echo $url;	
					echo '/index.php?logout';
					echo '" data-toggle="tooltip" data-placement="top" title="Logout">';
					?>
						<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
	</div>
	<!-- /menu footer buttons -->
	</div>
	</div>