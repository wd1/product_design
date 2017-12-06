<?php
function curl_get_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
if(isset($_POST['file_url'])) {
   $url = $_POST['file_url'];
   $name = basename($url);
   list($txt, $ext) = explode(".",$name);
   $name = $txt.time();
   $name = $name.".".$ext;
   if($ext == "jpg" or $ext =="png") {
    //    echo curl_get_contents($url);
       $upload = file_put_contents("img/designs/".$name, curl_get_contents($url));
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