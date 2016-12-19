<?php  
 $connect = mysqli_connect($servername, $username, $password, $dbname);   
 $post_url = $_GET["post_url"];  
 $get_page_id = $_GET["id"];
 
  	//Check if SEO links are required
	if ($seo_status == "yes") {
			$sql = "SELECT * FROM product WHERE post_url = '".$post_url."'";  
	} if ($seo_status == "no") {
			$sql = "SELECT * FROM product WHERE id = '".$get_page_id."'";  
	}
	
 $result = mysqli_query($connect, $sql); 

	include 'functions/count_page_views.php';
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	
	?>
	
	
	<div class="faq">
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					 <li><a href="<?php echo $url; ?>/index.php">Home</a></li>
					  <li class="active">Search results for <?php echo $_REQUEST['search']; ?></li>
					</ol>
				</div>
				<div class="agileinfo-news-top-grids">
					<div class="col-md-12 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="bs-example bs-example-tabs" role="tabpanel">
								
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home1">
										<div class="wthree-news-top-left">
	
<form action="<?php	
					echo $url;	
					echo '/search.php';
					?>" method="GET">
					<input type="text" name="search" placeholder="Search" required="">
					<input type="submit" value="Go">
				</form><br><br>											
											
											


<style>
img.recommended_image {
    width: 250px;
    height:200px;
	padding-bottom: 15px;
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


$con_search = mysqli_connect($servername, $username, $password, $dbname);

//if(isset($_POST['submit'])) {
if (empty($_GET['search']) === false){
$active = "yes";
$term = mysqli_real_escape_string($con_search, $_REQUEST['search']);

$sql_search = "SELECT * FROM `product` WHERE title LIKE '%".$term."%' AND active = '".$active."'"; 
$r_query_search = mysqli_query($con_search, $sql_search); 

while ($row_for_search = mysqli_fetch_array($r_query_search)){ 

	$image_path = "<img src=\"" . $url."/files_public/upload/" . $row_for_search["image"]."\" class=\"recommended_image\" height=\"70\" width=\"60\" alt=\"\">";
?>

											<div class="col-md-4 w3-agileits-news-left">
												<div class="col-sm-5 wthree-news-img">
												
	<?php
		
		//Check if SEO links are required
	if ($seo_status == "yes") {
    ?>
	
		<?php 	echo '<a href="';
		echo $url;	
		echo '/product/';
		echo $row_for_search["post_url"];
		echo '">';
		?>
	
	<?php
	} if ($seo_status == "no") {
	?>
	
		<?php 	echo '<a href="';
		echo $url;	
		echo '/product_details.php?id=';
		echo $row_for_search["id"];
		echo '">';
		?>
	
	<?php
	}
	?>												
												

												
												<?php echo $image_path; ?></a>
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
	</div>

	<?php 
// include footer
include 'views/modules/footer.php';
?>