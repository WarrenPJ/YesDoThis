<?php
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

//Insert inbox record
if(isset($_POST["submit"])){

//Format the breaks to html
$content = nl2br($_POST['description']);
$content = trim($content);


$subject = $_POST["subject"];
$description = $_POST["description"];
$selected_user = $_POST["selected_user"];
$send_to_all = $_POST["send_to_all"];
$repeat = $_POST["repeat"];
$send_date = $_POST["send_date"];
$send_from_user = $_SESSION['user_name'];

//Format date
$originalDate = $send_date;
$newDate = date("Y-m-d", strtotime($originalDate));


if (isset($_POST['send_to_all'])) {

    // Checkbox is selected so send to all
	$send_to_user = "all";
} else {

   // No checkbox selected so select user only
   $send_to_user = $_POST["selected_user"];
}

mysqli_query($connection, "INSERT INTO inbox 
(`subject`, `description`, `from_id`, `to_id`, `repeat`, `send_date`) VALUES ('".$subject."','".$content."','".$send_from_user."','".$send_to_user."','".$repeat."','".$newDate."')");


//Get the last id in the list
    $last_id = $connection->insert_id;

	
//Get last ID if no get is available
$sql_last = "SELECT * FROM inbox WHERE to_id = '".$_SESSION['user_name']."' ORDER BY id DESC LIMIT 0, 1";
$results_last = $connection->query($sql_last);
 if ($results_last->num_rows > 0) {
   while($row_last = $results_last->fetch_assoc()) {	


   ?>
	<script type='text/javascript'>
		window.location = "admin_inbox.php?id=<?php echo $row_last['id']; ?>";
	</script>

	<?php			

 }}


}
//End update records

?>


		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">


			<div class="compose-body">
				<div id="alerts"></div>

				<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
					<div class="btn-group">

						<!-- Select send date -->
						<div class="form-group">
							<label class="control-label col-md-5">When to send <span class="required">*</span>
                        </label>
							<div class="col-md-7">

								<!-- Add datepicker code. Note: jquery in the footer is disabled on this page to run the script -->
								<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
								<link rel="stylesheet" href="/resources/demos/style.css">
								<script type="text/javascript" src="//code.jquery.com/jquery-1.8.0.min.js"></script>
								<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
								<script>
									$(function() {
										$("#datepicker").datepicker();
									});
								</script>

								<input id="datepicker" name="send_date" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $row["send_date"];?>" required="required" type="text">
							</div>
						</div>
						<!-- /Select send date -->

						<div class="form-group">
							<label class="control-label col-md-5">Repeat sending <span class="required">*</span></label>
							<div class="col-md-7">
								<select class="form-control" name="repeat">
                            <option disabled selected>Choose option</option>
                            <option value="never" <?php echo ($row["repeat"] == 'never')?"selected":"" ?>>Never</option>
                            <option value="week" <?php echo ($row["repeat"] == 'week')?"selected":"" ?>>Each week</option>
							<option value="month" <?php echo ($row["repeat"] == 'month')?"selected":"" ?>>Each month</option>
							<option value="year" <?php echo ($row["repeat"] == 'year')?"selected":"" ?>>Each year</option>
                          </select>
							</div>
						</div>

						<div class="form-group">

							<label class="control-label col-md-5" for="first-name">Send to all users 
                        </label>
							<div class="col-md-7">
								<input type="checkbox" name="send_to_all" value="default" class="select_checkbox">

							</div>
						</div>

						<!-- User search autocomplete -->

						<?php

$content ='
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = \'search=\'+ searchid;
if(searchid!=\'\')
{
    $.ajax({
    type: "POST",
    url: "functions/admin/search_user_autocomplete.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find(\'.name\').html();
    var decoded = $("<div/>").html($name).text();
    $(\'#searchid\').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$(\'#searchid\').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>

<style type="text/css">


    #result
    {
        position:absolute;
        width:500px;
        padding:10px;
        display:none;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: white;
    }
    .show
    {
        padding:10px; 
        font-size:15px; 
        height:50px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
	
	input.search {
    width: 300px;
    height: 32px;
    padding-left: 15px;
}

select.form-control {
    height: 32px;
    width: 300px;
}

input.date-picker.form-control.col-md-7.col-xs-12 {
    height: 32px;
    width: 300px;
}

.select_checkbox {
    margin-top: 10px;
}

div.editor-wrapper {
    height: 500px;
}

textarea.resizable_textarea.form-control {
    margin-top: 5px;
    height: 140px;
}


	
</style>

<div class="default">

<div class="form-group">
           <label class="control-label col-md-5">Select the receiver <span class="required">*</span></label>
                        <div class="col-md-7">

<div class="content">
<input type="text" class="search" id="searchid" placeholder="Search for users" name="selected_user" /><br /> 
<div id="result"></div>

</div>

</div></div></div>

';


$pre = 1;
?>


							<?php if(!isset($pre)) {?>
							<pre>
        <?php print_r($content); ?>
      </pre>
							<?php }else{ ?>
							<?php print_r($content); ?>
							<?php } ?>
							</p>


							<!-- /User search autocomplete -->

							<!-- Hide search box -->
							<script type="text/javascript">
								$(document).ready(function() {
									$('input[type="checkbox"]').click(function() {
										if ($(this).attr("value") == "default") {
											$(".default").toggle();
										}
									});
								});
							</script>
							<!-- /Hide search box -->

					</div>

				</div>

				<div id="editor" class="editor-wrapper">


					<input type="text" name="subject" value="<?php echo $row["subject"];?>" placeholder="Enter your email subject here..." id="first-name" required="required" class="form-control ">

					<textarea class="resizable_textarea form-control" id="texteditor" name="description" placeholder="Enter your body content here..."><?php echo htmlspecialchars($row["description"]); ?></textarea>
				</div>
			</div>

			<div class="compose-footer">
			
<?php
	if ($test_state =="active") {
?>
<input type="submit" class="btn btn-success" value="Send (disabled)" name="" disabled />

	
<?php	
}
if ($test_state =="not_active") {
							?>		
		
<input type="submit" class="btn btn-success" value="Send" name="submit" />
			
<?php } ?>				
			
				
			</div>

		</form>


		<?php

$connection->close();
?>