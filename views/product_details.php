<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
$post_url = $_GET["post_url"]; 
$get_page_id = $_GET["id"]; 
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
  include 'functions/count_page_views.php';
	?>

	<style>
	img.img-responsive {
    width: 800px;
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

$active = "yes";

	//Check if SEO links are required
	if ($seo_status == "yes") {
			$sql_video_genre = "SELECT * FROM product WHERE post_url = '".$post_url."'";
	} if ($seo_status == "no") {
		$sql_video_genre = "SELECT * FROM product WHERE id = '".$get_page_id."'";
	}


$result_video_genre = mysqli_query($connect, $sql_video_genre); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_video_genre) > 0)  
{  
while($row = mysqli_fetch_array($result_video_genre))  
{  



	$image_path = "<img src=\"" . $url."/files_public/upload/" . $row["image"]."\" class=\"img-responsive\" alt=\"\">";



//Check funding row	
$query = mysqli_query($connect, "SELECT * FROM `product_funding` WHERE product_id = '".$row["id"]."'");

if(mysqli_num_rows($query) > 0){

    //echo "row already exist";
}else{
    // do something
 	  	mysqli_query($connection, "INSERT INTO product_funding 
(`product_id`,`funded`) 
VALUES ('".$row["id"]."','0')");   
}


?>		


<!-- single -->
	<div class="single">
		<div class="container">
			
			<div class="col-md-8 sing-img-text">

			<?php echo $image_path; ?>
				<div class="sing-img-text1">
					<h3><?php echo softTrim($row["title"], 40); ?></h3>
					<p class="est">	<?php echo html_entity_decode($row["description"]); ?></p>
<br><br>
					<div class="com">
						<h3>Comments</h3>
		
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
						

<?php
	$sql_details = "SELECT * FROM users_details WHERE user_id = '".$row["author"]."'";
$result_details = mysqli_query($connect, $sql_details); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_details) > 0)  
{  
while($row_details = mysqli_fetch_array($result_details))  
{  
	?>					
						
					</div>
					
				</div>
			</div>
			<div class="col-md-4 sing-img-text-left">
				<div class="blog-right1">

							<div class="related-post">
								<div class="related-post-left">
								<?php 	echo '<a href="';
													echo $url;	
													echo '/users_profile.php?name=';
													echo $row["author"];
													echo '"';
													echo '>';
												?>
												
<?php
	//Check if the thumbnail is external loaded
if( strpos($row_details["profile_image"], 'images/') == false ) {
	?>
	<img src="<?php echo $url ?>/files/<?php echo $row_details["profile_image"]; ?>" alt=" " />
	<?php
}

//Check if the thumbnail is on the server
if( strpos($row_details["profile_image"], 'images/') == true ) {
	?>
	<img src="<?php echo $url ?>/files_public/upload/<?php echo $row_details["profile_image"]; ?>" alt=" " />
	<?php
	
}
?>	  												
												
												
												
												</a>
							</div>
							<div class="related-post-right">
								<h4><?php 	echo '<a href="';
													echo $url;	
													echo '/users_profile.php?name=';
													echo $row["author"];
													echo '"';
													echo '>';
												?>
												
												<?php echo softTrim($row["author"], 15); ?></a></h4>

						
								
								<p><?php echo $row_details["location"]; ?>, <?php echo $row_details["country"]; ?><br>
									<span><?php 	echo '<a href="';
													echo $url;	
													echo '/users_profile.php?name=';
													echo $row["author"];
													echo '"';
													echo '>';
												?>
												
												view profile</a></span>
								</p>
								
<?php }} ?>								
								
								
							</div>
							<div class="clearfix"> </div>
						</div>
				
					<div class="search">
						<h3>Goals</h3>
						

<!-- Get funding -->
<?php
	$sql_details_funding = "SELECT * FROM product_funding WHERE product_id = '".$row["id"]."'";
$result_details_funding = mysqli_query($connect, $sql_details_funding); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_details_funding) > 0)  
{  
while($row_details_funding = mysqli_fetch_array($result_details_funding))  
{  
	?>		
						
<progress value="<?php echo $row_details_funding["funded"]; ?>" max="<?php echo $row["funding_goal"]; ?>" id="funding"></progress>
<br>
<span>Raised <?php echo $row_details_funding["funded"]; ?> <?php echo $selected_currency ?> - Goal <?php echo $row["funding_goal"]; ?> <?php echo $selected_currency ?></span>	
<br><br>						
	
					



					
					</div><br>
					<div class="categories">
						<h3>Details</h3>
						<ul>
							
<?php
//If product is active date cannot be changed anymore
if ($row[complete_status] == 'started') {
?>							
							
							<li><a href="#">
						<?php
	

$start = $row["start_date"];
$end = $row["end_date"];
$todaydate = date("Y-m-d");
	
function dateDiff($todaydate, $end) {

$start_ts = strtotime($todaydate);

$end_ts = strtotime($end);

$diff = $end_ts - $start_ts;

return round($diff / 86400);

}

echo dateDiff($todaydate, $row["end_date"]);	

//End loop	
?>									
								
								days left</a></li>
<?php } ?>							
							
<?php
//If product is active date cannot be changed anymore
if ($row[complete_status] == 'not_started' OR $row[complete_status] == 'complete' OR $row[complete_status] == 'closed') {
?>	
<li>This product is closed</li>
			
<?php } ?>								
							
								
<?php 


$start = $row["start_date"];
$end = $row["end_date"];
$now = time();

/**
 * Calculate the difference between two dates using date_diff()
 * 
 */
//creating a date object
$date1 = date_create($end);
//creating a date object
$date2 = date_create(date("Y-m-d"));
//calculating the difference between dates
//the dates must be provided to the function as date objects that's why we were setting them as 
//date objects and not just as strings
//date_diff returns an date object wich can be accessed as seen below
$diff12 = date_diff($date2, $date1);

//accesing days
$days = $diff12->d;
//accesing months
$months = $diff12->m;
//accesing years
$years = $diff12->y;
//echo '<center>';


if ($row_details_funding["funded"] > $row["funding_goal"]) {
	//echo $days;
	if (strtotime($end) > $now) {
		//echo "no days left and funding is reached";
		 // Deactivate and close products with end date equal to today
$query_funding_done = "UPDATE `product_funding` SET `payout_status` = 'progress' WHERE product_id = '".$row_details_funding["product_id"]."'";

// Execute the query
$result_funding_done = $connect->query($query_funding_done);
	}
		
}

//If not reached
if ($row_details_funding["funded"] < $row["funding_goal"]) {
	//echo $days;
	if (strtotime($end) > $now) {
		//echo "no days left and funding is not  reached";
		 // Deactivate and close products with end date equal to today
$query_funding_done = "UPDATE `product_funding` SET `payout_status` = 'cancelled' WHERE product_id = '".$row_details_funding["product_id"]."'";

// Execute the query
$result_funding_done = $connect->query($query_funding_done);
	}
		
}

	}} ?>									
								
								
							<li><a href="#">
								
