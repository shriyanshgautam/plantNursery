<!DOCTYPE html>
<?php 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
?>
<?php

 
if(!(isset($_POST['customer'])|| isset($_POST['orderagain']))){
	header("Location: customerregister.php");
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
	<div id="copycontent" style="display:none;">
				<option value="" >--</option>
				<?php

				$res=$db->getPlants();
  					while($row = mysqli_fetch_assoc($res))
					{
					echo '<option value="'.$row['plant_id'].'?'.$row['biological_name'].'?'.$row['common_name'].'?'.$row['plant_rate'].'">'.$row['common_name'].'</option>';
					}
				?>
		
  
						
	</div>

	<div style="width:100%; height:10vh; display:flex; align-items:center; ">
		<h3 style="margin: 0px auto; wiodth:300px;">Create Order</h3>
	</div>
	
	<div id="right-pane" style="width:100%; height:90vh;  display:flex;flex-direction:column; align-items:center;">
		<form id="orderform" name = "registerform" method="POST" enctype="multipart/form-data" action="submitorder.php" >
		
		<table id="table" class="table table-hover" style="width:80%; height:80px; margin: 0px auto;">
		<tr class="success"><th>Common Name</th><th>Biological Name</th><th>Rate</th><th>Quantity</th><th>Total</th></tr>
		<tr>
		<td>	<div class="col-sm-12">
						<select id="plant_id0" name="plant_id0" class="form-control" required>
							<option value="" >--</option>
  							<?php

								$res=$db->getPlants();
  								while($row = mysqli_fetch_assoc($res))
								{
								echo '<option value="'.$row['plant_id'].'?'.$row['biological_name'].'?'.$row['common_name'].'?'.$row['plant_rate'].'">'.$row['common_name'].'</option>';
								}
							?>
  
						</select>
					


			</div>
		</td>
		<td>
				<div class="col-sm-12">
					
						<input type="text" name="biologicalname0" class="form-control" id="biologicalname0" placeholder="Biological Name" size = "10" !important  maxlength = "20" value = "" required disabled="">
						
					
				</div>
		</td>
		<td>
				<div class="col-sm-8">
					
						<input type="number" step="1" name="rate0" class="form-control" id="rate0" placeholder="Rate" size = "10" !important  maxlength = "20" value = "" required disabled="">
						
					
				</div>
		</td>
		<td>
			
				<div class="col-sm-10">
					
						<input type="number" step="1" name="quantity0" class="form-control" id="quantity0" placeholder="Quantity" size = "10" !important  maxlength = "20" value = "" required>
						
					
				</div>
			
		</td>
		<td>
				<div class="col-sm-8">
					
						<input type="number" step="1" name="total0" class="form-control" id="total0" placeholder="Total" size = "10" !important  maxlength = "20" value = "" required disabled="">
						
					
				</div>
		</td>
		<td>
						
		</td>
		</tr>

			
		</table>
					<div class="form-group" >
					<div style="margin-right:0px auto;">
						<div class=" col-sm-12" style="margin-right:0px auto;" >
							<input id="addmore" type="submit" name="customer" value="Add" class="btn btn-success">
						</div>
						</div>
					</div>

					<?php
						if(isset($_POST['customer'])){
							$customer_name = $_POST['customer_name'];
							$customer_gender = $_POST['customer_gender'];
							$customer_address = $_POST['customer_address'];
							$customer_contact = $_POST['customer_contact'];
							$customer_email = $_POST['customer_email'];  
							$customer_id=$db->insert_customer($customer_name,$customer_gender,$customer_address,$customer_contact,$customer_email);

							echo '<input type="hidden" name="customer_id" value="'.$customer_id.'">';
  
						}else if(isset($_POST['orderagain'])){

								$customer_id = $_POST['customer_id'];
								echo '<input type="hidden" name="customer_id" value="'.$customer_id.'">';
						}

					?>
					
		
		
  		

	


			
				<br>
					<div class="form-group">
						<label for="applicant_name" class="col-sm-3 control-label" >Delivery Area</label>
						<div class="col-sm-3">
							<select name="order_area" class="form-control" required>
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
				<br>
			
				<div class="form-group" >
					<div style="margin-right:0px auto;">
						<div class=" col-sm-12" style="margin-right:0px auto;">
							<button id="submitSection1" type="submit" name="createorder" value="createorder" class="btn btn-success">Submit Order</button>
						</div>
					</div>
				</div>
			
		</form>
	</div>





</body>
<script type="text/javascript">
	<?php
		echo 'var t=1;';
	?>
	$('#plant_id0').on('change', function() {
  				
  				var content=this.value;
  				res=content.split('?');
  				
  				
  				$("#biologicalname0").val(res[1]);
  				$("#rate0").val(res[3]);

  				var rate = res[3];
      		var quantity = $("#quantity0").val();
      		$("#total0").val(rate*quantity);
		});
	$('#quantity0').on('input',function(e){
      		
      		var rate = $("#rate0").val();
      		var quantity = $(this).val();
      		$("#total0").val(rate*quantity);
    });
   var i=0;
	var html="";
	$(function()  {
    	$('#addmore').click(function(){
    		i++;
        var content = $('#copycontent').html();
        var html='<tr><td>	<div class="col-sm-12">';
        	html+='<select name="plant_id'+i+'" id="plant_id'+i+'" class="form-control" required>';
			html+=content;
			html+='</select>';
			html+='</div></td>';

			html+='<td>';
			html+='<div class="col-sm-12">';
			html+='<input type="text"  name="biologicalname'+i+'" class="form-control" id="biologicalname'+i+'" placeholder="CommonName" size = "10" !important  maxlength = "20" value = "" required disabled>';
			html+='</div></td>';

			html+='<td>';
			html+='<div class="col-sm-8">';
			html+='<input type="number" step="1" name="rate'+i+'" class="form-control" id="rate'+i+'" placeholder="Rate" size = "10" !important  maxlength = "20" value = "" required disabled>';
			html+='</div></td>';

			html+='<td>';
			html+='<div class="col-sm-10">';
			html+='<input type="number" step="1" name="quantity'+i+'" class="form-control" id="quantity'+i+'" placeholder="Quantity" size = "10" !important  maxlength = "20" value = "" required>';
			html+='</div></td>';
			html+='<td>';
			html+='<div class="col-sm-8">';
			html+='<input type="number" step="1" name="total'+i+'" class="form-control" id="total'+i+'" placeholder="Total" size = "10" !important  maxlength = "20" value = "" required disabled>';
			html+='</div></td>';
			
			html+='<td>';
			
			html+='</td></tr>';
		$('#table').append(html);
		$('#plant_id'+i).on('change', function() {
  				
  				var content=this.value;
  				res=content.split('?');
  				
  				
  				$("#biologicalname"+i).val(res[1]);
  				$("#rate"+i).val(res[3]);

  				var rate = res[3];
      			var quantity = $("#quantity"+i).val();
      			$("#total"+i).val(rate*quantity);

		});
		$('#quantity'+i).on('input',function(e){
      		
      		var rate = $("#rate"+i).val();
      		var quantity = $(this).val();
      		$("#total"+i).val(rate*quantity);
      		
    	});
			
    });
  });

$('#orderform').submit(function () {
 for(j=0;j<=i;j++){
 	$("#total"+j).prop("disabled",false);
 }
 return true;
});
</script>

</html>
