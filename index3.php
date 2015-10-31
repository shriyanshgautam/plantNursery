<?php

/**
* File to handle all API requests
* Accepts GET and POST
* 
* Each request will be identified by TAG
* Response will be JSON data
* check for POST request 
*/
session_start();
if(isset($_COOKIE['user'])){


        // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();

    $request_id=$_COOKIE['user'];
    $profile=$db->getprofile($request_id);
    if($profile){
        //$response["success"]=1;
        $username=$profile["name"];
        $email=$profile["email"];
        $gender=$profile["gender"];
        $dob=$profile["dob"];
        $phone=$profile["phone"];
        $hostel=$profile["hostel"];
        $relationship=$profile["relationship"];
        $department=$profile["department"];
        $year=$profile["year"];
        $section=$profile["section"];
        $hometown=$profile["hometown"];
        $resp=$db->getfeeds();
        date_default_timezone_set('Asia/Calcutta');
        $currtime=date("Y-m-d H:i:s");
        if(isset($_POST['request']) && $_POST['request']=='profileupdate'){
            $unique_id=$request_id;
            $hostel=$_POST['hostel'];
            $relationship=$_POST['relationship'];
            $department=$_POST['department'];
            $year=$_POST['year'];
            $section="";
            $hometown="";
            if($year==1){$section=$_POST['section'];}
            if($_POST['hometown']!=""){$hometown=$_POST['hometown'];}

            $result=$db->addtoprofile($unique_id,$hostel,$relationship,$department,$year,$section,$hometown);
            if($result){
                $response["success"]=1;
                $response["hostel"]=$result["hostel"];
                $response["relationship"]=$result["relationship"];
                $response["department"]=$result["department"];
                $response["year"]=$result["year"];
                $response["section"]=$result["section"];
                $response["hometown"]=$result["hometown"];
                //echo json_encode($response);
                setcookie("isprofileok", "", time()-3600);
                header("Refresh:0.1;");


            }else{

                $response["error"]=3;
                $response["error_msg"]="Error in adding to database";
                echo json_encode($response);
            }
//request for sending news feed giving the last feed available to client
        } else 
        if(isset($_COOKIE['isprofileok'])&&$_COOKIE['isprofileok']=='false'){


            include 'profileextension.html';

        }
        else{
         include 'welcome.html'; 
     }

 }else{
   $response["error"]=4;
   $response["error_msg"]="Error in retriving profile";
   echo json_encode($response);

}
if(isset($_POST['request']) && $_POST['request']=='postbyuser'){
    $user_id=$request_id;
    $content=htmlspecialchars($_POST['content']);


    $post=$db->postbyuser($user_id,$content);
    if($post){
        $response["success"]=1;
        $response["name"]=$post["user_name"];
        $response["content"]=$post["content"];
        $response["time"]=$post["time"];
       // echo json_encode($response);
        header("Refresh:0.1;");
    }else{
        $response["error"]=5;
        $esponse["error_msg"]="error in adding post to database";
        echo json_encode($response);
    }

    //registering users        **done
}else if(isset($_POST['request']) && $_POST['request']=='uploadpic'){
    $allowedExts = array("gif", "jpeg", "jpg", "png","JPEG","JPG");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/JPEG")
        || ($_FILES["file"]["type"] == "image/JPG")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 700000)
        && in_array($extension, $allowedExts))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        }
        else
        {
            //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            //echo "Type: " . $_FILES["file"]["type"] . "<br>";
            //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

            if (file_exists("upload/" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"] . " already exists. ";
                apc_delete_file(keys);
            }
            else
                {   $photourl="images/".$username.".jpg";

            move_uploaded_file($_FILES["file"]["tmp_name"],$photourl);
        }
    }
}
else
{
    echo "Invalid file";
}

}else if(isset($_POST['request']) && $_POST['request']=='logout'){
    setcookie("user", "", time()-3600);
    header("Refresh:0.1;");
}
else{

}
}else {
    include 'index.html';
    if (isset($_POST['request']) && $_POST['request'] != '') {
// get tag
        $tag = $_POST['request'];

// include db handler
        require_once 'include/DB_Functions.php';
        $db = new DB_Functions();
// response Array
        $response = array("request" => $tag, "success" => 0, "error" => 0);


// check for tag type
        if ($tag == 'login') {
    // Request type is Login
            $email = $_POST['email'];
            $password = $_POST['password'];

    // check for user
            $user = $db->getUserByEmailAndPassword($email, $password);
            if ($user != false) {
        // user found
        // echo json with success = 1
                $response["success"] = 1;
                $response["uid"] = $user["unique_id"];
                $response["user"]["name"] = $user["name"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["created_at"] = $user["created_at"];
                $response["user"]["hostel"]=$user["hostel"];
        //echo $response;
                setcookie("user", $user["unique_id"], time()+3600);
                if($user["hostel"]==""){
                    setcookie("isprofileok",'false',time()+3600);
                }
                else{
                    setcookie("isprofileok",'true',time()+3600);
                }

                header("Refresh:0.1;");
            } else {
        // user not found
        // echo json with error = 1
                $response["error"] = 1;
                $response["error_msg"] = "Incorrect email or password!";
                echo json_encode($response);
            }


 //adding additional details to profile      ***done
        } else if($tag=='like'){
            $post=$_POST['post_id'];
            $user=$_POST['user_id'];
            $resp=$db->like($post,$user);
            if($resp){
                $response["success"]=1;
                $response["success_msg"]="content liked";
                echo json_encode($response);
            }else{
             $response["error"]=6;
             $response["error_msg"]="unable to like the content";
             echo json_encode($response);
         }
     }else if($tag=='dislike'){

       $post=$_POST['post_id'];
       $user=$_POST['user_id'];
       $resp=$db->dislike($post,$user);
       if($resp){
        $response["success"]=1;
        $response["success_msg"]="content disliked";
        echo json_encode($response);
    }else{
        $response["error"]=6;
        $response["error_msg"]="unable to like the content";
        echo json_encode($response);
    }

}else if($tag=='requestfeed'){
   $lastfeed=$_POST['lastfeed'];
   $db->getfeed($lastfeed);



//request of profile details by other users  **done
}else if ($tag == 'register') {
    // Request type is Register new user
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender=$_POST['gender'];
    $date=$_POST['date'];
    $month=converttomonth($_POST['month']);
    $year=$_POST['year'];
    $phone=$_POST['phone'];

    // check if user is already existed
    if ($db->isUserExisted($email)) {
        // user is already existed - error response
        $response["error"] = 2;
        $response["error_msg"] = "User already exits";
        echo json_encode($response);
    } else {
        // store user
        $user = $db->storeUser($name,$email,$password,$gender,$date,$month,$year,$phone);
        if ($user) {

            $_SESSION['user']=$user["unique_id"];
            // user stored successfully
            $response["success"] = 1;
            $response["uid"] = $user["unique_id"];
            $response["user"]["name"] = $user["name"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["created_at"] = $user["created_at"];
            $response["user"]["dob"] = $user["dob"];
            $response["user"]["phone"] = $user["phone"];
            setcookie("user", $user["unique_id"], time()+3600);
            setcookie("isprofileok",'false',time()+3600);
            header("Refresh:0.1;");

            //echo json_encode($response);
            //mail('rahularyan005@gmail.com','Works!','An email has been generated from your localhost, congratulations!');

        } else {
            // user failed to store
            $response["error"] = 1;
            $response["error_msg"] = "Error occured in Registartion";
            echo json_encode($response);
        }
    }
} else {
    echo "Invalid Request : Server-Shriyansh";
}          
}
}
function converttomonth($txt){
    if($txt=='Jan') return 1;
    if($txt=='Feb') return 2;
    if($txt=='Mar') return 3;
    if($txt=='Apr') return 4;
    if($txt=='May') return 5;
    if($txt=='Jun') return 6;
    if($txt=='Jul') return 7;
    if($txt=='Aug') return 8;
    if($txt=='Sep') return 9;
    if($txt=='Oct') return 10;
    if($txt=='Nov') return 11;
    if($txt=='Dec') return 12;


}

?>