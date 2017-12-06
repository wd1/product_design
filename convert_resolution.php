<?php
// $resolution = $_POST['dpi'];
// echo $_FILES['design_file']['tmp_name']."aaa";
// if($resolution != "") {

//     if(copy($_FILES['design_file']['tmp_name'],"img/designs/".$_FILES['design_file']['name'].".png")) { 

//         //the input image inside $ii variable. In this case the input image is locate in 'image' folder
//         $ii = "img/designs/".$_FILES['design_file']['name'].".png";
        
//         //the ouput image inside $im variable. This is the image that will contain the transformations, and will be created automatic by the script and saved in 'image_final' folder.
//         $im = "img/designs/product-art-file.png";

//         //erase the output image. Very until when you do a refresh or when change some values in the code
//         if(file_exists($im))
//             unlink($im);

//         //that is what imagemagick will do. In this case they will transform the original image to a sepia image with a ton of 90%
//         $cmd = "-density ".$resolution."x".$resolution." ";

//         //The function 'exec' contain the correct path to 'Convert' command, contain the input image, the transformation we will do, and the output image
//         exec("convert -units PixelsPerInch $ii $cmd $im ");
//         unlink($ii);
//         echo $im;
//         // echo "dpi ok";
//     } else {
//         echo $_FILES['design_file']['name']. " Failure";
//     }
// } else {
//     if(move_uploaded_file($_FILES['design_file']['tmp_name'],"img/designs/product-art-file.png")) { 
//         //Code bellow will show the result 
//         echo "img/designs/product-art-file.png";
//         // echo "no dpi ok";
//     } else {
//         echo $_FILES['design_file']['name']. " Failure";
//     }
// }
if (!extension_loaded('imagick')){
    echo 'imagick not installed';
}
// echo ($_POST['src']);
$resolution = $_POST['dpi'];
$inFile = __DIR__ . DIRECTORY_SEPARATOR ."img/". $_POST['src'];
// echo $inFile;
$ext = pathinfo($inFile, PATHINFO_EXTENSION);
$rand = time();
$outFile =__DIR__ . DIRECTORY_SEPARATOR . "img/designs/product-art-file-".$rand.".".$ext;
if(file_exists("img/designs/product-art-file-".$rand.".".$ext)) {
    unlink("img/designs/product-art-file-".$rand.".".$ext);
}
$width = $_POST['art_width'];
$height = $_POST['art_height'];
$image1 = new Imagick($inFile);
$image1->cropImage($_POST['send_width'],$_POST['send_height'],$_POST['send_x'],$_POST['send_y']);
if(($resolution != "") && ($resolution !='0')) {
$image1->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
$image1->setResolution($resolution,$resolution);
$image1->resampleImage($resolution,$resolution, \Imagick::FILTER_LANCZOS,1);
}
    //         $im->readImage(__DIR__ . DIRECTORY_SEPARATOR ."img/designs/1.".$ext);
    //         $im->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
    //         $im->setResolution($resolution,$resolution);
            

    //         $im->resampleImage($resolution,$resolution, \Imagick::FILTER_LANCZOS,1);
    //         $im->writeImage(__DIR__ . DIRECTORY_SEPARATOR ."img/designs/".$_FILES['design_file']['name']);
    //         unlink("img/designs/1.".$ext);
    //         echo "img/designs/".$_FILES['design_file']['name'];
if(($width == 0) || ($height ==0) ) {
    $image1->resizeImage($_POST['send_width'],$_POST['send_height'], Imagick::FILTER_CATROM,1);
} else {
    $image1->resizeImage($width,$height, Imagick::FILTER_CATROM,1);
}
$image1->writeImage($outFile);
// echo $width.",".$height.",".$_POST['send_width'].",".$_POST['send_height'].",".$_POST['send_x'].",".$_POST['send_y'];
echo "img/designs/product-art-file-".$rand.".".$ext;
?>