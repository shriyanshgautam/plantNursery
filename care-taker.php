<!DOCTYPE html>
<?php 
   require_once 'include/DB_Functions.php';
        $db = new DB_Functions();
?>
<?php
 if(isset($_POST['caretaker'])){
        $care_taker_name = $_POST['care_taker_name'];
        $care_taker_address = $_POST['care_taker_address'];
        $care_taker_contact = $_POST['care_taker_contact'];
        $care_taker_attendance = $_POST['care_taker_attendance'];
        $care_taker_availability_time = $_POST['care_taker_availability_time'];  
        $care_taker_working_hours = $_POST['care_taker_working_hours'];

     
       
// include db handler
     
// response Array
       
       $status=$db->insert_caretaker($care_taker_name,$care_taker_address,$care_taker_contact,$care_taker_attendance,$care_taker_availability_time,$care_taker_working_hours);
       // if($status!=-1){
       // 	 echo 'Inserted Successfully';
       // }else{
       // 		echo 'Error in insertion';
       // }
      }
?>
<html>
<head>
	<title>Plant Nursery</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/animate.css" />
	<link rel="stylesheet" type="text/css" href="css/custom.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="js/jquery.timepicker.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
<div style="width:100%; height:10vh; display:flex; align-items:center; ">
	<h3 style="margin: 0px auto; wiodth:300px;">Caretakers</h3>
</div>
<div id="left-pane" style="width:60%; height:87vh; float:left; display:flex; overflow-y:auto; ">
	
	<table class="table table-hover" style="margin:0px auto; width:90%;">
  	<tr><th>Name</th><th>Address</th><th>Contact</th><th>Attendance</th><th>Available after</th><th>Working Hours</th></tr>
  	<?php
  		$res=$db->getCatetaker();
  		while($row = mysqli_fetch_assoc($res))
		{
			echo '<tr>';
   			echo '<td>'.$row['care_taker_name'].'</td>';
   			echo '<td>'.$row['address'].'</td>';
   			echo '<td>'.$row['contact_number'].'</td>';
   			echo '<td>'.$row['attendance'].'</td>';
   			echo '<td>'.$row['availability_time'].'</td>';
   			echo '<td>'.$row['working_hours'].'</td>';
   			echo '</tr>';
		}
  	?>
	</table>
</div>
<div id="right-pane" style="width:38%; height:90vh;  display:flex;flex-direction:column; ">
	<div style="width:100%; height:10vh;   ">
	<h4 style="margin: 0px auto; wiodth:300px;">Add Caretaker</h4>
	</div>

<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" class = "form-horizontal">
	
	
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Name</label>
			<div class="col-sm-8">
				<input type="text" name="care_taker_name" class="form-control" id="applicant_name" placeholder="Name" size = "30" !important  maxlength = "50" value = "" required>
			</div>
	</div>

	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Address</label>
			<div class="col-sm-8">
				
				<textarea type="text" name="care_taker_address" step="0.01"class="form-control" id="applicant_name" placeholder="Tell us where you live." size = "30" !important  rows="3" value = "" required></textarea>
				
				
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Contact</label>
			<div class="col-sm-8">
				
				<input type="number" name="care_taker_contact" step="1" class="form-control" id="applicant_name" placeholder="1234567890" size = "10" !important  maxlength = "20" value = "" required>
				
				
			</div>
	</div>
	<input type="hidden" name="care_taker_attendance" value="0">
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Availability Time</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="time" name="care_taker_availability_time" class="form-control" id="applicant_name" placeholder="Availability Time" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">Time</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Working Hours</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="time"  name="care_taker_working_hours" class="form-control" id="applicant_name" placeholder="Working Hours" size = "30" !important  maxlength = "20" value = "" required>
					<div class="input-group-addon">hours</div>
				</div>
			</div>
	</div>
	


	
	

	

	

	
	
	

	<input type="hidden" name="land" value="land">
	<p>
		<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name="caretaker" value="caretaker" class="btn btn-success">Add Caretaker</button>
				</div>
			</div>
		</div>
	</p>
</form>
</div>





</body>

</html>
