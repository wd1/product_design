<?php
if(isset($_POST['file_url'])) {
   $url = $_POST['file_url'];
   $name = basename($url);
   list($txt, $ext) = explode(".",$name);
   $name = $txt.time();
   $name = $name.".".$ext;
   if($ext == "jpg" or $ext =="png") {
       $upload = file_put_contents("img/designs/".$name, file_get_contents($url));
       if($upload) {
           echo "img/designs/".$name;
       } else {
           echo "failure";
       }
   }
} else {
    echo "No files uploaded ...";
}
?>