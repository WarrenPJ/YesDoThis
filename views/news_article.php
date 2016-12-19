<?php  
 $connect = mysqli_connect($servername, $username, $password, $dbname);   
 $post_url = $_GET["post_url"];  
 $get_page_id = $_GET["id"]; 
 	//Check if SEO links are required
	if ($seo_status == "yes") {
			 $sql = "SELECT * FROM news WHERE post_url = '".$post_url."'";  
	} if ($seo_status == "no") {
			$sql = "SELECT * FROM news WHERE id = '".$get_page_id."'";  
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

	include 'functions/news_article.php';	//End of the loop
	}  
	}  
	?>


<?php 
// include footer
include 'views/modules/footer.php';
?>