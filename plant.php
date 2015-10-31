<!DOCTYPE html>
<?php 
   require_once 'include/DB_Functions.php';
        $db = new DB_Functions();
?>
<?php
 if (isset($_POST['plant'])){
// get tag
       
          $biological_name=$_POST['biological_name'];
          $common_name=$_POST['common_name'];
          $land_size = $_POST['land_size_required'];
          $life_time =$_POST['life_time'];
          $irrigation_period = $_POST['irrigation_period'];
          $average_plant_size = $_POST['average_plant_size'];
          $suitable_season = $_POST['suitable_season'];
          $sunlight_hours = $_POST['sunlight_hours'];
          $average_temperature = $_POST['average_temperature'];
          $humidity = $_POST['humdity'];
          $land_id = $_POST['land_id'];
          $plant_rate = $_POST['plant_rate'];

         
       $status=$db->insert_plant($biological_name,$common_name,$land_size,$life_time,$irrigation_period,$average_plant_size,$suitable_season,$sunlight_hours,$average_temperature,$humidity,$land_id,$plant_rate);
       // if($status!=-1){
       //   echo 'Inserted Successfully';
        
       // }else{
       //    echo 'Error in insertion';
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
	<h3 style="margin: 0px auto; wiodth:300px;">Plant Details</h3>
</div>
<div id="left-pane" style="width:65%; height:87vh; float:left; display:flex; overflow-y:auto; ">
	
	<table class="table table-hover" style="margin:0px auto; width:90%;">
  	<tr><th>Scientific Name</th><th>Common Name</th><th>Land Size</th><th>Life</th><th>Irrigation Period</th><th>Plant Size</th><th>Suitable Season</th><th>Sunlight Hours</th><th>Avg Tempertature</th><th>Humidity</th><th>Land</th><th>Rate</th></tr>
  	<?php
  		$res=$db->getPlants();
  		while($row = mysqli_fetch_assoc($res))
		{
			echo '<tr>';
   			echo '<td>'.$row['biological_name'].'</td>';
   			echo '<td>'.$row['common_name'].'</td>';
   			echo '<td>'.$row['land_size_required'].' sq. meters</td>';
   			echo '<td>'.$row['life_time'].' days</td>';
   			echo '<td>'.$row['irrigation_period'].' days</td>';
   			echo '<td>'.$row['average_plant_size'].' cm</td>';
   			echo '<td>'.$row['season_name'].'</td>';
   			echo '<td>'.$row['sunlight_hours'].' hours</td>';
   			echo '<td>'.$row['average_temperature'].' celcius</td>';
   			echo '<td>'.$row['humidity'].' %</td>';
   			echo '<td>'.$row['location_coordinates'].'</td>';
   			echo '<td>&#8377; '.$row['plant_rate'].'</td>';
   			echo '</tr>';
		}
  	?>
	</table>
</div>
<div id="right-pane" style="width:33%; height:90vh;  display:flex;flex-direction:column; ">
	<div style="width:100%; height:10vh;   ">
	<h4 style="margin: 0px auto; wiodth:300px;">Add Plant</h4>
	</div>

<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" class = "form-horizontal">
	
	
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Scientific Name</label>
			<div class="col-sm-8">
				<input type="name" name="biological_name" step="1" class="form-control" id="applicant_name" placeholder="Biologica Name" size = "30" !important  maxlength = "20" value = "" required>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Common Name</label>
			<div class="col-sm-8">
				<input type="name" name="common_name" step="1" class="form-control" id="applicant_name" placeholder="Common Name" size = "30" !important  maxlength = "20" value = "" required>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Land Size</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="land_size_required" step="0.01"class="form-control" id="applicant_name" min="0" placeholder="Land Size" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">sq. meters</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Life Time</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="life_time" step="1"class="form-control" id="applicant_name" min="0" placeholder="Life Time" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">days</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Irrigation Period</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="irrigation_period" step="1"class="form-control" id="applicant_name" min="0" placeholder="Irrigation Period" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">days</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Average Plant Size</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="average_plant_size" step="1"class="form-control" id="applicant_name" min="0" placeholder="Average Plant Size" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">centimeters</div>
				</div>
			</div>
	</div>
	
	<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Suitable Season</label>
						<div class="col-sm-8">
							<select name="suitable_season" class="form-control">

								
								<?php  
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
			<label for="applicant_name" class="col-sm-3 control-label" >Sunlight Hours</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="sunlight_hours" step="0.01"class="form-control" id="applicant_name" min="0" max="16" placeholder="Sunlight Hours" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">hours</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Average Temperature</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="average_temperature" step="0.01"class="form-control" id="applicant_name" min="0" placeholder="Average Temperature" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">celcius</div>
				</div>
			</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Humidity</label>
			<div class="col-sm-8">
				<div class="input-group">
				<input type="number" name="humdity" step="0.01"class="form-control" id="applicant_name" min="0" max="100" placeholder="Humidity" size = "30" !important  maxlength = "20" value = "" required>
				<div class="input-group-addon">%</div>
				</div>
			</div>
	</div>
	<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Land</label>
						<div class="col-sm-8">
							<select name="land_id"class="form-control">

								
								<?php   
        								$res=$db->getLandList();
        								
        								while($arraycontent=mysqli_fetch_array($res)){
            								echo '<option value="'.$arraycontent['location_coordinates'].'">Land:
        										'.$arraycontent['location_coordinates'].' '.$arraycontent['soil'].' ( '.$arraycontent['size'].' sq. meters )
        									</option>';

        								}
        								
        								?>

							</select>
						</div>
	</div>
	<div class="form-group">
			<label for="applicant_name" class="col-sm-3 control-label" >Rate</label>
			<div class="col-sm-8">
				<div class="input-group">
				<div class="input-group-addon">&#8377;</div>
				<input type="number" name="plant_rate" step="0.01"class="form-control" id="applicant_name" min="0"  placeholder="Selling Rate (Optional)" size = "30" !important  maxlength = "20" value = "" >
				
				</div>
			</div>
	</div>


	<input type="hidden" name="plant" value="plant">
	<p>
		<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" class="btn btn-success">Insert Plant</button>
				</div>
			</div>
		</div>
	</p>
	
</form>
</div>





</body>

</html>
