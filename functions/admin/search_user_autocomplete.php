<?php
include '../../config/db.php';

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
    $strSQL_Result = mysqli_query($connection,"select user_id,user_name,user_email from users where user_name like '%$q%' or user_email like '%$q%' order by user_id LIMIT 5");
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $username   = $row['user_name'];
        $email      = $row['user_email'];
        $b_username = '<strong>'.$q.'</strong>';
        $b_email    = '<strong>'.$q.'</strong>';
        $final_username = str_ireplace($q, $b_username, $username);
        $final_email = str_ireplace($q, $b_email, $email);
        ?>
  <div class="show" align="left">
    <span class="name"><?php echo $final_username; ?></span>
    <!--&nbsp;<br/><?php echo $final_email; ?><br/>-->
  </div>
  <?php
    }
}
?>