<?php
if(isset($_FILES['design_file'])) {
    if(move_uploaded_file($_FILES['design_file']['tmp_name'],"img/designs/".$_FILES['design_file']['name'])) {
        echo $_FILES['design_file']['name']. " OK";
    } else {
        echo $_FILES['design_file']['name']. " Failure";
    }
    exit;
} else {
    echo "No files uploaded ...";
}
?>