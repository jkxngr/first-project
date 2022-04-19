<?php
include "config.php";
$post_id = $_GET['id'];

$sql1 = "select * from post where post_id = {$post_id};";
$result = mysqli_query($conn, $sql1) or die("Query failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/".$row['post_img']);

$sql = "delete from post where post_id = {$post_id};";
    if(mysqli_multi_query($conn,$sql)){
        header("location: {$hostname}/admin/post.php");
    }else{
        echo "query failed";
    }  



?>