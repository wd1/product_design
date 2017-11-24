<?php
if(isset($_FILES['design_file'])) {
    // $resource = ($_FILES['design_file']['tmp_name']);
    
    // exec("convert $cmd density.jpg");
    
    

    // $im->setResolution(300,300);
    // $im->readimage('document.pdf[0]'); 
    // $im->setImageFormat('jpeg');    
    // $im->writeImage('thumb.jpg'); 
    // $im->clear(); 
    // $im->destroy();
    $resolution = $_POST['dpi'];
    // echo $resolution;
    if (!extension_loaded('imagick')){
        echo 'imagick not installed';
    }
    if(file_exists("img/designs/".$_FILES['design_file']['name'])) {
        unlink("img/designs/".$_FILES['design_file']['name']);
    }
    $ext = pathinfo($_FILES['design_file']['name'], PATHINFO_EXTENSION);
    // if(($resolution != "") && ($resolution !='0')) {
    //     if(move_uploaded_file($_FILES['design_file']['tmp_name'],"img/designs/1.".$ext)) {
    //         $im = new Imagick();
    //         $im->readImage(__DIR__ . DIRECTORY_SEPARATOR ."img/designs/1.".$ext);
    //         $im->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
    //         $im->setResolution($resolution,$resolution);
            

    //         $im->resampleImage($resolution,$resolution, \Imagick::FILTER_LANCZOS,1);
    //         $im->writeImage(__DIR__ . DIRECTORY_SEPARATOR ."img/designs/".$_FILES['design_file']['name']);
    //         unlink("img/designs/1.".$ext);
    //         echo "img/designs/".$_FILES['design_file']['name'];
    //     }
        // $ext = pathinfo($_FILES['design_file']['name'],PATHINFO_EXTENSION);
        // if(move_uploaded_file($_FILES['design_file']['tmp_name'],"img/designs/__temp.".$ext)) { 

        //     //the input image inside $ii variable. In this case the input image is locate in 'image' folder
        //     $ii = "img/designs/__temp.".$ext;
            
        //     //the ouput image inside $im variable. This is the image that will contain the transformations, and will be created automatic by the script and saved in 'image_final' folder.
        //     $im = "img/designs/".$_FILES['design_file']['name'];

        //     //erase the output image. Very until when you do a refresh or when change some values in the code
        //     // unlink($im);

        //     //that is what imagemagick will do. In this case they will transform the original image to a sepia image with a ton of 90%
        //     $cmd = "-density ".$resolution."x".$resolution." ";

        //     //The function 'exec' contain the correct path to 'Convert' command, contain the input image, the transformation we will do, and the output image
        //     // exec("convert $ii $cmd $im ");
        //     echo system("convert -version");
        //     unlink($ii);
        //     //Code bellow will show the result 
        //     // echo $im;
        //     // echo "dpi ok";
        // } else {
        //     // echo $_FILES['design_file']['name']. " Failure";
        // }
    // } else
     {
        if(move_uploaded_file($_FILES['design_file']['tmp_name'],"img/designs/".$_FILES['design_file']['name'])) { 
            //Code bellow will show the result 
            echo "img/designs/".$_FILES['design_file']['name'];
            // echo "no dpi ok";
        } else {
            echo $_FILES['design_file']['name']. " Failure";
        }
    }
    exit;
} else if(isset($_POST['downloads1'])){
    require_once 'dbconnect.php';
    $downloads1 = $_POST['downloads1'];
    $downloads2 = $_POST['downloads2'];
    $userid = $_POST['userid'];
    echo ("UPDATE users SET downloads_1=$downloads1, downloads_2=$downloads2 WHERE userId=$userid");
    if (mysql_query("UPDATE users SET downloads_1=$downloads1, downloads_2=$downloads2 WHERE userId=$userid")) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: ";
    }
} else if(isset($_POST['showflag'])) {
    require_once 'dbconnect.php';
    $showflag = $_POST['showflag'];
    $userid = $_POST['userid'];
    if (mysql_query("UPDATE users SET showflag=$showflag WHERE userId=$userid")) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: ";
    }
} else {
    echo "No files uploaded ...";
}
?>