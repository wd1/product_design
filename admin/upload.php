<?php
include_once '../dbconnect.php';
$error = false;
$errormsg='';
if(isset($_FILES['product_file'])) {
    echo $_FILES['product_file']['tmp_name'];
    if(move_uploaded_file($_FILES['product_file']['tmp_name'],"../img/product1/".$_POST['product_name'].'.png')) {
        // echo $_FILES['product_file']['name']. " OK";
    } else {
        // echo $_FILES['product_file']['name']. " No Product File";
        $errormsg = 'No Product File';
        $error = true;
    }
    if(isset($_FILES['mask_file'])) {
        if(move_uploaded_file($_FILES['mask_file']['tmp_name'],"../img/product1/".$_POST['mask_name'].'.png')) {
            // echo $_FILES['mask_file']['name']. " OK";
        } else {
            // echo $_FILES['mask_file']['name']. " No Mask File";
            $errormsg = 'No Mask File';
            $error = true;
        }
    }
    if(isset($_FILES['shadow_file'])) {
        echo $_POST['shadow_name']. " OK";
        if(move_uploaded_file($_FILES['shadow_file']['tmp_name'],"../img/product1/".$_POST['shadow_name'].'.png')) {
            // echo $_FILES['shadow_file']['name']. " OK";
        } else {
            // echo $_FILES['shadow_file']['name']. " No Shadow File";
            $errormsg = 'No Shadow File';
            $error = true;
        }
    }
    if(isset($_FILES['texture-dark_file'])) {
        if(move_uploaded_file($_FILES['texture-dark_file']['tmp_name'],"../img/product1/".$_POST['texture-dark_name'].'.png')) {
            // echo $_FILES['texture-dark_file']['name']. " OK";
        } else {
            // echo $_FILES['texture-dark_file']['name']. " No Texture-dark File";
            $errormsg = 'No Texture Dark File';
            $error = true;
        }
    }
    if(isset($_FILES['texture-white_file'])) {
        if(move_uploaded_file($_FILES['texture-white_file']['tmp_name'],"../img/product1/".$_POST['texture-white_name'].'.png')) {
            // echo $_FILES['texture-white_file']['name']. " OK";
        } else {
            // echo $_FILES['texture-white_file']['name']. " No Texture-white File";
            $errormsg = 'No Texture White File';
            $error = true;
        }
    }
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
        $width = $_POST['width'];
        $height = $_POST['height'];
        $dpi = $_POST['dpi'];
        $provider = $_POST['provider'];
        $print_location = $_POST['print_location'];
        $print_mode = $_POST['print_mode'];
        if($width == '')
            $width = 0;
        if($height == '')
            $height = 0;
        $x = $_POST['x'];
        $y = $_POST['y'];
        $blend_mode = $_POST['blend_mode'];
        $opacity = $_POST['opacity'];
        $user = $_POST['userid'];
        $admin = $_POST['adminid'];
        $mockup_list = $_POST['mockup_list'];
        $query = "INSERT INTO products(mockup_name,mockup_code,width,height,dpi,x,y,user_id,blend_mode,opacity,admin,mockup_list,provider,print_location, print_mode) VALUES('$productname','$productcode','$width','$height','$dpi','$x','$y','$user','$blend_mode','$opacity','$admin','$mockup_list','$provider','$print_location','$print_mode')";
        // $query = "INSERT INTO products(mockup_name,width,height,x,y,user_id,blend_mode,opacity) VALUES('".$productname."','".$width."','".$height."','".$x."','".$y."','".'aaa'."','".$blend_mode."','".$opacity."')";
        // echo $query;
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
} else {
    echo "No files uploaded ...";
}
?>