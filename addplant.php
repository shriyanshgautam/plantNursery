<!DOCTYPE html>
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
<div style="width:100%; height:70px; display:flex; padding-top:40px;">
	<h3 style="margin: 0px auto; height:50px;wiodth:300px;">Insert Plant</h3>
</div>

<div style="width:100%; display:flex;">
	<div style="width:70%; margin:0px auto;">
<form  name = "registerform" method = "post" action = "home.php" enctype = "multipart/form-data" class = "form-horizontal">
	
	
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Biological Name</label>
			<div class="col-sm-4">
				<input type="name" name="biological_name" step="1" class="form-control" id="applicant_name" placeholder="Biologica Name" size = "30" !important  maxlength = "20" value = "" required>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Common Name</label>
			<div class="col-sm-4">
				<input type="name" name="common_name" step="1" class="form-control" id="applicant_name" placeholder="Common Name" size = "30" !important  maxlength = "20" value = "" required>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Land Size</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input type="number" name="land_size_required" step="0.01"class="form-control" id="applicant_name" placeholder="Land Size" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">sq. meters</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Life Time</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input type="number" name="life_time" step="1"class="form-control" id="applicant_name" placeholder="Life Time" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">days</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Irrigation Period</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input type="number" name="irrigation_period" step="1"class="form-control" id="applicant_name" placeholder="Irrigation Period" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">days</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Average Plant Size</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input type="number" name="average_plant_size" step="1"class="form-control" id="applicant_name" placeholder="Average Plant Size" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">centimeters</div>
				</div>
			</div>
	</div>
	
	<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Suitable Season</label>
						<div class="col-sm-4">
							<select name="suitable_season" class="form-control">

								
								<?php   require_once 'include/DB_Functions.php';
        								$db = new DB_Functions();
        								$res=$db->getSeasonList();
        								
        								while($arraycontent=mysqli_fetch_array($res)){
            								echo '<option value="'.$arraycontent['season_id'].'">
        										'.$arraycontent['season_name'].'
        									</option>';

        								}
        								
        								?>

							</select>
						</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Sunlight Hours</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input type="number" name="sunlight_hours" step="0.01"class="form-control" id="applicant_name" placeholder="Sunlight Hours" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">hours</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Average Temperature</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input type="number" name="average_temperature" step="0.01"class="form-control" id="applicant_name" placeholder="Average Temperature" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">celcius</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-2 control-label" >Humidity</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input type="number" name="humdity" step="0.01"class="form-control" id="applicant_name" placeholder="Humidity" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">%</div>
				</div>
			</div>
	</div>
	<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Land</label>
						<div class="col-sm-4">
							<select name="land_id"class="form-control">

								
								<?php   require_once 'include/DB_Functions.php';
        								$db = new DB_Functions();
        								$res=$db->getLandList();
        								
        								while($arraycontent=mysqli_fetch_array($res)){
            								echo '<option value="'.$arraycontent['location_coordinates'].'">Land:
        										'.$arraycontent['size'].' sq. meters )
        									</option>';

        								}
        								
        								?>

							</select>
						</div>
	</div>

	
	
	


	
	

	

	

	
	
	

	<input type="hidden" name="plant" value="plant">
	<p>
		<div class="form-group">
			<div style="">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" class="btn btn-success">Insert Plant</button>
				</div>
			</div>
		</div>
	</p>
</form>
</div>
</div>





</body>
</html>
