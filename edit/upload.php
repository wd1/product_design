<?php
include_once '../dbconnect.php';
$error = false;
$errormsg='';
$productname = trim($_POST['product_name']);
// if(isset($_FILES['product_file'])) {
//     echo $_FILES['product_file']['tmp_name'];
    // if(move_uploaded_file($_FILES['product_file']['tmp_name'],"../img/product1/".$_POST['product_name'].'.png')) {
    if(file_exists("../img/temp/".$_POST['product_name'].".png")) {
        if(copy('../img/temp/'.$_POST['product_name'].'.png','../img/product1/'.$_POST['product_name'].'.png')) {
            unlink('../img/temp/'.$_POST['product_name'].'.png');
            // echo $_FILES['product_file']['name']. " OK";
        } else {
            // echo $_FILES['product_file']['name']. " No Product File";
            $errormsg = 'No Product File';
            $error = true;
        }
    }
    echo $errormsg;
    // if(isset($_FILES['mask_file'])) {
        // if(move_uploaded_file($_FILES['mask_file']['tmp_name'],"../img/product1/".$_POST['mask_name'].'.png')) {
    if(file_exists("../img/temp/".$_POST['product_name']."-mask.png")) {
        if(copy('../img/temp/'.$_POST['product_name'].'-mask.png','../img/product1/'.$_POST['product_name'].'-mask.png')){
            unlink("../img/temp/".$_POST['product_name']."-mask.png");
            // echo $_FILES['mask_file']['name']. " OK";
        } else {
            // echo $_FILES['mask_file']['name']. " No Mask File";
            $errormsg = 'No Mask File';
            $error = true;
        }
    }
    echo $errormsg;
    // }
    // if(isset($_FILES['shadow_file'])) {
    //     echo $_POST['shadow_name']. " OK";
        // if(move_uploaded_file($_FILES['shadow_file']['tmp_name'],"../img/product1/".$_POST['shadow_name'].'.png')) {
    if(file_exists("../img/temp/".$_POST['product_name']."-shadow.png")) {
        if(copy('../img/temp/'.$_POST['product_name'].'-shadow.png','../img/product1/'.$_POST['product_name'].'-shadow.png')){
            unlink('../img/temp/'.$_POST['product_name'].'-shadow.png');
            // echo $_FILES['shadow_file']['name']. " OK";
        } else {
            // echo $_FILES['shadow_file']['name']. " No Shadow File";
            $errormsg = 'No Shadow File';
            $error = true;
        }
    }
    echo $errormsg;
    // }
    // if(isset($_FILES['texture-dark_file'])) {
    //     if(move_uploaded_file($_FILES['texture-dark_file']['tmp_name'],"../img/product1/".$_POST['texture-dark_name'].'.png')) {
    $texture_dark = 0;
    if(file_exists("../img/temp/".$_POST['product_name']."-texture-dark.png")) {
        if(copy('../img/temp/'.$_POST['product_name'].'-texture-dark.png','../img/product1/'.$_POST['product_name'].'-texture-dark.png')){
            unlink('../img/temp/'.$_POST['product_name'].'-texture-dark.png');
            // echo $_FILES['texture-dark_file']['name']. " OK";
            $texture_dark = 1;
        } else {
            // echo $_FILES['texture-dark_file']['name']. " No Texture-dark File";
            
            $errormsg = 'No Texture Dark File';
            $error = true;
        }
    }
    echo $errormsg;
    // }
    // if(isset($_FILES['texture-white_file'])) {
    //     if(move_uploaded_file($_FILES['texture-white_file']['tmp_name'],"../img/product1/".$_POST['texture-white_name'].'.png')) {
    $texture_white = 0;
    if(file_exists("../img/temp/".$_POST['product_name']."-texture-white.png")) {
        if(copy('../img/temp/'.$_POST['product_name'].'-texture-white.png','../img/product1/'.$_POST['product_name'].'-texture-white.png')){
            unlink('../img/temp/'.$_POST['product_name'].'-texture-white.png');
            // echo $_FILES['texture-white_file']['name']. " OK";
            $texture_white = 1;
        } else {
            // echo $_FILES['texture-white_file']['name']. " No Texture-white File";
            
            $errormsg = 'No Texture White File';
            $error = true;
        }
    }
    echo $errormsg;
    // }
    // $myfile = "dimension_list.txt";
    // $message = "name:".$_POST['product_name']." width:".$_POST["width"]." height:".$_POST["height"]." x:".$_POST["x"]." y:".$_POST["y"]." blend_mode:".$_POST["blend_mode"]." opacity:".$_POST["opacity"];
    // $fh = fopen($myfile, 'a');
    // fwrite($fh, $message.PHP_EOL);
    // fclose($fh);

    $productname = trim($_POST['product_name']);
    $query = "SELECT mockup_name FROM products WHERE mockup_name='$productname'";
    $result = mysql_query($query);
    
    $count = mysql_num_rows($result);
    if($count!=0){
        $error = true;
        $errormsg = "Provided Product Name is already in use.";
    }
    
    if( !$error ) {
		$productname = $_POST['product_name'];
        $productcode = $_POST['product_code'];
        $productcost = $_POST['product_cost'] == '' ? 0 : $_POST['product_cost'];
        $productprice = $_POST['product_price']== '' ? 0 : $_POST['product_price'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        if($width == '')
            $width = 0;
        if($height == '')
            $height = 0;
        $x = $_POST['x'];
        $y = $_POST['y'];
        $provider = $_POST['provider'];
        $print_location = $_POST['print_location'];
        $print_mode = $_POST['print_mode'];
        $blend_mode = $_POST['blend_mode'];
        $opacity = $_POST['opacity'];
        $user = $_POST['userid'];
        $admin = $_POST['adminid'];
        $mockup_list = $_POST['mockup_list'];
        $top_left_x = $_POST['top_left_x'];
        $top_left_y = $_POST['top_left_y'];
        $top_right_x = $_POST['top_right_x'];
        $top_right_y = $_POST['top_right_y'];
        $bottom_left_x = $_POST['bottom_left_x'];
        $bottom_left_y = $_POST['bottom_left_y'];
        $bottom_right_x = $_POST['bottom_right_x'];
        $bottom_right_y = $_POST['bottom_right_y'];
        $dpi = $_POST['dpi'];
        $position_x = $_POST["position_x"];
        $position_y = $_POST["position_y"];
        $size_x = $_POST["size_x"];
        $size_y = $_POST["size_y"];
        $cheight = $_POST["cheight"];
        $query = "INSERT INTO products(mockup_name,mockup_code,width,height,x,y,user_id,blend_mode,opacity,admin,mockup_list,top_left_x,top_left_y,top_right_x,top_right_y,bottom_left_x,bottom_left_y,bottom_right_x,bottom_right_y,perspective, position_x, position_y, size_x, size_y, cheight, dpi,provider,print_location, print_mode, product_cost, product_price,texture_dark, texture_white) VALUES('$productname','$productcode','$width','$height','$x','$y','$user','$blend_mode','$opacity','$admin','$mockup_list',$top_left_x,$top_left_y,$top_right_x,$top_right_y,$bottom_left_x,$bottom_left_y,$bottom_right_x,$bottom_right_y,'1',$position_x,$position_y,$size_x,$size_y,$cheight,$dpi,'$provider','$print_location','$print_mode',$productcost,$productprice, $texture_dark, $texture_white)";
        // $query = "INSERT INTO products(mockup_name,width,height,x,y,user_id,blend_mode,opacity) VALUES('".$productname."','".$width."','".$height."','".$x."','".$y."','".'aaa'."','".$blend_mode."','".$opacity."')";
        echo $query;
        $res = mysql_query($query);
            
        if ($res) {
            $errTyp = "success";
            $errormsg = "Successfully registered, you may login now";
        } else {
            $errTyp = "danger";
            $errormsg = "Something went wrong, try again later...";	
        }	
    }
    if($error) {
        echo $errormsg;
        exit;
    }

?>
