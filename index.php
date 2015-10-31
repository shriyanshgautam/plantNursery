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
	

	<div style="width:100%; height:10vh; display:flex; align-items:center; ">
		<h3 style="margin: 0px auto; wiodth:300px;">Plant Nursery Management System</h3>
	</div>
	
	<div id="right-pane" style="width:100%; height:90vh;  display:flex;flex-direction:column; align-items:center;">
		<form id="orderform" name = "registerform" style="height:20%;" method="POST" enctype="multipart/form-data" action="customerregister.php" >
		
		

					
				<div class="form-group" >
					<div style="margin-right:0px auto;">
						<div class=" col-sm-12" style="margin-right:0px auto;">
							<button id="submitSection1" type="submit" name="p" value="p" class="btn btn-success">Customer</button>
						</div>
					</div>
				</div>
			
		</form>
		<br>
		<br>
		<br>
		<br>
		<form id="orderform" name = "registerform" method="POST" enctype="multipart/form-data" action="admin.php" >
		
		

					
				<div class="form-group" >
					<div style="margin-right:0px auto;">
						<div class=" col-sm-12" style="margin-right:0px auto;">
							<button id="submitSection1" type="submit" name="p" value="p" class="btn btn-success">Admin</button>
						</div>
					</div>
				</div>
			
		</form>
	</div>





</body>



</html>
