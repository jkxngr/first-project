<?php
include "config.php";

$c_id = $_GET['id'];
$sql  = "delete from category where category_id = {$c_id}";
if(mysqli_query($conn,$sql)){
    header("location:{$hostname}/admin/category.php");
}
else{
    echo "<p style='color:red;margin:10px 0;>Cant delete the user record ";
}


mysqli_close($conn);

?>