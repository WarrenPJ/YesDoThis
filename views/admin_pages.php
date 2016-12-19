<?php
//Check admin permissions
include 'functions/admin_check_permissions.php';
 
// include header, menu and top navigation
include 'views/admin/header.php';
include 'views/admin/menu.php';
include 'views/admin/navigation.php';
?>

	<style>
		img.video_thumbs {
			border-radius: 50%;
			max-width: 50px;
		}
	</style>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>All Pages <small></small></h3>
				</div>


			</div>

			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Drag and drop to change the order of the pages <small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							
							
							
	<?php
							if(isset($_POST["submit"])) {
$id_ary = explode(",",$_POST["row_order"]);
for($i=0;$i<count($id_ary);$i++) {
$connection->query("UPDATE pages SET row_order='" . $i . "' WHERE id=". $id_ary[$i]);
}
}
$result = $connection->query("SELECT * FROM pages ORDER BY row_order");
							?>
							
							
		 <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <style>

  #sortable-row { list-style: none; }
  #sortable-row li { margin-bottom:4px; padding:10px; background-color:#BBF4A8;cursor:move;}
  .btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  
  #sortable-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
		
	li.ui-sortable-handle {
    background-color: #ebe4eb !important;
}

	
  </style>
  <script>
  $(function() {
    $( "#sortable-row" ).sortable({
	placeholder: "ui-state-highlight"
	});
  });
  
  function saveOrder() {
	var selectedLanguage = new Array();
	$('ul#sortable-row li').each(function() {
	selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("row_order").value = selectedLanguage;
  }
  </script>
</head>
<body>

<form name="frmQA" method="POST" />
<input type = "hidden" name="row_order" id="row_order" /> 
<ul id="sortable-row">
<?php
while($row = $result->fetch_assoc()) {
?>
<li id=<?php echo $row["id"]; ?>><?php echo $row["title"]; ?>
	
	
			<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_pages.php?delete=';
		echo $row["id"];
		echo '" class="rightstatus btn btn-danger btn-xs">';
		?>
			<i class="fa fa-trash-o"></i> Delete <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?></a>	
		
	

		
			<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_pages_edit.php?id=';
		echo $row["id"];
		echo '" class="rightstatus btn btn-info btn-xs">';
		?>

			<i class="fa fa-pencil"></i> Edit </a>
			
			
	
	<?php
						if ($row["active"] != "yes") {
						?>
				<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_pages.php?active=';
		echo $row["id"];
		echo '" class="rightstatus btn btn-danger btn-xs">';
		?>
				<i class="fa fa-times"></i> Not activated <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?></a>

				<?php
						} else {
							?>


					<?php 	echo '<a href="';
		echo $url;	
		echo '/admin_pages.php?deactive=';
		echo $row["id"];
		echo '" class="rightstatus btn btn-success btn-xs">';
		?>
					<i class="fa fa-times"></i> Activated <?php
	if ($test_state =="active") {
?>
(disabled)
	<?php } ?></a>

					<?php
						}
						?>
	
		

</li>
	
<style>
	a.rightstatus {
    float: right;
}
		a.rightactivate {
    float: right;
}
</style>	
	
<?php 
}
$result->free();

?>  
</ul>

<?php
	if ($test_state =="active") {
?>
<input type="submit" class="btnSave" name="submit" value="Save Order (disabled)" disabled />

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input type="submit" class="btnSave" name="submit" value="Save Order" onClick="saveOrder();" />
			
<?php } ?>


</form> 					


<?php
	if ($test_state =="not_active") {
?>

<?php
//Delete  rows in database
   if($_GET['delete']!=""):
    extract($_GET);
    $iddelete = $connection->real_escape_string($_GET['delete']);
    $connection->query("DELETE FROM pages WHERE id='$iddelete'");
?>
		<script>
			window.onload = function() {
				if (!window.location.hash) {
					window.location = window.location + '#loaded';
					window.location.reload();
				}
			}
		</script>

		<?php
endif;

//Make news active
   if($_GET['active']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['active']);
$sql = "UPDATE pages SET active = '".$active_status_yes."' WHERE id = '".$active."' AND active = '".$active_status_no."'";

if ($connection->query($sql) === TRUE) {
?>
			<script>
				window.onload = function() {
					if (!window.location.hash) {
						window.location = window.location + '#loaded';
						window.location.reload();
					}
				}
			</script>

			<?php
}
endif;

//End the loop


//Make news deactive
   if($_GET['deactive']!=""):
    extract($_GET);
	$active_status_yes = "yes";
	$active_status_no = "no";
    $active = $connection->real_escape_string($_GET['deactive']);
$sql = "UPDATE pages SET active = '".$active_status_no."' WHERE id = '".$active."' AND active = '".$active_status_yes."'";

if ($connection->query($sql) === TRUE) {
?>
				<script>
					window.onload = function() {
						if (!window.location.hash) {
							window.location = window.location + '#loaded';
							window.location.reload();
						}
					}
				</script>

				<?php
}
endif;

	}
?>
							
							

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- /page content -->

	<?php 
	// include footer
	//include 'views/admin/footer.php';
	?>


	</body>

	</html>