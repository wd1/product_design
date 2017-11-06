<?php
if(isset($_FILES['design_file'])) {
    if(move_uploaded_file($_FILES['design_file']['tmp_name'],"img/designs/".$_FILES['design_file']['name'])) {
        echo $_FILES['design_file']['name']. " OK";
    } else {
        echo $_FILES['design_file']['name']. " Failure";
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
} else {
    echo "No files uploaded ...";
}
?>