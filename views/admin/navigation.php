	<style>
		i.fa.fa-bank {
			margin-top: 9px;
		}
	</style>

	<!-- top navigation -->
	<div class="top_nav">
		<div class="nav_menu">
			<nav>
				<div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				</div>

				<ul class="nav navbar-nav navbar-right">
					<li class="">
						<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo $url; ?>/themes/admin/assets/images/img.jpg" alt="">
							<span class=" fa fa-angle-down"></span>
						</a>
						<ul class="dropdown-menu dropdown-usermenu pull-right">

							<li>
								<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_settings_general.php';
					echo '">';
					?>

									<span>Settings</span>
									</a>
							</li>
							<li>
								<?php
					echo '<a href="';
					echo $url;	
					echo '/admin_help.php';
					echo '">';
					?>Help</a>
							</li>
							<li>
								<?php
					echo '<a href="';
					echo $url;	
					echo '/index.php?logout';
					echo '">';
					?>
									<i class="fa fa-sign-out pull-right"></i> Log Out</a>
							</li>
						</ul>
					</li>

				</ul>
			</nav>
		</div>
	</div>
	<!-- /top navigation -->