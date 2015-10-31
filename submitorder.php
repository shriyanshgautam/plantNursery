<!DOCTYPE html>
<?php 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
?>
<?php

 
if(isset($_POST['createorder'])){
	$order_amount=0;
	$order_item_count=0;

	for ($q = 0; $q <= 20; $q++){
    	if (!isset($_POST["plant_id".$q.""])){
         	break;
    	 }   
    	$quantity = $_POST['quantity'.$q];
    	$total = $_POST['total'.$q];

    	$order_item_count++;
    	$order_amount+=$total;

	 }
	 $customer_id=$_POST['customer_id'];
	 $order_area = $_POST['order_area'];
	 $order_id=$db->insert_order($customer_id,$order_amount,$order_item_count,$order_area);

	for ($q = 0; $q <= 20; $q++){
    	if (!isset($_POST["plant_id".$q.""])){
         	break;
    	 }       	 
    	$order_plant_id=$_POST['plant_id'.$q];
    	$res=explode("?",$order_plant_id);
    	$order_plant_id=$res[0];
    	$order_detail_quantity = $_POST['quantity'.$q];
    	$order_detail_cost = $_POST['total'.$q];
    	$db->insert_order_detail($order_id,$order_plant_id,$order_detail_quantity,$order_detail_cost);

	 }

	 
	 
}else{
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
		<form id="orderform" name = "registerform" style="height:20%;" method="POST" enctype="multipart/form-data" action="createorder.php" >
		
		

					<?php
						echo '<input type="hidden" name="customer_id" value="'.$customer_id.'">';

					?>
				<div class="form-group" >
					<div style="margin-right:0px auto;">
						<div class=" col-sm-12" style="margin-right:0px auto;">
							<button id="submitSection1" type="submit" name="orderagain" value="orderagain" class="btn btn-success">Order Again</button>
						</div>
					</div>
				</div>
			
		</form>
		<form id="orderform" name = "registerform" method="POST" enctype="multipart/form-data" action="createorder.php" >
		
		

					<?php
						echo '<input type="hidden" name="customer_id" value="'.$customer_id.'">';

					?>
				<div class="form-group" >
					<div style="margin-right:0px auto;">
						<div class=" col-sm-12" style="margin-right:0px auto;">
							<button id="submitSection1" type="submit" name="nothing" value="nothing" class="btn btn-success">Home</button>
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
   var i=1;
	var html="";
	$(function()  {
    $('#addmore').click(function(){
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
      		i++;
    });

    });
  });

$('#orderform').submit(function () {
 for(j=0;j<i;j++){
 	$("#total"+j).prop("disabled",false);
 }
 return true;
});
</script>

</html>
