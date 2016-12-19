<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}

	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	?>


<!-- banner -->
	<div class="banner">
		<div class="banner-left">
			<h1>Find funding for your dream</h1>
			<p>The best solution to help everybody realizing their dreams.</p>
			<div class="more">
				<a href="<?php echo $url; ?>/product_genre.php">Browse the projects</a>
			</div>
		</div>
		<div class="banner-right">
			<div class="banner-right1">
				<img src="<?php echo $url; ?>/themes/views/images/2.jpg" alt=" " class="img-responsive" />
				<div class="banner-right-hov">
					<h2>Search</h2>
					
					<form action="<?php	
					echo $url;	
					echo '/search.php';
					?>" method="GET">
					<input type="text" name="search" placeholder="What are you looking for?" required="">
					<input type="submit" value="Go">
				</form>

				</div>
			</div>
			<div class="banner-right1">
				<img src="<?php echo $url; ?>/themes/views/images/3.jpg" alt=" " class="img-responsive" />
				<div class="banner-right1-text">
					<p>Share the love with your friends online. Because sharing is caring</p>
					<ul>
						<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" class="facebook"> </a></li>
						<li><a href="https://twitter.com/home?status=<?php echo $url; ?>" target="_blank" class="twitter"> </a></li>
						<li><a href="https://plus.google.com/share?url=<?php echo $url; ?>" target="_blank" class="g"> </a></li>
						<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $website_title; ?>&summary=&source=" target="_blank" class="in"> </a></li>
					</ul>
				</div>	
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<h3>Check the most populair projects!</h3>
			<p class="eveniet">Get inspired with the most active and populair projects running now.</p>
			<div class="banner-bottom-grids">
			
			<!-- Show populair projects -->
			
			

			
<?php
//Prevent text to a limit
function softTrim($text, $count, $wrapText='...'){

    if(strlen($text)>$count){
        preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    }else{
        $wrapText = '';
    }
    return $text . $wrapText;
}	
	
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// Load most recent videos with large information
$active = "yes";
// SQL Query
$sql = "SELECT * FROM product WHERE active = '".$active."' ORDER BY views DESC LIMIT 0, 3";
$result = $connection->query($sql);
//Loop through and echo all the records

while ($row = $result->fetch_assoc()){
//Loop with style is started
;

$image_path = "<img src=\"" . $url."/files_public/upload/" . $row["image"]."\" class=\"img-responsive-style\" alt=\"\">";

?>						

				<style>
				img.img-responsive-style {
    min-height: 200px !important;
					max-height: 200px !important;
					 min-width: 350px !important;
					max-width: 350px !important;
					padding-top: 25px;
}

				</style>

	<div class="col-md-4 banner-bottom-grid">
	
	<?php
	//Check if SEO links are required
	if ($seo_status == "yes") {
    ?>
	
		<?php 	echo '<a href="';
				echo $url;	
				echo '/product/';
				echo $row["post_url"];
				echo '" class="hvr-shutter-out-horizontal"';
				echo '>';
		?>
	
	<?php
	} if ($seo_status == "no") {
	?>
	
		<?php 	echo '<a href="';
			echo $url;	
				echo '/product_details.php?id=';
				echo $row["id"];
				echo '" class="hvr-shutter-out-horizontal"';
				echo '>';
		?>
	
	<?php
	}
	?>
	

			<?php echo $image_path; ?>
			<div class="captn">
				<h4><?php echo softTrim($row["title"], 10); ?></h4>
				<p><?php echo softTrim($row["short_description"], 75); ?></p>
			</div>
		</a>
	</div>

<?php
//End the loop
}

?>
			
			<div class="clearfix"> </div><br>		
			
			
<?php
// Load information
$active = "yes";
// SQL Query
$sql = "SELECT * FROM product WHERE active = '".$active."' ORDER BY views DESC LIMIT 3, 6";
$result = $connection->query($sql);
//Loop through and echo all the records

