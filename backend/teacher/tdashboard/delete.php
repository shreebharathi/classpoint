<?php
include("../include/config.php");
$id=$_GET['announce_id'];
$sql="DELETE FROM `announcement` WHERE announce_id='$id'";
$result=mysqli_query($conn,$sql);
if($result){
    //echo "<script> alert("delete success')</script>";
     header('location:announcement.php');
}
else{
 echo "Delete unsuccessful!";
}
?>