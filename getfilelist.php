<?php
    // $dir = 'img/product1';
    // $ffs = scandir($dir);
    // unset($ffs[array_search('.', $ffs, true)]);
    // unset($ffs[array_search('..', $ffs, true)]);

    // if(count($ffs)<1)
    //     return;
    // foreach($ffs as $ff) {
    //     echo '____'.$ff; 
    // }
    include_once 'dbconnect.php';
    // $myfile = fopen("admin/dimension_list.txt", "r") or die("Unable to open file!");
    // while(!feof($myfile)) {
    //     echo fgets($myfile)."<br>";
    // }
    // fclose($myfile);
    $user = $_POST['userid'];
    
    // echo $_POST['adminid'];
    if($_POST['adminid']=="") {
        $res=mysqli_query($conn,"SELECT * FROM products WHERE admin='admin'");
        echo 1;
        while ($row = mysqli_fetch_array($res)) {
            echo('name:'.$row['mockup_name'].' width:'.$row['width'].' height:'.$row['height'].' x:'.$row['x'].' y:'.$row['y'].' blend_mode:'.$row['blend_mode'].' opacity:'.$row['opacity'].' admin:'.$row['admin'].' mockup_list:'.$row['mockup_list'].' top_left_x:'.$row['top_left_x'].' top_left_y:'.$row['top_left_y'].' top_right_x:'.$row['top_right_x'].' top_right_y:'.$row['top_right_y'].' bottom_left_x:'.$row['bottom_left_x'].' bottom_left_y:'.$row['bottom_left_y'].' bottom_right_x:'.$row['bottom_right_x'].' bottom_right_y:'.$row['bottom_right_y'].' perspective:'.$row['perspective'].' position_x:'.$row['position_x'].' position_y:'.$row['position_y'].' size_x:'.$row['size_x'].' size_y:'.$row['size_y'].' cheight:'.$row['cheight'].' dpi:'.$row['dpi'].' texture_dark:'.$row['texture_dark'].' texture_white:'.$row['texture_white'].'<br>');
        }
        echo ("ADMINSEPERATE");
        $res=mysqli_query($conn,"SELECT * FROM products WHERE user_id='$user'");
        while ($row = mysqli_fetch_array($res)) {
            echo('name:'.$row['mockup_name'].' width:'.$row['width'].' height:'.$row['height'].' x:'.$row['x'].' y:'.$row['y'].' blend_mode:'.$row['blend_mode'].' opacity:'.$row['opacity'].' admin:'.$row['admin'].' mockup_list:'.$row['mockup_list'].' top_left_x:'.$row['top_left_x'].' top_left_y:'.$row['top_left_y'].' top_right_x:'.$row['top_right_x'].' top_right_y:'.$row['top_right_y'].' bottom_left_x:'.$row['bottom_left_x'].' bottom_left_y:'.$row['bottom_left_y'].' bottom_right_x:'.$row['bottom_right_x'].' bottom_right_y:'.$row['bottom_right_y'].' perspective:'.$row['perspective'].' position_x:'.$row['position_x'].' position_y:'.$row['position_y'].' size_x:'.$row['size_x'].' size_y:'.$row['size_y'].' cheight:'.$row['cheight'].' dpi:'.$row['dpi'].' texture_dark:'.$row['texture_dark'].' texture_white:'.$row['texture_white'].'<br>');
        }
    }
    else
    {
        $res=mysqli_query($conn,"SELECT * FROM products WHERE admin='admin'");
        while ($row = mysqli_fetch_array($res)) {
            echo('name:'.$row['mockup_name'].' width:'.$row['width'].' height:'.$row['height'].' x:'.$row['x'].' y:'.$row['y'].' blend_mode:'.$row['blend_mode'].' opacity:'.$row['opacity'].' admin:'.$row['admin'].' mockup_list:'.$row['mockup_list'].' top_left_x:'.$row['top_left_x'].' top_left_y:'.$row['top_left_y'].' top_right_x:'.$row['top_right_x'].' top_right_y:'.$row['top_right_y'].' bottom_left_x:'.$row['bottom_left_x'].' bottom_left_y:'.$row['bottom_left_y'].' bottom_right_x:'.$row['bottom_right_x'].' bottom_right_y:'.$row['bottom_right_y'].' perspective:'.$row['perspective'].' position_x:'.$row['position_x'].' position_y:'.$row['position_y'].' size_x:'.$row['size_x'].' size_y:'.$row['size_y'].' cheight:'.$row['cheight'].' dpi:'.$row['dpi'].' texture_dark:'.$row['texture_dark'].' texture_white:'.$row['texture_white'].'<br>');
        }
        // echo("ADMINSEPERATE");
        // $res=mysql_query("SELECT * FROM products WHERE admin<>'admin'");
        // while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
        //     echo('name:'.$row['mockup_name'].' width:'.$row['width'].' height:'.$row['height'].' x:'.$row['x'].' y:'.$row['y'].' blend_mode:'.$row['blend_mode'].' opacity:'.$row['opacity'].' admin:'.$row['admin'].' mockup_list:'.$row['mockup_list'].' top_left_x:'.$row['top_left_x'].' top_left_y:'.$row['top_left_y'].' top_right_x:'.$row['top_right_x'].' top_right_y:'.$row['top_right_y'].' bottom_left_x:'.$row['bottom_left_x'].' bottom_left_y:'.$row['bottom_left_y'].' bottom_right_x:'.$row['bottom_right_x'].' bottom_right_y:'.$row['bottom_right_y'].' perspective:'.$row['perspective'].' position_x:'.$row['position_x'].' position_y:'.$row['position_y'].' size_x:'.$row['size_x'].' size_y:'.$row['size_y'].' cheight:'.$row['cheight'].' dpi:'.$row['dpi'].'<br>');
        // }
    }
    
?>