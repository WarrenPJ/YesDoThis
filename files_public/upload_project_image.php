<?php
if(!empty($_FILES)){
//$folder_id = $_GET["user"];	
include '../config/db.php';
$folder_id = $_POST["folder_id"];
$product_id = $_POST["product_id"];

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

	$connect = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	//Create unique name
	$filename_unique = uniqid(rand(), true) . '';
	$fileExtension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
	//$import_name = "" . $filename . ".".$fileExtension;
	
	$targetDir = "upload/".$folder_id."/images/";
	$fileName = $_FILES['file']['name'];
	
	$updatefilename = "" . $filename_unique . ".".$fileExtension;
	
	$targetFile = $targetDir.$updatefilename;
	
	$image_path = "".$folder_id."/images/".$updatefilename."";
	
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		//insert file information into db table
		//$connect->query("INSERT INTO files (file_name, uploaded) VALUES('".$fileName."','".date("Y-m-d H:i:s")."')");
		$sql_image = "UPDATE product SET image = '".$image_path."' WHERE id = '".$product_id."'";

if ($connection->query($sql_image) === TRUE) {	
	}
	}
	
}
?>