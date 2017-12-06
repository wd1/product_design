<?php
include_once '../dbconnect.php';

    $productname = $_POST['product_name'];
    $user_id = $_POST['userid'];
    if($_POST['adminid']=="") {
        $query="SELECT * FROM products WHERE mockup_name='$productname' AND user_id ='$user_id'";
    }
    else
    {
        $query="SELECT * FROM products WHERE mockup_name='$productname'";
    }
    // $query = "SELECT mockup_name FROM products WHERE mockup_name='$productname' AND user_id ='$user_id'";
    $result = mysqli_query($conn,$query);
    
    $count = mysqli_num_rows($result);
    if($count!=0){
        if(file_exists("../img/product1/".$productname.".png")) {
            unlink("../img/product1/".$productname.".png");
        }
        if(file_exists("../img/product1/".$productname."-mask.png")) {
            unlink("../img/product1/".$productname."-mask.png");
        }
        if(file_exists("../img/product1/".$productname."-shadow.png")) {
            unlink("../img/product1/".$productname."-shadow.png");
        }
        if(file_exists("../img/product1/".$productname."-texture-dark.png")) {
            unlink("../img/product1/".$productname."-texture-dark.png");
        }
        if(file_exists("../img/product1/".$productname."-texture-white.png")) {
            unlink("../img/product1/".$productname."-texture-white.png");
        }
        if($_POST['adminid']=="") {
            $query1 = "DELETE FROM products WHERE mockup_name='$productname' AND user_id ='$user_id'";
        } else {
            $query1 = "DELETE FROM products WHERE mockup_name='$productname'";
        }
        $result1 = mysqli_query($conn,$query1);
        echo 'success';
    }
    
    // if( !$error ) {
	// 	$productname = $_POST['product_name'];
    //     $width = $_POST['width'];
    //     $height = $_POST['height'];
    //     if($width == '')
    //         $width = 0;
    //     if($height == '')
    //         $height = 0;
    //     $x = $_POST['x'];
    //     $y = $_POST['y'];
    //     $blend_mode = $_POST['blend_mode'];
    //     $opacity = $_POST['opacity'];
    //     $user = $_POST['userid'];
    //     $admin = $_POST['adminid'];
    //     $mockup_list = $_POST['mockup_list'];
    //     $query = "INSERT INTO products(mockup_name,width,height,x,y,user_id,blend_mode,opacity,admin,mockup_list) VALUES('$productname','$width','$height','$x','$y','$user','$blend_mode','$opacity','$admin','$mockup_list')";
    //     // $query = "INSERT INTO products(mockup_name,width,height,x,y,user_id,blend_mode,opacity) VALUES('".$productname."','".$width."','".$height."','".$x."','".$y."','".'aaa'."','".$blend_mode."','".$opacity."')";
    //     // echo $query;
    //     $res = mysql_query($query);
            
    //     if ($res) {
    //         $errTyp = "success";
    //         $errormsg = "Successfully registered, you may login now";
    //     } else {
    //         $errTyp = "danger";
    //         $errormsg = "Something went wrong, try again later...";	
    //     }	
            
    // }

?>