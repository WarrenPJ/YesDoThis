<!--footer-->
	<div class="footer">
		<div class="container">				 	
			<div class="col-md-2 ftr_navi ftr">
				<h3>Navigation</h3>
				<ul>
					<li><a href="<?php echo $url; ?>/index.php">Home</a></li>
					<li><a href="<?php echo $url; ?>/product_genre.php">Browse</a></li>				
					<li><a href="<?php echo $url; ?>/product_create.php" class="scroll">Start your project</a></li>
				</ul>
			</div>
			<div class="col-md-3 ftr_navi ftr">
					 <h3>Members</h3>
					 <ul>
						 <li><a href="<?php echo $url; ?>/login.php">Login</a></li>
						 <li><a href="<?php echo $url; ?>/register.php">Registration</a></li>
						 <li><a href="<?php echo $url; ?>/password_reset.php">Lost password</a></li>						
					 </ul>
			</div>
			<div class="col-md-3 get_in_touch ftr">
								 <h3>Pages</h3>
					 <ul>
					 
<?php
	

	// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}
// Load all custom pages
$active = "yes";
// SQL Query
$sql = "SELECT * FROM pages WHERE active = '".$active."' ORDER BY row_order";
$result = $connection->query($sql);
//Loop through and echo all the records

while ($row = $result->fetch_assoc()){
//Loop with style is started
;

	//Check if SEO links are required
	if ($seo_status == "yes") {
			echo "<li><a href=\"" . $url. "/pages/" . $row["post_url"]. "\">" . $row["title"]. "</a></li>";
	} if ($seo_status == "no") {
		    echo "<li><a href=\"" . $url. "/pages.php?id=" . $row["id"]. "\">" . $row["title"]. "</a></li>";
	}


}

?>					 
					 
					
					 </ul>
			</div>
			
<style>
	ul{ 
  list-style-type: none;
}
</style>
			
			<div class="col-md-4 ftr-logo">
				<a href="<?php echo $url; ?>/index.php"><h3><?php echo $website_title; ?> </h3></a>

				<p>
				<?php
				// Create connection
				$connection = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
				}
				// SQL Query
				$hide_copyright = "no";
				$sql_copyright_check = "SELECT hide_copyright FROM settings_general WHERE hide_copyright = '".$hide_copyright."'";
				$results_copyright_check = $connection->query($sql_copyright_check);

				if ($results_copyright_check->num_rows > 0) {
				// output data of each row
				while($row_copyright_check = $results_copyright_check->fetch_assoc()) {
				?>
				&copy; <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script> <?php echo $website_title; ?>. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a>

				<?php }} ?>		
					
				</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--footer-->
<!-- for bootstrap working -->
		<script src="<?php echo $url; ?>/themes/views/js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>