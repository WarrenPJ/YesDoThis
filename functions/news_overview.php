<!-- faq-banner -->
	<div class="faq">
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					 <li><a href="<?php echo $url; ?>/index.php">Home</a></li>
					  <li class="active">News</li>
					</ol>
				</div>
				<div class="agileinfo-news-top-grids">
					<div class="col-md-12 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="bs-example bs-example-tabs" role="tabpanel">
								
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home1">
										<div class="wthree-news-top-left">
										







<?php 
$category = $_GET["category"]; 
?>

<style>
img.hvr-shutter-out-horizontal {
    width: 150px;
    height: 170px;
}

	div.col-sm-7.wthree-news-info {
    padding-left: 35px;
}

div.col-md-4.w3-agileits-news-left {
    padding-top: 15px;
}


</style>							

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

//Check for serie. Show show name and start with episode 1 . On details show others.
$active = "yes";
$sql_tv_show_overview = "SELECT * FROM news WHERE active = '".$active."' ORDER BY id DESC";  
$result_tv_show_overview = mysqli_query($connect, $sql_tv_show_overview); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_tv_show_overview) > 0)  
{  
while($row = mysqli_fetch_array($result_tv_show_overview))  
{  

$image_path = "<img src=\"" . $url."/files/" . $row["image"]."\" class=\"hvr-shutter-out-horizontal\" alt=\"\">";
$html_description =  html_entity_decode($row["description"]);
?>		

											<div class="col-md-4 w3-agileits-news-left">
												<div class="col-sm-5 wthree-news-img">
												
	<?php
		//Check if SEO links are required
	if ($seo_status == "yes") {
    ?>
	
		<?php 	echo '<a href="';
			echo $url;	
			echo '/news-article/';
			echo $row["post_url"];
			echo '">';
		?>
	
	<?php
	} if ($seo_status == "no") {
	?>
	
		
		<?php 	echo '<a href="';
			echo $url;	
			echo '/news_article.php?id=';
			echo $row["id"];
			echo '">';
		?>
	
	
	<?php
	}
	?>														
												
													<?php echo $image_path; ?></a>
												</div>
												<div class="col-sm-7 wthree-news-info">
													<h5>
													
	<?php
		//Check if SEO links are required
		if ($seo_status == "yes") {
    ?>
	
		<?php 	echo '<a href="';
			echo $url;	
			echo '/news-article/';
			echo $row["post_url"];
			echo '">';
		?>
	
	<?php
	} if ($seo_status == "no") {
	?>
	
		<?php 	echo '<a href="';
			echo $url;	
			echo '/news_article.php?id=';
			echo $row["id"];
			echo '">';
		?>		

	<?php
	}
	?>														
													
													<?php echo softTrim($row["title"], 15); ?></a></h5>
										
										
													<p><?php echo softTrim ($html_description, 50); ?></p>

												</div>
												<div class="clearfix"> </div>
											</div>

									
		
									
									

<?php
//End of the loop
}  
}  
?>


										
										
					
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				
					
				<div class="clearfix"> </div>
				</div>
			</div>
	</div>	<br><br>
<!-- //faq-banner -->