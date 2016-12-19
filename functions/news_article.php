<!-- single -->
<div class="single-page-agile-main">
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="<?php echo $url; ?>/index.php">Home</a></li>
					<li><a href="<?php echo $url; ?>/news.php">Archive</a></li>
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
$image_path = "<img src=\"" . $url."/files/" . $row["image"]."\" class=\"news_thumbs\"  alt=\"\">";

$html_description =  html_entity_decode($row["description"]);	
?>			
			
			
				<div class="agileinfo-news-top-grids">
					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="wthree-news-left-img">
								<?php echo $image_path; ?><br><br>
								<h4><?php echo $row["title"]; ?></h4>
								<div class="s-author">
									<p>Posted By <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $row["author"]; ?></a> &nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row["date"]; ?> &nbsp;&nbsp;</p>
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
								<div class="w3-agile-news-text">
									<p><?php echo html_entity_decode($row["description"]); ?>
									</p>
								</div>
							</div>
						</div>
						<!-- agile-comments -->
						<div class="agile-news-comments">
							<div class="agile-news-comments-info">
							
							<!-- Disqus code -->
							<div id="disqus_thread"></div>
							<script>

								var disqus_config = function () {
									this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
									this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
								};

								(function() {  // DON'T EDIT BELOW THIS LINE
									var d = document, s = d.createElement('script');
									
									s.src = '//<?php echo $disqus; ?>.disqus.com/embed.js';
									
									s.setAttribute('data-timestamp', +new Date());
									(d.head || d.body).appendChild(s);
								})();
							</script>
							<noscript>Please enable JavaScript to view the comments.</a></noscript>

							<!-- /Disqus code -->
								
							</div>
						</div>
						<!-- //agile-comments -->
						<div class="news-related">
							
						</div>
					</div>
					<div class="col-md-4 wthree-news-right">
						<!-- news-right-top -->
						<div class="news-right-top">
							<div class="wthree-news-right-heading">
								<h3>Updated News</h3>
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
$sql_news = "SELECT * FROM news ORDER BY id DESC LIMIT 0, 10";
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
	echo '/news-article/';
	echo $row["post_url"];
	echo '"';
	echo '>';
	?>
	
	<?php
	} if ($seo_status == "no") {
	?>

	<?php 	echo '<a href="';
	echo $url;	
	echo '/news_article.php?id=';
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