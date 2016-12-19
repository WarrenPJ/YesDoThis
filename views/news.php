<?php  
 $connect = mysqli_connect($servername, $username, $password, $dbname);   
 $post_url = $_GET["post_url"];  
 $get_page_id = $_GET["id"]; 
  	//Check if SEO links are required
	if ($seo_status == "yes") {
			 $sql = "SELECT * FROM news WHERE post_url = '".$post_url."'";  ;  
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
	include 'functions/news_overview.php';
	?>

<?php 
// include footer
include 'views/modules/footer.php';
?>