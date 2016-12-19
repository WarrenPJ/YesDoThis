<?php

//Check if the item is in the membership database
$conn_to_check_existing_membership_days = mysqli_connect($servername, $username, $password, $dbname);  
$query_to_check_existing_membership_days = "SELECT * from users_membership WHERE user_id = '".$_SESSION['user_name']."' AND days > '0'";


 if ($result_to_check_existing_membership_days=mysqli_query($conn_to_check_existing_membership_days,$query_to_check_existing_membership_days))
  {
   if(mysqli_num_rows($result_to_check_existing_membership_days) > 0)
	   
   //User has membership days

    {
		//If exist
		if(mysqli_num_rows($result_to_check_existing_membership_days) > 0){
      ?>


	<?php
//Show number of days
 $connect_user_days = mysqli_connect($servername, $username, $password, $dbname);   
 $sql_user_days = "SELECT * FROM users_membership WHERE user_id = '".$_SESSION['user_name']."'";
 $result_user_days = mysqli_query($connect_user_days, $sql_user_days); 	  


									//Start of the loop
									if(mysqli_num_rows($result_user_days) > 0)  
									{  
										 while($row_user_days = mysqli_fetch_array($result_user_days))  
										 {  
									 
?>

		<button type="button" class="btn btn-success">You have <?php echo $row_user_days["days"]; ?> membership days</button> <br><br>

		<?php
	  			//End of the loop
			}  
			}  
			?>

			<?php
    }}
  if(mysqli_num_rows($result_to_check_existing_membership_days) < 1)
	  
  //User has no membership days
  {
      //If doesnt exist
	   if(mysqli_num_rows($result_to_check_existing_membership_days) < 1){
  ?>
				<button type="button" class="btn btn-warning">You have no paid membership yet</button> <br><br>
				<?php
  }}}

?>