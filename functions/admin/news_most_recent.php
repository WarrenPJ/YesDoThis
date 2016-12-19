<?php
// Turn off all error reporting
error_reporting(0);
	
//Check if payments are done
$connection = new mysqli($servername, $username, $password, $dbname);
$query_update_movies = "SELECT * FROM news ORDER BY id DESC LIMIT 0, 99";
 if ($result_movies=mysqli_query($connection,$query_update_movies))
  {
   if(mysqli_num_rows($result_movies) < 1)
    {
		?>
	<style>
		img.video_thumbs {
			height: 42px;
			width: 42px;
		}
		
		a.pull-left.date {
			background-color: #ffffff;
		}
	</style>

	<article class="media event">

		<div class="media-body">
			No news yet
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</article>

	<?php
        return $sql_membership;
		
    }}	

?>

		<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}


// SQL Query
$sql = "SELECT * FROM news ORDER BY id DESC LIMIT 0, 5";
$results = $connection->query($sql);
//Loop through and echo all the records
while ($row = $results->fetch_assoc()){
//Loop with style is started

$image_path = "<img src=\"" . $url."/thumbs/" . $row["image"]."\" class=\"video_thumbs_small\" height=\"70\" width=\"60\" alt=\"\">";
	

?>

			<style>
img.video_thumbs_small {
    width: 50px;
    height: 50px;
}

				
				a.pull-left.date {
					background-color: #ffffff;
				}
			</style>

			<article class="media event">
				<a class="pull-left date">
					<?php echo $image_path; ?>


				</a>
				<div class="media-body">
					<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_news_edit.php?id=';
		echo $row["id"];
		echo '">';
		?>
					<?php echo $row["title"];?>
					</a>
					<p>
						<?php echo $row["category"];?>
					</p>
				</div>
			</article>

			<?php
//End the loop
}
$connection->close();
?>