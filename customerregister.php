<!DOCTYPE html>
<?php 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
?>
<?php
if(isset($_POST['customer'])){
	$customer_name = $_POST['customer_name'];
	$customer_gender = $_POST['customer_gender'];
	$customer_address = $_POST['customer_address'];
	$customer_contact = $_POST['customer_contact'];
	$customer_email = $_POST['customer_email'];  




// include db handler

// response Array

	$status=$db->insert_customer($customer_name,$customer_gender,$customer_address,$customer_contact,$customer_email);
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
		<h3 style="margin: 0px auto; wiodth:300px;">Customers</h3>
	</div>
	
	<div id="right-pane" style="width:100%; height:90vh;  display:flex;flex-direction:column; align-items:center;">
		<div style="width:35%; height:80px; margin: 0px auto;">
			
			 <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
     <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Details</a></li>
  </ul>

  
</div>
		</div>
		
		
  		

		<form name = "registerform" style="margin: 0px auto; width:50%" method="post"enctype="multipart/form-data" action="createorder.php">


			<div class="form-group">
				<label for="applicant_name" class="col-sm-3 control-label" >Name</label>
				<div class="col-sm-8">
					<input type="text" name="customer_name" class="form-control" id="applicant_name" placeholder="Name" size = "30" !important  maxlength = "50" value = "" required>
				</div>
			</div>

			<div class="form-group">
				<label for="applicant_name" class="col-sm-3 control-label" >Gender</label>
				<div class="col-sm-8">
						<select name="customer_gender" class="form-control" required>
							<option value="" >--</option>
  							<option value="Male" >Male</option>
  							<option value="Female" >Female</option>
  							<option value="Other" >Other</option>
  
						</select>
					


				</div>
			</div>
			<div class="form-group">
				<label for="applicant_name" class="col-sm-3 control-label" >Address</label>
				<div class="col-sm-8">

					<textarea type="text" name="customer_address" rows="3" class="form-control" id="applicant_name" placeholder="Tell us where you live"  !important  value = "" required></textarea>


				</div>
			</div>
			<input type="hidden" name="care_taker_attendance" value="0">
			<div class="form-group">
				<label for="applicant_name" class="col-sm-3 control-label" >Contact</label>
				<div class="col-sm-8">
					
						<input type="number" step="1" name="customer_contact" class="form-control" id="applicant_name" placeholder="8765003288" size = "10" !important  maxlength = "20" value = "" required>
						
					
				</div>
			</div>
			<div class="form-group">
				<label for="applicant_name" class="col-sm-3 control-label" >Email</label>
				<div class="col-sm-8">
					
						<input type="email"  name="customer_email" class="form-control" id="applicant_name" placeholder="Email" size = "50" !important  maxlength = "50" value = "" required>
					
				</div>
			</div>














			
			<p>
				<div class="form-group" >
					<div style="margin-right:0px auto; float:right">
						<div class=" col-sm-3" style="margin-right:0px auto;">
							<button id="submitSection1" type="submit" name="customer" value="customer" class="btn btn-success">Register</button>
						</div>
					</div>
				</div>
			</p>
		</form>
	</div>





</body>

</html>
