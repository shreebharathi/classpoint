<?php
include("../include/config.php");
// Initialize the session
$assignment_id=$_GET['id'];
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['tch_id']) || empty($_SESSION['tch_id'])){

if(isset($_REQUEST['as_file'])){
    $sql="SELECT * from assignmnt where as_id='$assignment_id'";
    $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
    
    $file=urldecode($_REQUEST["as_file"]);
    $file_path=str_replace('download.php?newfile=','',$_SERVER['REQUEST_URI']);
        header('Content-Description: '.$data['as_desc']);
        header('Content-Title: '.$data['as_title']);
        header('Content-Status: '.$data['as_status']);
        header('Content-Path: '.$data['file_path']);
        header('Content-Time: '.$data['timestamp']);
        header('Content-File: '.$data['as_file']);
        flush();
        readfile($file_path);
        exit;

    }
}
}
?>
