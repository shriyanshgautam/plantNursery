<!DOCTYPE html>
<?php 
   require_once 'include/DB_Functions.php';
        $db = new DB_Functions();
?>
<?php
 if (isset($_POST['land'])){
// get tag
        $land_coordinates = $_POST['location_coordinates'];
        $size = $_POST['size'];
        $soil = $_POST['soil'];
        $humidity = $_POST['humidity'];
        $composition = $_POST['composition'];
        $nitrogen_amount = $_POST['nitrogen_amount'];

        $previous_crop_id = $_POST['previous_crop_id'];
        $previous_crop_id = !empty($previous_crop_id) ? "'$previous_crop_id'" : "NULL";
        $pit_depth = $_POST['pit_depth'];
        $water_level = $_POST['water_level'];
        $moisture_content = $_POST['moisture_content'];
        $moisture_content = !empty($moisture_content) ? "'$moisture_content'" : "NULL";

       $status=$db->insert_land($land_coordinates,$soil,$size,$humidity,$composition,$nitrogen_amount,$previous_crop_id,$pit_depth,$water_level,$moisture_content);
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
<div style="width:100%; height:8vh; display:flex; align-items:center; ">
	<h3 style="margin: 0px auto; wiodth:300px;">Land Plot Details</h3>
</div>
<div id="left-pane" style="width:65%; height:87vh; float:left; display:flex; overflow-y:auto; ">
	
	<table class="table table-hover" style="margin:0px auto; width:90%;">
  	<tr><th>Coordinates</th><th>Soil Type</th><th>Size</th><th>Humidity</th><th>Composition</th><th>Nitrogen</th><th>Prevois Crop</th><th>Pit Depth</th><th>Water Level</th><th>Moisture</th></tr>
  	<?php
  		$res=$db->getLands();
  		while($row = mysqli_fetch_assoc($res))
		{
			echo '<tr>';
   			echo '<td>'.$row['location_coordinates'].'</td>';
   			echo '<td>'.$row['soil'].'</td>';
   			echo '<td>'.$row['size'].' sq. meters</td>';
   			echo '<td>'.$row['humidity'].' %</td>';
   			echo '<td>'.$row['composition'].'</td>';
   			echo '<td>'.$row['nitrogen_amount'].' ppm</td>';
   			echo '<td>'.$row['previous_crop_id'].'</td>';
   			echo '<td>'.$row['pit_depth'].' meters</td>';
   			echo '<td>'.$row['water_level'].' cm</td>';
   			echo '<td>'.$row['moisture_content'].' %</td>';
   			echo '</tr>';
		}
  	?>
	</table>
</div>
<div id="right-pane" style="width:33%; height:90vh;  display:flex;flex-direction:column; ">
	<div style="width:100%; height:10vh;   ">
	<h4 style="margin: 0px auto; wiodth:300px;">Add Land Plot</h4>
	</div>

<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" class = "form-horizontal">
	
	
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Coordinates</label>
			<div class="col-sm-8">
				<input type="number" name="location_coordinates" step="1" class="form-control" id="applicant_name" placeholder="Land Coordinates" size = "30" !important  maxlength = "20" value = "" required>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Soil Type</label>
			<div class="col-sm-8">
				<select name="soil" class="form-control" required>
							<option value="" >--</option>
  							<option value="Alluvial" >Alluvial Soil</option>
  							<option value="Black Soil" >Black Soil</option>
  							<option value="Red Soil" >Red Soil</option>
  							<option value="Laterite Soil" >Laterite Soil</option>
  							<option value="Mountain Soil" >Mountain Soil</option>
  							<option value="Desert Soil" >Desert Soil</option>
  							
				</select>
			</div>
	</div>

	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Land Size</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="size" step="0.01"class="form-control" id="applicant_name" placeholder="Land Size" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">sq. meters</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Humidity</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="humidity" step="0.01" class="form-control" id="applicant_name" min="0" max="100" placeholder="Humidity Level" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">%</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Composition</label>
			<div class="col-sm-8">
				<textarea type="text" name="composition" rows="3"class="form-control" id="applicant_name" placeholder="Composition Description"  !important   value = "" required></textarea>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Nitrogen</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" step="1" name="nitrogen_amount" class="form-control" id="applicant_name" min="0"max="1000" placeholder="Nitrogen Level" size = "30" !important  maxlength = "20" value = "" required>
					<div class="input-group-addon">ppm</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Previous Crop</label>
			<div class="col-sm-8">
				<input type="text" name="previous_crop_id" class="form-control" id="applicant_name" placeholder="(if available)" size = "30" !important  maxlength = "20" value = "" >
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Pit Depth</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="pit_depth" step="0.01" class="form-control" id="applicant_name" min="0" placeholder="Pit Depth" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">meters</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Water Level</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" step="0.01"name="water_level" class="form-control" id="applicant_name" min="0"placeholder="Water Level" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">centimeters</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Moisture</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" step="0.01"name="moisture_content" class="form-control" id="user_mob" min="0" max="100"placeholder="Moisture Content" size = "30" !important maxlength = "20" value = "" required>
				<div class="input-group-addon">%</div>
				</div>
			
			</div>
	</div>


	
	

	

	

	
	
	

	<input type="hidden" name="land" value="land">
	<p>
		<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" class="btn btn-success">Insert Land</button>
				</div>
			</div>
		</div>
	</p>
</form>
</div>





</body>

</html>
