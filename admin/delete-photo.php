<?php
include "config.php";
$photo_id = $_GET['id'];

$sql1 = "select * from gallery where photo_id = {$photo_id};";
$result = mysqli_query($conn, $sql1) or die("Query failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("gallery/".$row['photo']);

$sql = "delete from gallery where photo_id = {$photo_id};";
    if(mysqli_multi_query($conn,$sql)){
        header("location: {$hostname}/admin/photos.php");
    }else{
        echo "query failed";
    }  



?>