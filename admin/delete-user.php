<?php
include "config.php";

$userid = $_GET['id'];
$sql  = "delete from user where user_id = {$userid}";
if(mysqli_query($conn,$sql)){
    header("location:{$hostname}/admin/users.php");
}
else{
    echo "<p style='color:red;margin:10px 0;>Cant delete the user record ";
}


mysqli_close($conn);

?>