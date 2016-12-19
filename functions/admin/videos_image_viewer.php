<?php
$selectedImage = (isset($_POST['selectedImage'])) ? trim($_POST['selectedImage']) : "";
?>

	<select class="form-control" name="selectedImage" id="selectedImage">
						
						
						
<!--<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">-->

						<?php
						if ($row["image"] != "") {
						?>
						<option selected="selected"><?php echo $row["image"];?></option>
						<?php
						} else {
							?>
						<option disabled selected>Choose option</option>
						<?php
						}
						?>

<?php 
$files = scandir('./files/'); 
 
$c1 = count($files);
$c2 = 0;
 
for($i=0; $i<$c1; $i++)
{
  if(strlen($files[$i]) > 3)
  {
    $extension = strtolower(substr($files[$i], -4));
    if(($extension == ".gif") OR ($extension == ".jpg") OR ($extension == ".png"))
    {
      echo "<option value=\"".trim($files[$i])."\"";
      if($selectedImage == $files[$i]) echo " selected=\"selected\"";
      echo ">".$files[$i]."</option>\n";
      $c2++;
    }
  }
}
 
?>
						 </select>


	<br>
	<!--<input type="submit" value="Select" class="btn btn-success" />-->
	<input type="submit" name="delete" class="btn btn-success" value="Select" onclick="return confirm('Loading a preview will reset your input. Have you saved your page yet?');">

	<br><br>
	<!--</form>-->

	<!--<?php echo "total images = ".$c2; ?>-->


	<?php
if(!empty($selectedImage))
{
  ?>
		<img src="./files/<?php echo $selectedImage ?>" alt="" style="max-height: 450px; max-width: 450px;" />

<?php
}
?>