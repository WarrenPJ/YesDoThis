<?php
$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
    exit();
}

$query_users_details = "SELECT * from users_details WHERE user_id = '".$_SESSION['user_name']."' AND admin = 'yes'";
$result_users_details = $link->query($query_users_details);
	if ($result_users_details->num_rows < 1) {

   header("Location: $url/index.php");
    exit(0);

    //Or, if you'd rather, you can just:
    die( "Unauthorized access." );
	}
?>