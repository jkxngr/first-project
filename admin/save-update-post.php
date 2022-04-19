<?php
    include "config.php";
    if(empty($_FILES['new-image']['name'])){
         $file_name = $_POST['old_image'];
        echo "Hello";
    }else{
        echo "Hello2";

        $errors = array();
        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $file_ext = strtolower(end(explode('.' ,$file_name)));
        // echo $file_ext;
        $extensions = array("jpeg","jpg","png");
    
        if(in_array($file_ext,$extensions) === false){
            $errors[] = "This extension file not allowed , Please choose a JPG or PNG file";
    
        }
        // if($file_size > 2097152){
            // $errors[] = "File size must be 2mb or lower.";
        // }
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
    $sql = "update post set title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',post_img='{$file_name}'  where post_id={$_POST["post_id"]}" ; 

    $result = mysqli_query($conn,$sql);

    if($result){
        header("location: {$hostname}/admin/post.php");
    }else{
        echo "query failed";
    }
?>