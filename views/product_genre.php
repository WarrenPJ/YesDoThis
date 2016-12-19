<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	?>


<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Browse All The Categories</h3>
								<p>Make your selection to filter the projects based on your favorites.</p>
							</div>
						</li>
					</ul>
				</div>
			</section>	
				<!--FlexSlider-->
					<link rel="stylesheet" href="<?php echo $url; ?>/themes/views/css/flexslider.css" type="text/css" media="screen" />
					<script defer src="<?php echo $url; ?>/themes/views/js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
			<!--End-slider-script-->
		</div>
	</div>
<!-- //banner1 -->

<!-- Content filter -->
	<link rel="stylesheet" href="<?php echo $url; ?>/themes/views/js/content-filter/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo $url; ?>/themes/views/js/content-filter/css/style.css"> <!-- Resource style -->
	<script src="<?php echo $url; ?>/themes/views/js/content-filter/js/modernizr.js"></script> <!-- Modernizr -->
	
	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
					</li> 
					

					
					
					<li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
					<li class="filter" data-filter=".most_viewed"><a href="#0" data-type="color-1">Most viewed</a></li>
					<li class="filter" data-filter=".best_funded"><a href="#0" data-type="color-3">Top projects</a></li>
					<li class="filter" data-filter=".end_this_week"><a href="#0" data-type="color-2">End this week</a></li>
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">
			<ul>
				
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
$sql = "SELECT * FROM product WHERE active = '".$active."' ORDER BY views DESC";
$result = $connection->query($sql);
//Loop through and echo all the records

while ($row = $result->fetch_assoc()){
//Loop with style is started
;

$image_path = "<img src=\"" . $url."/files_public/upload/" . $row["image"]."\" class=\"img-responsive-style\" alt=\"\">";

?>				
				
				<style>
li.blocks {
    padding-right: 55px;
    padding-top: 20px;
    width: 250px;
    height: 200px;
}

img.img-responsive-style {
    height: 200px;
    width: 250px;
}

				</style>				
			
				<li class="blocks mix 
									 
				<?php
				//If views is larger than 100

				if ($row["views"] > "100") {
				echo "most_viewed";
				} 
				?> 
									 

									 
						<?php
	

$start = $row["start_date"];
$end = $row["end_date"];

/**
 * Calculate the difference between two dates using date_diff()
 * 
 */
//creating a date object
$date1 = date_create($start);
//creating a date object
$date2 = date_create($row["end_date"]);
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
//echo '<br /><div style="background-color:green;color:#fff;padding:10px;width:600px;font-size:16px">
//<b>
//The difference between ' . $start . ' and ' . $end . ' <br />is: ' . $days . ' day(s), ' . $months . ' month(s),
//' . $years . ' year(s)</b>
//</div><br />';
//echo '</center>';

				if ($days < "8") {
				echo "end_this_week";
				} 	
?>																 
									 
<?php
	$sql_details_funding = "SELECT * FROM product_funding WHERE product_id = '".$row["id"]."'";
$result_details_funding = mysqli_query($connect, $sql_details_funding); 

//Start of the loop
//Get the video path with correct domain information
if(mysqli_num_rows($result_details_funding) > 0)  
{  
while($row_details_funding = mysqli_fetch_array($result_details_funding))  
{  
	
	
$percent = ($row_details_funding["funded"] / $row["funding_goal"]) * 100;	
	
				if (round($percent, 0) > "75") {
				echo "best_funded";
				} 
 }} ?>									 
								 
									 
									 
									 
									 
									 
									 <?php echo $row["category"]; ?> radio2 option3">
									 
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
									 
									 
			<?php echo $image_path; ?></a><br>
			<div class="captn">
			<?php echo softTrim($row["title"], 15); ?>

			</div>
		
	
			
			</li>
				
				
<?php } ?>				
		
				<!--
<li class="mix color-2 check2 radio2 option2"><img src="img/img-2.jpg" alt="Image 2"></li>
				<li class="mix color-1 check3 radio3 option1"><img src="img/img-3.jpg" alt="Image 3"></li>
				<li class="mix color-1 check3 radio2 option4"><img src="img/img-4.jpg" alt="Image 4"></li>
				<li class="mix color-1 check1 radio3 option2"><img src="img/img-5.jpg" alt="Image 5"></li>
				<li class="mix color-2 check2 radio3 option3"><img src="img/img-6.jpg" alt="Image 6"></li>
				<li class="mix color-2 check2 radio2 option1"><img src="img/img-7.jpg" alt="Image 7"></li>
				<li class="mix color-1 check1 radio3 option4"><img src="img/img-8.jpg" alt="Image 8"></li>
				<li class="mix color-2 check1 radio2 option3"><img src="img/img-9.jpg" alt="Image 9"></li>
				<li class="mix color-1 check3 radio2 option4"><img src="img/img-10.jpg" alt="Image 10"></li>
				<li class="mix color-1 check3 radio3 option2"><img src="img/img-11.jpg" alt="Image 11"></li>
				<li class="mix color-2 check1 radio3 option1"><img src="img/img-12.jpg" alt="Image 12"></li>
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
-->
				
				
				
				
			</ul>
			<div class="cd-fail-message">No results found</div>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<div class="search-top">
				

<form action="<?php	
					echo $url;	
					echo '/search.php';
					?>" method="GET">
					<input type="text" name="search" placeholder="Search" required="">
					<input type="submit" value="Go">
				</form>
			
</div>
			
	<style>.filter-top {
    margin-top: -120px;
}
</style>		
			
			<div class="filter-top">		
			<form>


				<div class="cd-filter-block">
					<h4>Check boxes</h4>

					<ul class="cd-filter-content cd-filters list">
						
<?php
// Load all video categories

// Create connection
$conn_for_menu = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_for_menu->connect_error) {
die("Connection failed: " . $conn_for_menu->connect_error);
}
// SQL Query
$sql_for_menu = "SELECT * FROM product_category  WHERE active = 'yes' ORDER BY CATEGORY ASC";
$result_for_menu = $conn_for_menu->query($sql_for_menu);
//Loop through and echo all the records
while ($row = $result_for_menu->fetch_assoc()){

//echo "<li><a href=\"" . $url. "/genre/" . $row["category"]. "\">" . $row["category"]. "</a></li>";
	
echo "<li><input class=\"filter\" data-filter=\"." . $row["category"]. "\" type=\"checkbox\" id=\"checkbox1\"><label class=\"checkbox-label\" for=\"checkbox1\">" . $row["category"]. "</label></li>";	
	
	
}
$conn_for_menu->close();
?>						
						
						


						
						
			
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<!--
				<div class="cd-filter-block">
					<h4>Select</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option value="">Choose an option</option>
								<option value=".option1">Option 1</option>
								<option value=".option2">Option 2</option>
								<option value=".option3">Option 3</option>
								<option value=".option4">Option 4</option>
							</select>
						</div> 
					</div> 
				</div>  -->
				<!--
				<div class="cd-filter-block">
					<h4>Radio buttons</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
							<label class="radio-label" for="radio1">All</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Choice 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Choice 3</label>
						</li>
					</ul>  
				</div>  -->
			</form>
			</div>
			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->
<script src="<?php echo $url; ?>/themes/views/js/content-filter/js/jquery-2.1.1.js"></script>
<script src="<?php echo $url; ?>/themes/views/js/content-filter/js/jquery.mixitup.min.js"></script>
<script src="<?php echo $url; ?>/themes/views/js/content-filter/js/main.js"></script> <!-- Resource jQuery -->		
			
<!-- End content filter -->	

<?php 
// include footer
include 'views/modules/footer.php';
?>