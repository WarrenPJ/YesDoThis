<?php
//If users details row is not exist, create one
$conn_to_update_check = mysqli_connect($servername, $username, $password, $dbname);  
$query_update = "SELECT * from users_details WHERE user_id = '".$_SESSION['user_name']."'";
 if ($result=mysqli_query($conn_to_update_check,$query_update))
  {
   if(mysqli_num_rows($result) < 1)
    {
		  $sql_user_details = $conn_to_update_check->query("INSERT INTO users_details(user_id) VALUES('" . $_SESSION['user_name'] . "')");
		  ?><meta http-equiv="refresh" content="0"><?php
        return $sql_user_details;
		
    }}
?>