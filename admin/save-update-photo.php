
<?php
include "config.php";
if(empty($_FILES['new-photo']['name'])){
    $file_name = $_POST['old_photo'];

}else{
    $errors = array();
    $file_name = $_FILES['new-photo']['name'];
    $file_size = $_FILES['new-photo']['size'];
    $file_tmp = $_FILES['new-photo']['tmp_name'];
    $file_type = $_FILES['new-photo']['type'];
    $file_ext = strtolower(end(explode('.' ,$file_name)));
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false){
        $errors[] = "This extension file not allowed , Please choose a JPG or PNG file";

    }
    if($file_size >  15500000){
        $errors[] = "File size must be 15mb or lower.";
    }

    if(empty($errors)== true){
        move_uploaded_file($file_tmp,"gallery/".$file_name);
    }else{
        print_r($errors);
        die();
    }
}



$sql = "update gallery set photo='{$file_name}' where photo_id={$_POST["photo_id"]}" ; 
echo $sql;

    $result = mysqli_query($conn,$sql);

    if($result){
        header("location:{$hostname}/admin/photos.php");
    }else{
        echo "query failed";
    }
?>