while ($row = $result->fetch_assoc()){
//Loop with style is started
;

$image_path = "<img src=\"" . $url."/files_public/upload/" . $row["image"]."\" class=\"img-responsive-style\" alt=\"\">";

?>						


	<div class="col-md-4 banner-bottom-grid">
	<?php
	//Check if SEO links are required
	if ($seo_status == "yes") {
    ?>
	
		<?php 	echo '<a href="';
				echo $url;	
				echo '/product/';
				echo $row["post_url"];
				echo '" class="hvr-shutter-out-horizontal"';
				echo '>';
		?>
	
	<?php
	} if ($seo_status == "no") {
	?>
	
		<?php 	echo '<a href="';
			echo $url;	
				echo '/product_details.php?id=';
				echo $row["id"];
				echo '" class="hvr-shutter-out-horizontal"';
				echo '>';
		?>
	
	<?php
	}
	?>
			<?php echo $image_path; ?>
			<div class="captn">
				<h4><?php echo softTrim($row["title"], 10); ?></h4>
				<p><?php echo softTrim($row["short_description"], 75); ?></p>
			</div>
		</a>
	</div>

<?php
//End the loop
}
$connection->close();
?>			
			

			
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- traveller -->
	<div class="traveller">
		<div class="container">
			<h3>Our latest users</h3>
			<p class="velit">Follow the dream of our latest users.</p>
			
			
	<style>
			img.img-responsive-profiles {
    height: 125px;
}
			</style>		
			
			<div class="wmuSlider example1">
			   <div class="wmuSliderWrapper">
					 
	<?php
 
					 
// Load most recent videos with large information
$active = "yes";
$empty = "";
// SQL Query
			 
			//Load user details
 $connect_user_profile = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_user_profile = "SELECT * FROM users_details WHERE profile_image != '".$empty."' ORDER BY id DESC LIMIT 0, 5";
 $result_user_profile = mysqli_query($connect_user_profile, $sql_user_profile); 	  


									//Start of the loop
									if(mysqli_num_rows($result_user_profile) > 0)  
									{  
									
										 while($row_user_profile = mysqli_fetch_array($result_user_profile))  
										 {  
											 
$image_path = "<img src=\"" . $url."/files_public/upload/" . $row_user_profile["profile_image"]."\" class=\"img-responsive-profiles\" alt=\"\">";

											 
											 
?>	
					 
					<article style="position: absolute; width: 100%; opacity: 0;"> 
						<div class="banner-wrap">
							<div class="traveller-info">
								<div class="traveller-info-left">
									<h4><?php echo $row_user_profile[first_name]; ?> <?php echo $row_user_profile[last_name]; ?></h4>
									<p><?php echo softTrim($row_user_profile["description"], 200); ?></p>
								</div>
								<div class="traveller-info-right">
									<?php echo $image_path; ?>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</article>
					 
<?php }} ?>					 
					 
			
				</div>
			</div>
					<script src="<?php echo $url; ?>/themes/views/js/jquery.wmuSlider.js"></script> 
					<script>
						$('.example1').wmuSlider();         
					</script> 	
		</div>
	</div>
<!-- //traveller -->
<!-- what-we-do -->
	<div class="what-we-do" id="about">
		<div class="container">
			<h3>Get surprised</h3>
			<p class="eveniet">We have what you are looking for. Even if you didn't know. Find more about it at our latest blog posts.</p>
			<div class="what-we-do-grids">
				<div class="what-we-do-grid-left">
<style>
					div.what-we-do-grid-right1.text {
    margin-top: -3px;
}
</style>
	
		<?php				 
// Load most recent videos with large information
$active = "yes";
$empty = "";
// SQL Query
			 
			//Load blog news details
 $connect_news = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_news = "SELECT * FROM news WHERE active = '".$active."' ORDER BY id DESC LIMIT 0, 1";
 $result_news = mysqli_query($connect_news, $sql_news); 	  


									//Start of the loop
									if(mysqli_num_rows($result_news) > 0)  
									{  
									
										 while($row_news = mysqli_fetch_array($result_news))  
										 {  
											 
$image_path = "<img src=\"" . $url."/files/" . $row_news["image"]."\" class=\"img-responsive\" alt=\"\">";

$html_output = htmlspecialchars_decode($row_news["description"]);											 
											 
?>					
					<div class="what-we-do-grid-left1">
					
	<?php
		//Check if SEO links are required
	if ($seo_status == "yes") {
    ?>
	
		<a href="<?php echo $url; ?>/news-article/<?php echo $row_news["post_url"]; ?>"><?php echo $image_path; ?></a>
	
	<?php
	} if ($seo_status == "no") {
	?>
	
		<a href="<?php echo $url; ?>/news_article.php?id=<?php echo $row_news["id"]; ?>"><?php echo $image_path; ?></a>
	
	<?php
	}
	?>					
					
						
					</div>					
					
					<div class="what-we-do-grid-right1">
						<h4><?php echo softTrim($row_news["title"], 15); ?></h4>
						<p><?php echo softTrim ($html_output, 150); ?>.</p>

						<div class="more m1">
							<a href="<?php echo $url; ?>/news.php">View archive</a>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				
		<?php }} ?>			
				

				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //what-we-do -->	
	

	<?php 
	include 'views/modules/footer.php';
	?>