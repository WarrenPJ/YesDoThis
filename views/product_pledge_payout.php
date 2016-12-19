<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	
$get_id = $_GET["id"]; 

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

?>

<!-- banner1 -->
	<div class="banner1">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner1-info">
								<h3>Hi <?php echo $row_user_details[first_name]; ?></h3>
								<p>This show all the users who support you.</p>
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
<!-- contact -->

	<div class="contact">
		<div class="container">
			<h3>Your funders</h3>
			<div class="contact-grid">

	<a href="#" onclick="goBack()" role="button" class="btn btn-danger pull-left">Back to the overview</a>
	<br><br>				
<script>
function goBack() {
    window.history.back();
}
</script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo $url; ?>/themes/views/js/datatables/css/jquery.bdt.css" type="text/css" rel="stylesheet">


<div class="container">
    <div class="row">
            <div class="box clearfix">
            <table class="table table-hover" id="bootstrap-table">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Donated</th>
									  <th>Reward</th>
									  <th>Delivery date</th>
									  <th>Status</th>
                </tr>
                </thead>
                <tbody>
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
									
									
			//Load user details
 $connect_pledge_details = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_pledge_details = "SELECT * FROM product_funders WHERE product_id = '".$get_id."'";
 $result_pledge_details = mysqli_query($connect_pledge_details, $sql_pledge_details); 	  


									//Start of the loop
									if(mysqli_num_rows($result_pledge_details) > 0)  
									{  
										 while($row_pledge_details = mysqli_fetch_array($result_pledge_details))  
										 {  
											 

											 
 $sql_project_details = "SELECT * FROM product WHERE id = '".$row_pledge_details["product_id"]."'";
 $result_project_details = mysqli_query($connect, $sql_project_details); 	  


									//Start of the loop
									if(mysqli_num_rows($result_project_details) > 0)  
									{  
										 while($row_project_details = mysqli_fetch_array($result_project_details))  
										 {  											 

											 
											  $sql_product_pledge_info = "SELECT * FROM product_pledge WHERE id = '".$row_pledge_details["pledge_id"]."'";
 $result_product_pledge_info = mysqli_query($connect, $sql_product_pledge_info); 	  


									//Start of the loop
									if(mysqli_num_rows($result_product_pledge_info) > 0)  
									{  
										 while($row_product_pledge_info = mysqli_fetch_array($result_product_pledge_info))  
										 {  
											 
									 ?>
									
									
                <tr>
                    <td><?php echo $row_pledge_details["user_id"]; ?>	</td>
                    <td><?php echo $row_pledge_details["total"]; ?></td>
                    <td><?php echo softTrim($row_product_pledge_info["title"], 15); ?></td>
                    <td><?php echo $row_product_pledge_info["delivery_date"]; ?></td>
									 <td>
									
							<?php
						if ($row_pledge_details["status"] != "delivered") {
						?>
				<?php 	echo '<a href="';
		echo $url;	
		echo '/product_pledge_payout.php?active=';
		echo $row_pledge_details["id"];
							echo '&id=';
		echo $get_id;
		echo '" class="btn btn-danger btn-xs">';
		?>
				<i class="fa fa-remove"></i> Confirm reward</a>

				<?php
						} else {
							?>


					<?php 	echo '<a href="';
		echo '#';
		echo '" class="btn btn-success btn-xs">';
		?>
					<i class="fa fa-check"></i> Reward send</a>

					<?php
						}
						?>							
									
									</td>

                </tr>

											<?php
	  			//End of the loop
			}  
			}  }  
			} }  
			} 
			?>
	
	
			<?php

//Make news active
   if($_GET['active']!=""):
    extract($_GET);
    $active = $connection->real_escape_string($_GET['active']);
$sql = "UPDATE product_funders SET status = 'delivered' WHERE id = '".$active."'";

if ($connection->query($sql) === TRUE) {
?>
			<script>
				window.onload = function() {
					if (!window.location.hash) {
						window.location = window.location + '#loaded';
						window.location.reload();
					}
				}
			</script>

			<?php
}
endif;

//End the loop
		?>
	
	
	

                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo $url; ?>/themes/views/js/datatables/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $url; ?>/themes/views/js/datatables/js/vendor/jquery.sortelements.js" type="text/javascript"></script>
<script src="<?php echo $url; ?>/themes/views/js/datatables/js/jquery.bdt.min.js" type="text/javascript"></script>
<script>
    $(document).ready( function () {
        $('#bootstrap-table').bdt({
            showSearchForm: 0,
            showEntriesPerPageField: 0
        });
    });
</script>



	
	



	
  
          </div>
        </div>
      </form>
    </div>
  </div>
</div>		
			
	
			

			
		
			</div>
		</div>
	</div>
<!-- //contact -->

<?php 
// include footer
include 'views/modules/footer.php';
?>