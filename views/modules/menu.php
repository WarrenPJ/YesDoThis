<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-nav">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<div class="logo">
							<a class="navbar-brand" href="<?php echo $url; ?>/index.php"><i class="glyphicon glyphicon-fire" aria-hidden="false"></i>
								
								
								<?php echo $website_title; ?></a>
						</div>
					</div>

					<style>
					i.glyphicon.glyphicon-fire {
					display: none;
					}

					a.navbar-brand {
					padding-top: 55px;
					}
					</style>				
					
				<?php
				  //Highlight the menu link if the link is active
					$urlpath = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
					if (strpos($urlpath,'index.php') == true) {
						$home_active_menu = 'active';
					} 
					if (strpos($urlpath,'product_genre') == true) {
						$product_genre_active_menu = 'active';
					} 
					if (strpos($urlpath,'product_create') == true) {
						$product_create_active_menu = 'active';
					} 
					if (strpos($urlpath,'users_profile_edit') == true) {
						$users_profile_edit_active_menu = 'active';
					}
					
							
				   ?>						
					
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					 <ul class="nav navbar-nav">
						<li class="hvr-sweep-to-bottom <?php echo $home_active_menu; ?>"><a href="<?php echo $url; ?>/index.php">Home</a></li>
						<li class="hvr-sweep-to-bottom <?php echo $product_genre_active_menu; ?>"><a href="<?php echo $url; ?>/product_genre.php">Browse</a></li>
						<li class="hvr-sweep-to-bottom <?php echo $product_create_active_menu; ?>"><a href="<?php echo $url; ?>/product_create.php">Start your own project</a></li>
						
						
						<?php
							if(isset($_COOKIE['active'])){
						$cookie = $_COOKIE['active'];

						?>

					
						<li class="hvr-sweep-to-bottom <?php echo $users_profile_edit_active_menu; ?>"><a href="<?php echo $url; ?>/users_profile_edit.php">Profile</a></li>
						<?php
							//Load admin access menu
							include 'functions/admin_show_menu.php';
							?> 
						<li class="hvr-sweep-to-bottom">
						<?php
						echo '<a href="';
						echo $url;	
						echo '/index.php?logout';
						echo '">';
						?>
						Logout</a>
						</li>
						
						
						
						
						<?php

						}
						else{
						// Cookie is not set
						?>


						<li class="hvr-sweep-to-bottom"><a href="<?php echo $url; ?>/login.php">Login</a></li>
						<li class="hvr-sweep-to-bottom"><a href="<?php echo $url; ?>/register.php">Register</a></li>
						<?php
						}

						?>						
						
						
						
					  </ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
<!-- //header -->