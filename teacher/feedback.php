<?php
error_reporting(0);
include("../include/config.php");
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['tch_id']) || empty($_SESSION['tch_id']))
{
    header("location: tchlogin.php");
  }
$as_id=$_GET['as_id'];
$std_id=$_GET['std_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tch_id = $_SESSION['tch_id'];
    $msg="";
    $status = "TRUE";
    $tch_name=$_POST['tch_name'];
    $desc=$_POST['desc'];
    $as_id=$_POST['as_id'];
    $std_id=$_POST['std_id'];
   
    
    $sql="INSERT INTO `feedback`(`fb_content`, `std_id`,`tch_id`, `tch_name`,`as_id`) VALUES
     ('$desc','$std_id','$tch_id','$tch_name','$as_id')";
    $result= mysqli_query($conn,$sql);
    
    if($result){
       
        echo"<h1>Feedback sent Successfully</h1>";
    }
    else{
        echo"<h1>Feedback Failed. Try again!!</h1>";
    }

}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Feedback - Teacher</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="sb-nav-fixed">
        
            
             <section class="p-5 bg-white">
            <div class="content-wrapper">
          <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-8 col-12 pt-5">
                <div class="col-lg-12 col-md-8 col-12 pt-5">
                    
    <div class="card mt-sm-30 p-5 rounded shadow">             
        <!--- <div class="bg-dark text-light card rounded shadow"> 
              <div class="col-lg-8 col-md-12 col-sm-12 order-1 order-md-1 mt-5 mt-sm-5 pt-5 pt-sm-5"> -->

    <form class="form-feedback" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- <img class="rounded mx-auto d-block" src="side-img.gif" alt="Symbol" width="100" height="100"> -->
    <input type="hidden" name="as_id" value="<?php echo $as_id;?>"/>
    <input type="hidden" name="std_id" value="<?php echo $std_id;?>"/>
<div class="input-group mb-3">
    <div>
<h2 for="form-control" >Feedback on Assignment:</h2>
</div>
<div>
    <label for="tch_name">Feedback by:</label>
<input type="text" id="tch_name" name="tch_name" placeholder="Sender of the message" required autofocus>
</div>
<div>
 <label for="desc">Feedback Description:</label>
<textarea name="desc" required class="form-control" id="desc" placeholder="Enter feedback details" required autofocus></textarea>
</div>
<button class="btn btn-outline-success btn-block" name = "submit"id="submit" type="submit">Send feedback</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>