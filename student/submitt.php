<?php
error_reporting(0);
include("../include/config.php");

// Initialize the session
session_start();
$announce_id=$_GET['id'];
$tch_id=$_GET['tch_id'];
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['std_id']) || empty($_SESSION['std_id']))
{
    header("location: submitt.php");
}

$std_id = $_SESSION['std_id'];
    

  
//   $target_dir = "newfile/";
// $target_file = $target_dir .($_FILES["filename"]["name"]);
// $uploadOk = 1;

  if(isset($_POST["submit"])){
    if ($uploadOk == 0) {
      echo " ";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
    
  //  $announce_id=$_GET['announce_id'];
   $target_dir = "newfile/";
 $target_file = $target_dir . basename($_FILES["filename"]["name"]);

  $uploadOk = 1;
  $an_id= $_POST['announce_id'];
  $tid=$_POST['tid'];
    $title= $_POST['title'];
    $desc= $_POST['desc'];
    $status="TRUE";
    $temp = explode(".", $_FILES["filename"]["name"]);
    $extension = end($temp);
    $upload_file= date('dmYHis').str_replace(" ", "", basename($_FILES["filename"]["name"]));
     move_uploaded_file($_FILES["filename"]["tmp_name"],"newfile/".$upload_file);

     $sql = "INSERT INTO `assignmnt`(`as_title`, `as_desc`,`as_file`, `as_status`, `std_id`,`announce_id`, `file_path`,`tch_id`) VALUES 
     ('$title','$desc','$target_file','$status','$std_id','$an_id','$target_dir','$tid')";
     $result=mysqli_query($conn,$sql);
    if ($result) {
        echo "File uploaded successfully";
    } else {
        echo "database connection refused";
    }
}



  
// $announce_id = $_GET['announce_id'];
// $target_dir = "newfile/";
//  $target_file = $target_dir . basename($_FILES["filename"]["name"]);
//   $uploadOk = 1;
//  $title = $_POST['title'];
//  $desc = $_POST['desc'];
//  $status ="TRUE";
//  move_uploaded_file($_FILES['newfile/']["tmp_name"], $target_file);


//    if (move_uploaded_file($_FILES['filename']['tmp_name'], __DIR__.'newfile/'. $_FILES["filename"]['name'])) {
//      echo "Uploaded";
//    } else {
//      echo "Sorry, there was an error uploading your file.";
//    }

//  $sql = "INSERT INTO `assignment`(`assign_title`, `assign_desc`, `assign_status`, `std_id`,`announce_id`, `file_path`) VALUES 
//  ('$title','$desc','$status','$std_id','$announce_id','$target_dir')";
//  $result=(mysqli_query($conn, $sql));
// 		if($result){
       
//              echo"<h1>File Uploaded Successfully</h1>";        }
//         else{
// echo"<h1>Upload Failed. Try again!!</h1>";
//         }
//  }
// }

  
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
        <title>Dashboard - Students</title>
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

    <form class="form-signin" method="post" enctype="multipart/form-data" action="submitt.php">
    <img class="rounded mx-auto d-block" src="side-img.gif" alt="Symbol" width="100" height="100">
    <input type="hidden" name="announce_id" value="<?php echo $announce_id;?>"/>
    <input type="hidden" name="tid" value="<?php echo $tch_id;?>"/>
<div class="input-group mb-3">
    <div>
<h4 for="form-control" >Assignment Upload</h4>
</div>
<div>
    <label for="title">Assignment Title</label>
<input type="text" id="title" name="title" placeholder="Enter the title" required autofocus>
</div>
<div>
 <label for="filename" class="sr-only ">Assignment File</label>
 <input type="file" id="filename" name="filename" class="form-control" accept=".doc,.docx,.pdf,.rtf" required autofocus>
</div>
<div>
 <label for="desc">Assignment Description</label>
<textarea name="desc" required class="form-control" id="desc" placeholder="Enter your assignment details" required autofocus></textarea>
</div>
<button class="btn btn-outline-success btn-block" name = "submit"id="submit" type="submit">Submit</button>
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