<?php
 $folder_id = $_GET["user"]; 
	$get_product_id = $_GET["id"]; 
 

//Upload	
if(isset($_FILES["file"]["type"]))
{
	$allowedExtension = array("jpeg", "jpg", "png");
	$fileExtension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
	if(in_array($fileExtension,$allowedExtension)){
		if($_FILES["file"]["size"] < 1000000){ //Approx. 1000kb files can be uploaded.
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			}else{
			

				if (file_exists("upload/".$folder_id."/images/" . $_FILES["file"]["name"])) {
					echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				}else{
						
					$filename = uniqid(rand(), true) . '';	
					$import_name = "" . $filename . ".".$fileExtension;
					$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
					//$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
					$targetPath = "upload/".$folder_id."/images/" . $filename . ".".$fileExtension; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					//echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					echo "<br/><b>File Name:</b> " . $import_name . "<br>";
					//echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
					//echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					//echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
					?>
						<script type='text/javascript'>
		window.location = "product_details_edit.php?name=<?php echo $import_name; ?>&folder=<?php echo $folder_id; ?>&id=<?php echo $get_product_id; ?>";
	</script>
	<?php
				}
			}
		}else{
			echo "<span id='invalid'>***File size is greater than 1000Kb***<span>";
		}
	}else{
		echo "<span id='invalid'>***Invalid file Type***<span>";
	}
}
?>