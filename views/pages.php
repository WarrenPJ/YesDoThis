<?php  
 $connect = mysqli_connect($servername, $username, $password, $dbname);   
 $post_url = $_GET["post_url"];  
 $get_page_id = $_GET["id"]; 
 
 	//Check if SEO links are required
	if ($seo_status == "yes") {
			$sql = "SELECT * FROM pages WHERE post_url = '".$post_url."'"; 
	} if ($seo_status == "no") {
			$sql = "SELECT * FROM pages WHERE id = '".$get_page_id."'"; 
	}
  
 $result = mysqli_query($connect, $sql); 

	include 'functions/count_page_views.php';
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	?>

	<?php  
	//Start of the loop
	//Get the video path with correct domain information
	if(mysqli_num_rows($result) > 0)  
	{  
	while($row = mysqli_fetch_array($result))  
	{  

	$video_id    = $row['id'];

	?>
	
<!-- single -->
<div class="single-page-agile-main">
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="<?php echo $url; ?>/index.php">Home</a></li>
				
				  <li class="active"><?php echo $row["title"]; ?></li>
				</ol>
			</div>
<style>
img.news_thumbs {
    width: 100%;
    height: 350px;
}
</style>			
			
<?php
$html_description =  html_entity_decode($row["description"]);	
?>			
			
			
				<div class="agileinfo-news-top-grids">
					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="wthree-news-left-img">
								<h4><?php echo $row["title"]; ?></h4>
								
								<div class="w3-agile-news-text">
									<p><?php echo html_entity_decode($row["description"]); ?>
									</p>
								</div>
								<div class="s-author">
									<br>
								</div>
								<div id="fb-root"></div>
								<div class="news-shar-buttons">
								
								<style>
								div.share {
									margin-top: -120px;
								}

								</style>							
															
								<script type="text/javascript">var switchTo5x=true;</script>
								<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
								<script type="text/javascript">stLight.options({publisher: "<?php echo $sharethis; ?>", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>							
															
								<span class='st_facebook_large' displayText='Facebook'></span>
								<span class='st_twitter_large' displayText='Tweet'></span>
								<span class='st_linkedin_large' displayText='LinkedIn'></span>
								<span class='st_pinterest_large' displayText='Pinterest'></span>
								<span class='st_email_large' displayText='Email'></span>
								</div>
								
							</div>
						</div>

						<div class="news-related">
							
						</div>
					</div>
					<div class="col-md-4 wthree-news-right">
						<!-- news-right-top -->
						<div class="news-right-top">
							<div class="wthree-news-right-heading">
								<h3>Related pages</h3>
							</div>
							<div class="wthree-news-right-top">
								<div class="news-grids-bottom">
									<!-- date -->
									<div id="design" class="date">
										<div id="cycler">  <br>


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
$conn_news = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_news->connect_error) {
die("Connection failed: " . $conn_news->connect_error);
}
// SQL Query
$active = "yes";
$sql_news = "SELECT * FROM pages WHERE active = '".$active."' ORDER BY row_order ASC LIMIT 0, 99";
$result_news = $conn_news->query($sql_news);
//Loop through and echo all the records
while ($row = $result_news->fetch_assoc()){
//Loop with style is started

?>


				
											<div class="date-text">
											
	<?php
		//Check if SEO links are required
		if ($seo_status == "yes") {
    ?>
	
	<?php 	echo '<a href="';
	echo $url;	
	echo '/pages/';
	echo $row["post_url"];
	echo '"';
	echo '>';
	?>
	
	<?php
	} if ($seo_status == "no") {
	?>

	<?php 	echo '<a href="';
	echo $url;	
	echo '/pages.php?id=';
	echo $row["id"];
	echo '"';
	echo '>';
	?>	
			

	<?php
	}
	?>												
											
											
												<?php echo softTrim($row["title"], 15); ?></a>
											
											</div>
											
					

<?php
//End the loop
}
$conn_news->close();
?>										
										
									

										</div>
		
									</div>
									<!-- //date -->
								</div>
							</div>
						</div>
						<!-- //news-right-top -->
			
					</div></div></div><br><br><br><br><br><br><br><br><br>
					<div class="clearfix"> </div>
				</div>	
	
	<?php
	
	//End of the loop
	}  
	}  
	?>


<?php 
// include footer
include 'views/modules/footer.php';
?>