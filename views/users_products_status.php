<?php  
$connect = mysqli_connect($servername, $username, $password, $dbname);   
	include 'views/modules/styling.php';
	include 'views/modules/header.php';
	
	
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
								<p>This show all the donations to your projects.</p>
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
			<h3>Your donated projects</h3>
			<div class="contact-grid">

			

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo $url; ?>/themes/views/js/datatables/css/jquery.bdt.css" type="text/css" rel="stylesheet">


<div class="container">
    <div class="row">
            <div class="box clearfix">
            <table class="table table-hover" id="bootstrap-table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>End date</th>
									  <th>Goal</th>
                    <th>Donated</th>
									  <th>Status</th>
									  <th>Payout status</th>
									  <th>Fee</th>
									  <th>Payout</th>
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
									

									
 $connect_product_details = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_product_details = "SELECT * FROM product WHERE author = '".$_SESSION['user_name']."'";
 $result_product_details = mysqli_query($connect_product_details, $sql_product_details); 	  


									//Start of the loop
									if(mysqli_num_rows($result_product_details) > 0)  
									{  
										 while($row_product_details = mysqli_fetch_array($result_product_details))  
										 {  
		
 $sql_funded_details = "SELECT * FROM product_funding WHERE product_id = '".$row_product_details["id"]."'";
 $result_funded_details = mysqli_query($connect, $sql_funded_details); 	  


									//Start of the loop
									if(mysqli_num_rows($result_funded_details) > 0)  
									{  
										 while($row_funded_details = mysqli_fetch_array($result_funded_details))  
										 {  
											 											 
											 
											 
									 ?>
									
	
									<style>
									
									div.not_complete_funding {
    color: #ff0303;
    font-weight: bold;
}
div.complete_funding {
    color: #03ff03;
    font-weight: bold;
}

									</style>
                <tr>
				
	<?php
		//Check if SEO links are required
		if ($seo_status == "yes") {
    ?>
	
		<td><a href="<?php echo $url; ?>/product/<?php echo $row_product_details["post_url"]; ?>"><?php echo softTrim($row_product_details["title"], 10); ?></a>	</td>
	
	<?php
	} if ($seo_status == "no") {
	?>
		<td><a href="<?php echo $url; ?>/product_details.php?id=<?php echo $row_product_details["id"]; ?>"><?php echo softTrim($row_product_details["title"], 10); ?></a>	</td>

	
	<?php
	}
	?>					
				
                    
                    <td><?php echo $row_product_details["end_date"]; ?></td>
                    <td><?php echo $row_product_details["funding_goal"]; ?></td>
                    <td>
											
											
	<?php
			if ($row_funded_details["funded"] > $row_product_details["funding_goal"]) {
    ?><div class="complete_funding"><?php echo $row_funded_details["funded"]; ?></div><?php
} else {
     ?><div class="not_complete_funding"><?php echo $row_funded_details["funded"]; ?></div><?php
}
	?>										
											
											</td>
									 <td><?php echo $row_product_details["complete_status"]; ?></td>
									<td><?php echo $row_funded_details["payout_status"]; ?></td>
									<td><?php echo $payout_fee; ?>%</td>
									 <td><a href="<?php echo $url; ?>/product_pledge_payout.php?id=<?php echo $row_product_details["id"]; ?>"><img src="<?php echo $url; ?>/themes/views/images/payout.png"/></a>	</td>
									
		<style>
									td a img {
    height: 20px;
    width: 20px;
}
</style>						
									
									
                </tr>

											<?php
	  			//End of the loop
			}  
			} 	}  
			} 
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