<?php
//Count number of funders
$query_user_results = $connection->query("SELECT COUNT(*) FROM `product_funders` WHERE product_id = '".$row["id"]."'");
$row_count_users = $query_user_results->fetch_row();
echo $row_count_users[0];	
	?>		
						
backers</a></li>					
	

							<li><a href="<?php $url ?>/product_genre.php"><?php echo $row["category"]; ?></a></li>
						</ul>
					</div><br>

<?php
//If product is active date cannot be changed anymore
if ($row[complete_status] == 'not_started' OR $row[complete_status] == 'started') {
?>	

					<div class="related-posts">
						<h3>Fund this project</h3>
						
<?php
	$sql_pledge = "SELECT * FROM product_pledge WHERE product_id = '".$row["id"]."' ORDER BY price ASC LIMIT 0, 5"; 
$result_pledge = mysqli_query($connect, $sql_pledge); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_pledge) > 0)  
{  
while($row_pledge = mysqli_fetch_array($result_pledge))  
{  
	?>		
						
						<div class="related-post">
							<div class="related-post-left">
								<a href="<?php echo $url ?>/users_donate_project_confirmation.php?pledge=<?php echo $row_pledge["id"]; ?>"><img src="<?php echo $url; ?>/files_public/upload/<?php echo $row_pledge["image"]; ?>" alt=" " /></a>
							</div>
							<div class="related-post-right">
								<h4><a href="<?php echo $url ?>/users_donate_project_confirmation.php?pledge=<?php echo $row_pledge["id"]; ?>"><?php echo softTrim($row_pledge["title"], 15); ?></a></h4>
								<p><?php echo softTrim($row_pledge["description"], 100); ?>
									<span><br>Expected delivery <?php echo softTrim($row_pledge["delivery_date"], 15); ?></span><br>
									<span><b><?php echo softTrim($row_pledge["price"], 15); ?> <?php echo $selected_currency ?></b></span>
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>						
						
						
	
<?php }}} ?>								
						
						

					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
			
		</div>
	</div>
<!-- //single -->



<?php
//End of the loop
}  
}  
?>


<?php 
// include footer
include 'views/modules/footer.php';
?>