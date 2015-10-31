<!DOCTYPE html>
<?php 
   require_once 'include/DB_Functions.php';
        $db = new DB_Functions();
?>
<?php
 if(isset($_POST['deliveryperson'])){
        $person_name = $_POST['person_name'];
        $person_address = $_POST['person_address'];
        $person_contact = $_POST['person_contact'];
        $person_area = $_POST['person_area'];
        $person_attendance = $_POST['person_attendance'];  
        $person_time = $_POST['person_time'];
        $person_vehicle_type = $_POST['person_vehicle_type'];
        $person_vehicle_number = $_POST['person_vehicle_number'];

     
       
// include db handler
     
// response Array
       
       $status=$db->insert_delivery_person($person_name,$person_address,$person_contact,$person_area,$person_attendance,$person_time,$person_vehicle_type,$person_vehicle_number);
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
	<h3 style="margin: 0px auto; wiodth:300px;">Delivery Person</h3>
</div>
<div id="left-pane" style="width:60%; height:87vh; float:left; display:flex; overflow-y:auto; ">
	
	<table class="table table-hover" style="margin:0px auto; width:90%;">
  	<tr><th>Name</th><th>Address</th><th>Contact</th><th>Area</th><th>Attendance</th><th>Available after</th><th>Vehicle Type</th><th>Vehicle Number</th></tr>
  	<?php
  		$res=$db->getDeliveryperson();
  		while($row = mysqli_fetch_assoc($res))
		{
			echo '<tr>';
   			echo '<td>'.$row['person_name'].'</td>';
   			echo '<td>'.$row['person_address'].'</td>';
   			echo '<td>'.$row['person_contact'].'</td>';
   			echo '<td>'.$row['area_name'].'</td>';
   			echo '<td>'.$row['person_attendance'].'</td>';
   			echo '<td>'.$row['person_time'].'</td>';
   			echo '<td>'.$row['person_vehicle_type'].'</td>';
   			echo '<td>'.$row['person_vehicle_number'].'</td>';
   			echo '</tr>';
		}
  	?>
	</table>
</div>
<div id="right-pane" style="width:38%; height:90vh;  display:flex;flex-direction:column; ">
	<div style="width:100%; height:10vh;   ">
	<h4 style="margin: 0px auto; wiodth:300px;">Add Delivery Person</h4>
	</div>

<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" class = "form-horizontal">
	
	
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Name</label>
			<div class="col-sm-8">
				<input type="text" name="person_name" class="form-control" id="applicant_name" placeholder="Name" size = "30" !important  maxlength = "50" value = "" required>
			</div>
	</div>

	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Residential Address</label>
			<div class="col-sm-8">
				
				<textarea type="text" name="person_address" step="0.01"class="form-control" id="applicant_name" placeholder="Tell us where you live." size = "30" !important  rows="3" value = "" required></textarea>
				
				
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Contact</label>
			<div class="col-sm-8">
				
				<input type="number" name="person_contact" step="1" class="form-control" id="applicant_name" placeholder="8765003288" size = "10" !important  maxlength = "20" value = "" required>
				
				
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Delivery Area</label>
			<div class="col-sm-8">
				<select name="person_area" class="form-control" required>
					  <?php  
        								$res=$db->getAreas();
        								
        								while($arraycontent=mysqli_fetch_array($res)){
            								echo '<option value="'.$arraycontent['area_id'].'">
        										'.$arraycontent['area_name'].'
        									</option>';

        								}
        								
        				?>
  
				</select>
			</div>
	</div>
	<input type="hidden" name="person_attendance" value="0">
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Availability Time</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="time" name="person_time" class="form-control" id="applicant_name" placeholder="Availability Time" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">Time</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="person_vehicle_type" class="col-sm-3 control-label" >Vehicle Type</label>
			<div class="col-sm-8">
				<select name="person_vehicle_type" class="form-control" required>
							<option value="" >--</option>
  							<option value="Bicycle" >Bicycle</option>
  							<option value="Motor Cycle" >Motor Cycle</option>
  							<option value="Scooter" >Scooter</option>
  							<option value="Four Wheeler" >Four Wheeler</option>
  							<option value="Truck" >Truck</option>
  
				</select>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Vehicle Number</label>
			<div class="col-sm-8">
				
				<input type="text"  name="person_vehicle_number" class="form-control"  placeholder="UP 65 BR 9633" title="Vehicle Number Should match UP 65 BR 9633" required>
					
			</div>
	</div>
	


	
	

	

	

	
	
	

	<input type="hidden" name="land" value="land">
	<p>
		<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name="deliveryperson" value="deliveryperson" class="btn btn-success">Add Delivery Person</button>
				</div>
			</div>
		</div>
	</p>
</form>
</div>





</body>

</html>
