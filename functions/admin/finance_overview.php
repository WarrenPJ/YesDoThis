<?php

// Create connection

$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($connection->connect_error)
	{
	die("Connection failed: " . $connection->connect_error);
	}



// SQL Query

$sql = "SELECT * FROM users_payments ORDER BY date DESC";
$results = $connection->query($sql);

// Loop through and echo all the records

while ($row = $results->fetch_assoc())
	{

	// Loop with style is started

?>


<tr>
	  <td><?php
	echo $row["id"]; ?></td>
	  <td><?php
	echo $row["user_id"]; ?></td>
	  <td><?php
	echo $row["amount"]; ?></td>
	  <td><?php
	echo $row["payment_type"]; ?></td>
	  <td><?php
	echo $row["date"]; ?></td>
</tr>	 


<?php

	// End the loop

	}

$connection->close();
?>
