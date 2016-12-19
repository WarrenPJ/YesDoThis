<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Count number of users
$query_user_results = $connection->query("SELECT COUNT(*) FROM `users_details`");
$row_count_users = $query_user_results->fetch_row();
//echo $row_count_users[0];

//Count number of videos
$query_video_results = $connection->query("SELECT COUNT(*) FROM `product`");
$row_count_video = $query_video_results->fetch_row();

//Count number of likes
$query_likes_results = $connection->query("SELECT COUNT(*) FROM `news`");
$row_count_likes = $query_likes_results->fetch_row();

//Count number of payments
$query_payments_results = $connection->query("SELECT COUNT(*) FROM `users_payments`");
$row_count_payments = $query_payments_results->fetch_row();

?>