
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

<div id="right-pane" style="width:100%; height:90vh; margin: 0px auto; display:flex; align-items:center; ">
  <div style="width:30%; height:50%; margin: 0px auto;  ">
  
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Admin</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Login</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>
  </div>



</div>





</body>

</html>
