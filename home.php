<?php
 	

    if (isset($_POST['land'])){
// get tag
        $land_coordinates = $_POST['land_coordinates'];
        $size = $_POST['size'];
        $humidity = $_POST['humidity'];
        $composition = $_POST['composition'];
        $nitrogen_amount = $_POST['nitrogen_amount'];

        $previous_crop_id = $_POST['previous_crop_id'];
        $previous_crop_id = !empty($previous_crop_id) ? "'$intLng'" : "NULL";
        $pit_depth = $_POST['pit_depth'];
        $water_level = $_POST['water_level'];
        $moisture_content = $_POST['moisture_content'];

        if(strcmp($moisture_content, "")){
        	$moisture_content=null;
        }


// include db handler
        require_once 'include/DB_Functions.php';
        $db = new DB_Functions();
// response Array
       
       $status=$db->insert_land($land_coordinates,$size,$humidity,$composition,$nitrogen_amount,$previous_crop_id,$pit_depth,$water_level,$moisture_content);
       if($status!=-1){
       	 echo 'Inserted Successfully';
         include 'land.html';
       }else{
       		echo 'Error in insertion';
       }

      }else if(isset($_POST['plant'])){

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

          // include db handler
          require_once 'include/DB_Functions.php';
          $db = new DB_Functions();
// response Array
       
       $status=$db->insert_plant($biological_name,$common_name,$land_size,$life_time,$irrigation_period,$average_plant_size,$suitable_season,$sunlight_hours,$average_temperature,$humidity,$land_id);
       if($status!=-1){
         echo 'Inserted Successfully';
         include 'addplant.php';
       }else{
          echo 'Error in insertion';
       }

    

      }else{
      	echo 'invalid access';
      }

?>