<!DOCTYPE html>
<?php 
   require_once 'include/DB_Functions.php';
        $db = new DB_Functions();
?>
<?php
 if(isset($_POST['plants'])){
 	header('Location: plant.php');
 }else if(isset($_POST['lands'])){
 	header('Location: land.php');
 }else if(isset($_POST['customers'])){
 	header('Location: customerview.php');
 }else if(isset($_POST['caretakers'])){
 	header('Location: care-taker.php');
 }else if(isset($_POST['deliverypersons'])){
 	header('Location: deliveryperson.php');
 }else if(isset($_POST['orders'])){
 	header('Location: order.php');
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
	<h3 style="margin: 0px auto; wiodth:300px;">Plant Nursery Management</h3>
</div>

<?php
	if(isset($_POST['username']) && $_POST['username']=="shriyansh" && $_POST['password']=="f977lu08"){
		echo '<div id="right-pane" style="width:65%; height:90vh;  display:flex;flex-direction:column; ">
	<div style="width:100%; height:10vh;   ">
	<h4 style="margin: 0px auto; wiodth:300px;">Control Panel</h4>
	</div>

<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="admin.php" class = "form-horizontal">
	
	
	<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name="plants" value="plants" class="btn btn-success">Plants</button>
				</div>
			</div>
		</div>
	
	
</form>
<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="admin.php" class = "form-horizontal">
	
	
	<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name="lands"  value="lands" class="btn btn-success">Lands</button>
				</div>
			</div>
		</div>
	
	
</form>
<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="admin.php" class = "form-horizontal">
	
	
	<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name ="customers" value="customers" class="btn btn-success">Customers</button>
				</div>
			</div>
		</div>
	
	
</form>
<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="admin.php" class = "form-horizontal">
	
	
	<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name="caretakers" value="caretakers" class="btn btn-success">CareTakers</button>
				</div>
			</div>
		</div>
	
	
</form>
<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="admin.php" class = "form-horizontal">
	
	
	<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name="deliverypersons" value="deliverypersons" class="btn btn-success">Delivery People</button>
				</div>
			</div>
		</div>
	
	
</form>
<form name = "registerform" style="margin: 0px auto;" method="post"enctype="multipart/form-data" action="admin.php" class = "form-horizontal">
	
	
	<div class="form-group">
			<div style="float:right; margin-right:50px;">
				<div class="col-sm-offset-2 col-sm-5">
					<button id="submitSection1" type="submit" name="orders" value="orders" class="btn btn-success">Orders</button>
				</div>
			</div>
		</div>
	
	
</form>
</div>';
	}else{
		echo '<div id="right-pane" style="width:100%; height:90vh;  display:flex;flex-direction:column; ">
	<div style="width:100%; height:10vh;   ">
	<h4 style="margin: 0px auto; wiodth:300px;">Admin Login</h4>
	</div>
	<form name = "registerform" style="margin: 0px auto; width:50%" method="post"enctype="multipart/form-data" action="admin.php">


			<div class="form-group">
				<label for="applicant_name" class="col-sm-3 control-label" >username</label>
				<div class="col-sm-8">
					<input type="text" name="username" class="form-control" id="applicant_name" placeholder="username" size = "30" !important  maxlength = "50" value = "" required>
				</div>
			</div>

			
			<div class="form-group">
				<label for="applicant_name" class="col-sm-3 control-label" >password</label>
				<div class="col-sm-8">

					<input type="password" name="password" rows="3" class="form-control" id="applicant_name" placeholder="password"  !important  value = "" required>


				</div>
			</div>
			
			<p>
				<div class="form-group" >
					<div style="margin-right:0px auto; float:right">
						<div class=" col-sm-3" style="margin-right:0px auto;">
							<button id="submitSection1" type="submit" name="admin" value="admin" class="btn btn-success">Login</button>
						</div>
					</div>
				</div>
			</p>
		</form>
	</div>';
	}
?>






</body>

</html>
