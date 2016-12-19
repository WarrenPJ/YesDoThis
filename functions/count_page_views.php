<?php
 //Check Total Pageviews
$sql_for_counting = "SELECT * FROM product WHERE post_url = '".$post_url."'";  
$result_for_counting = $connect->query($sql_for_counting);

while($row = $result_for_counting->fetch_assoc()) {
        $number_visits = $row['views'];
		$video_id = $row['id'];
    }

//Update total pageviews +1 to get the new number of page views
$update_page_view = $number_visits + 1;
$sql_for_counting = "UPDATE product SET views = '".$update_page_view."' WHERE id = '".$video_id."'";  



if ($connect->query($sql_for_counting) === FALSE) {
    echo "Error updating record: " . $connect->error;
}
//The result (update the counting)
//echo $update_page_view;
								?>