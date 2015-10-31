<?php

class DB_Functions {

    private $db;
    public $conn;

    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $conn=$this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function getLandList(){
        $conn=$this->db->connect();
        $sql = "SELECT * FROM land";
        $res = mysqli_query($conn,$sql);
        
        
       return $res;
    } 

    public function getSeasonList(){
        $conn=$this->db->connect();
        $sql = "SELECT season_id,season_name FROM season";
        $res = mysqli_query($conn,$sql);
        
        
       return $res;
    } 

    public function insert_plant($biological_name,$common_name,$land_size,$life_time,$irrigation_period,$average_plant_size,$suitable_season,$sunlight_hours,$average_temperature,$humidity,$land_id,$plant_rate){
        $conn=$this->db->connect();
        $result = mysqli_query($conn,"INSERT INTO plant(biological_name, common_name,land_size_required,life_time, irrigation_period,average_plant_size, suitable_season_id,sunlight_hours,average_temperature,humidity,land_id,plant_rate) VALUES('$biological_name', '$common_name', '$land_size', '$life_time', '$irrigation_period', '$average_plant_size' , $suitable_season,'$sunlight_hours','$average_temperature','$humidity','$land_id','$plant_rate')");
        // check for successful store
       if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($conn);
            return $uid;

        }else{
            return -1;
        }


    }

    public function insert_land($location,$soil,$size,$humidity,$composition,$nitrogen,$previous_crop_id,$pit_depth,$water_level,$moisture){
        $conn=$this->db->connect();
        $result = mysqli_query($conn,"INSERT INTO land(location_coordinates, soil,size, humidity, composition, nitrogen_amount, previous_crop_id, pit_depth,water_level,moisture_content) VALUES('$location','$soil', '$size', '$humidity', '$composition', '$nitrogen', $previous_crop_id , '$pit_depth',$water_level,$moisture)");
        // check for successful store
         if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        //echo("Error description: " . mysqli_error($conn));
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($conn);
            return $uid;

        }else{
            return -1;
        }

    }

    public function insert_caretaker($care_taker_name,$care_taker_address,$care_taker_contact,$care_taker_attendance,$care_taker_availability_time,$care_taker_working_hours){
          $conn=$this->db->connect();
        $result = mysqli_query($conn,"INSERT INTO care_taker(care_taker_name, address, contact_number, attendance, availability_time, working_hours) VALUES('$care_taker_name', '$care_taker_address', '$care_taker_contact', $care_taker_attendance, '$care_taker_availability_time', '$care_taker_working_hours')");
        // check for successful store
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($conn);
            return $uid;

        }else{
            return -1;
        }


    }

    public function insert_customer($customer_name,$customer_gender,$customer_address,$customer_contact,$customer_email){
              $conn=$this->db->connect();
        $result = mysqli_query($conn,"INSERT INTO customer(customer_name, customer_gender, customer_address, customer_contact, customer_email) VALUES('$customer_name', '$customer_gender', '$customer_address', $customer_contact, '$customer_email')");
        // check for successful store
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($conn);
            return $uid;

        }else{
            return -1;
        }
    }

    public function insert_delivery_person($person_name,$person_address,$person_contact,$person_area,$person_attendance,$person_time,$person_vehicle_type,$person_vehicle_number){
             $conn=$this->db->connect();
        $result = mysqli_query($conn,"INSERT INTO delivery_person(person_name, person_address, person_contact, person_area_id,person_attendance,person_time,person_vehicle_type,person_vehicle_number) VALUES('$person_name', '$person_address', '$person_contact', $person_area, $person_attendance,'$person_time','$person_vehicle_type','$person_vehicle_number')");
        // check for successful store
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($conn);
            return $uid;

        }else{
            return -1;
        }
    }
    //customer_id,order_date,order_amount,order_item_count,order_area
    public function insert_order($customer_id,$order_amount,$order_item_count,$order_area){
             $conn=$this->db->connect();
        $result = mysqli_query($conn,"INSERT INTO plant_nursery.order(customer_id, order_amount, order_item_count, order_area) VALUES($customer_id, $order_amount, $order_item_count, $order_area)");
        // check for successful store
        if(mysqli_error($conn)){
            echo("Error description:1 " . mysqli_error($conn));
        }
        
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($conn);
            return $uid;

        }else{
            return -1;
        }
    }

    //order_detail_order_id,order_plant_id,order_detail_quantity,order_detail_cost
    public function insert_order_detail($order_detail_order_id,$order_plant_id,$order_detail_quantity,$order_detail_cost){
             $conn=$this->db->connect();
        $result = mysqli_query($conn,"INSERT INTO order_detail(order_detail_order_id, order_plant_id, order_detail_quantity, order_detail_cost) VALUES($order_detail_order_id, $order_plant_id, $order_detail_quantity, '$order_detail_cost')");
        // check for successful store
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($conn);
            return $uid;

        }else{
            return -1;
        }
    }

    public function updateOrder($order_id,$delivery_person_id){
          $conn=$this->db->connect();
        $result = mysqli_query($conn,"UPDATE plant_nursery.order SET delivery_person_id=$delivery_person_id
                                               
                                WHERE order.order_id='$order_id'");
         if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
            return 0;
        }else{
            return 1;
        }

    }
     

    public function getCatetaker(){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT * FROM care_taker");
        return $res;
    }

     public function getCustomers(){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT * FROM customer");
        return $res;
    }

    public function getDeliveryperson(){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT * FROM delivery_person LEFT JOIN delivery_areas ON(delivery_person.person_area_id=delivery_areas.area_id)");
        return $res;
    }

    public function getLands(){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT * FROM land");
        return $res;
    }

    public function getAreas(){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT * FROM delivery_areas");
        return $res;
    }

    public function getPlants(){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT plant.plant_id,plant.biological_name,plant.common_name,plant.land_size_required,plant.life_time,plant.irrigation_period,plant.plant_rate,
                                    plant.average_plant_size,season.season_name,plant.sunlight_hours,plant.average_temperature,plant.humidity,
                                    land.location_coordinates 
                                    FROM plant 
                                    LEFT JOIN land ON (plant.land_id=land.location_coordinates)
                                    LEFT JOIN season ON (plant.suitable_season_id=season.season_id)
                                    ");
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        return $res;
    }

    public function getOrders(){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT 
                                    order.order_id ,order.order_amount , order.order_date , order.order_item_count,
                                    customer.customer_name, customer.customer_contact, customer.customer_email,customer.customer_address,
                                    delivery_person.person_name, delivery_person.person_contact,delivery_person.person_vehicle_number,delivery_person.person_vehicle_type,
                                    delivery_areas.area_name
                                    FROM plant_nursery.order
                                    LEFT JOIN customer ON (order.customer_id=customer.customer_id)
                                    LEFT JOIN delivery_person ON (order.delivery_person_id=delivery_person.person_id)
                                    LEFT JOIN delivery_areas ON (order.order_area=delivery_areas.area_id)
                                    ");
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        return $res;
    }

    public function getOrder($order_id){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT 
                                    order.order_id ,order.order_amount , order.order_date , order.order_item_count,
                                    customer.customer_name, customer.customer_contact, customer.customer_email,customer.customer_address,
                                    delivery_person.person_id,delivery_person.person_name, delivery_person.person_contact,delivery_person.person_vehicle_number,delivery_person.person_vehicle_type,
                                    delivery_areas.area_name,delivery_areas.area_pincode
                                    FROM plant_nursery.order
                                    LEFT JOIN customer ON (order.customer_id=customer.customer_id)
                                    LEFT JOIN delivery_person ON (order.delivery_person_id=delivery_person.person_id)
                                    LEFT JOIN delivery_areas ON (order.order_area=delivery_areas.area_id)

                                    WHERE order.order_id='$order_id'
                                    ");
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        return $res;
    }

    public function getOrderDetails($order_id){
         $conn=$this->db->connect();
        $res = mysqli_query($conn,"SELECT 
                                    order_detail.order_detail_id ,order_detail.order_detail_quantity , order_detail.order_detail_cost ,
                                    plant.biological_name,plant.common_name,plant.plant_rate
                                    FROM plant_nursery.order_detail
                                    LEFT JOIN plant ON (order_detail.order_plant_id=plant.plant_id)
                                    WHERE order_detail.order_detail_order_id='$order_id'
                                    ");
        if(mysqli_error($conn)){
            echo("Error description: " . mysqli_error($conn));
        }
        return $res;
    }

    public function getfeeds(){
        $maxid=mysql_query("SELECT id FROM news ORDER BY id DESC");
       $maxid=mysql_fetch_array($maxid);
        
        $leastid=$maxid["id"]-20;
        $result = mysql_query("SELECT * FROM news WHERE id >'$leastid'");
            $i=1;
        while($arraycontent=mysql_fetch_array($result)){
            $response[$i]["username"]=$arraycontent["username"];
            $response[$i]["content"]=$arraycontent["content"];
            $response[$i]["time"]=$arraycontent["time"];
            $i++;
        }
        return $response;

    }
    public function storeUser($name, $email, $password, $gender,$date,$month,$year,$phone) {
        $uuid_1 = uniqid('', true);
        $uuid_2 = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        $dob=$year.'-'.$month.'-'.$date;
        $result = mysql_query("INSERT INTO users(unique_id, name, email, password, salt, created_at, gender,dob,phone) VALUES('$uuid_1', '$name', '$email', '$encrypted_password', '$salt', NOW() , '$gender','$dob','$phone')");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE id = $uid");
            $arraycontent=mysql_fetch_array($result);
            $name=$arraycontent["name"];
            $time=$arraycontent["created_at"];
            $news='joined Campus Connect';
            $q=mysql_query("INSERT INTO news (unique_id,username,content,catagory,time)VALUES('$uuid_2','$name','$news','registration','$time')");
            // return user details
            if($q)
            return $arraycontent;
            else return false;
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
        $result = mysql_query("SELECT * FROM users WHERE email = '$email'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    
    /* Decrypting password
     * @param salt, password
     * returns hash string*/
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

    public function addtoprofile($request_id, $hostel, $relationship, $department, $year, $section, $hometown)
    {
        $result = mysql_query("UPDATE users SET hostel='$hostel',
                                                relationship='$relationship',
                                                department='$department',
                                                year='$year',
                                                section='$section',
                                                hometown='$hometown'
                                WHERE unique_id='$request_id'");
        if($result){
        $result = mysql_query("SELECT * FROM users WHERE unique_id = '$request_id'");
        return mysql_fetch_array($result);
        }
        else
        {
            return false;
        }
    }

    public function getprofile($request_id)
    {
        $result = mysql_query("SELECT * FROM users WHERE unique_id = '$request_id'");
        if($result)
        {
        return mysql_fetch_array($result);
    }
        else
        {
            return false;
        }
    }

    public function postbyuser($user_id, $content)
    {
        $uuid_1 = uniqid('', true);
        $uuid_2 = uniqid('', true);
        $result = mysql_query("SELECT name FROM users WHERE unique_id = '$user_id'");
        $name=mysql_fetch_array($result);
        $usname=$name["name"];
        $content=mysql_real_escape_string($content);
        $p=mysql_query("INSERT INTO feeds (post_id,user_id,user_name,content,time)VALUES('$uuid_1','$user_id','$usname','$content',NOW())");
        $id=mysql_insert_id(); 
        $result = mysql_query("SELECT * FROM feeds WHERE id = '$id'");
        $arraycontent=mysql_fetch_array($result);
        $time=$arraycontent["time"];
        $news='posted \"'.$content.'\"';
        echo $news;
        $q=mysql_query("INSERT INTO news (unique_id,username,content,catagory,time)VALUES('$uuid_2','$usname','$news','postbyuser','$time')");
        
        if($p and $q){
        return $arraycontent;
        }
        else
        {
            return false;
        }
    }

    public function like($post_id, $user_id)
    {
        $p=mysql_query("UPDATE feeds SET likes=likes+1 WHERE post_id='$post_id'");
        $result = mysql_query("SELECT * FROM feeds WHERE post_id = '$post_id'");
        $arraycontent=mysql_fetch_array($result);
        $postedby=$arraycontent["user_name"];
        $postcontent=$arraycontent["content"];
        $likedbycontent=mysql_query("SELECT * FROM users WHERE unique_id='$user_id'");
        $likedbyarraycontent=mysql_fetch_array($likedbycontent);
        $likedby=$likedbyarraycontent["name"];
        $news='likes the post '.$postcontent.' by '.$postedby;
        $uuid = uniqid('', true);
        $q=mysql_query("INSERT INTO news (unique_id,content,catagory)VALUES('$uuid','$news','like')");
        if($p and $q)
        {
        //$arraycontent=mysql_fetch_array($result);
           
        return $p;
        //return $result;
        }
        else
        {
            return false;
        }
    }

    public function dislike($post_id, $user_id)
    {
        $p= mysql_query("UPDATE feeds SET dislikes=dislikes+1 WHERE post_id='$post_id'");
        $result = mysql_query("SELECT * FROM feeds WHERE post_id = '$post_id'");
        $arraycontent=mysql_fetch_array($result);
        $postedby=$arraycontent["user_name"];
        $postcontent=$arraycontent["content"];
        $dislikedbycontent=mysql_query("SELECT * FROM users WHERE unique_id='$user_id'");
        $dislikedbyarraycontent=mysql_fetch_array($dislikedbycontent);
        $dislikedby=$dislikedbyarraycontent["name"];
        $news='disliked the post '.$postcontent.' by '.$postedby;
        $uuid =uniqid('',true);
        $q=mysql_query("INSERT INTO news (unique_id,content,catagory)VALUES('$uuid','$news','dislike')");
        if($p and $q)
        {
        return $p;
        //return $result;
    }
        else
        {
            return false;
        }
    }


}


?>

