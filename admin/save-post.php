<?php
include "config.php";

if(isset($_FILES['fileToUpload'])){
    $errors = array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.' ,$file_name)));
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false){
        $errors[] = "This extension file not allowed , Please choose a JPG or PNG file";

    }
    if($file_size > 15000000){
        $errors[] = "File size must be 2mb or lower.";
    }

    if(empty($errors)== true){
        move_uploaded_file($file_tmp,"img/".$file_name);
    }else{
        print_r($errors);
        die();
    }
}


session_start();
$title = mysqli_real_escape_string($conn, $_POST['post_title']);
$description = mysqli_real_escape_string($conn, $_POST['postdesc']);
$date = date("d M, Y");
$sql = "insert into post(title , description,post_date,post_img)
        values('{$title}','{$description}','{$date}','{$file_name}');";


if(mysqli_multi_query($conn,$sql)){
    header("location: {$hostname}/admin/post.php");
}else{
    echo "<div class='alert alert-danger'>Query failed.</div>";
}
?>