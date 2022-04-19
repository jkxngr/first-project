<?php
include "config.php";

if(isset($_FILES['photoss'])){
    $errors = array();
    $file_name = $_FILES['photoss']['name'];
    $file_size = $_FILES['photoss']['size'];
    $file_tmp = $_FILES['photoss']['tmp_name'];
    $file_type = $_FILES['photoss']['type'];
    $file_ext = strtolower(end(explode('.' ,$file_name)));
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false){
        $errors[] = "This extension file not allowed , Please choose a JPG or PNG file";

    }
    if($file_size > 15500000){
        $errors[] = "File size must be 5mb or lower.";
    }

    if(empty($errors)== true){
        move_uploaded_file($file_tmp,"gallery/".$file_name);
    }else{
        print_r($errors);
        die();
    }
}



session_start();
$date = date("d M, Y");
$sql = "insert into gallery(photo_date,photo,category) values('{$date}','{$file_name}','{$_POST['category']}');";


if(mysqli_multi_query($conn,$sql)){
    header("location: {$hostname}/admin/photos.php");
}else{
    echo "<div class='alert alert-danger'>Query failed.</div>";
}
?>