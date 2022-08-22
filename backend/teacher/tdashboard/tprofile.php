<?php
include("../include/config.php");
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['tch_id']) || empty($_SESSION['tch_id']))
{
    header("location: tlogin.php");
}

    $user_id = $_SESSION['tch_id'];
    $name = $phone = $subject = $email = $msg= "";
    $name_err = $phone_err = $subject_err = $email_err = "";    
    
    $sql = "SELECT * FROM teacher WHERE tch_id = '$user_id'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $name=$row['tch_name'];
    $phone = $row['tch_phone'];
    $email = $row['tch_emailid'];
    $subject = $row['tsubject'];
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST['tch_name']))){
      $name_err ="<div class='alert alert-danger' role='alert'>
            Error : Name Should Not be Empty </div>";
    }else {
      $name = trim($_POST['tch_name']);
    }
  
    if(empty(trim($_POST['tch_emailid']))){
      $email_err ="<div class='alert alert-danger' role='alert'>
            Error : E-Mail Should Not be Empty </div>";
    }else {
      $email = trim($_POST['tch_emailid']);
    }

    if(empty(trim($_POST['subject']))){
        $subject_err ="<div class='alert alert-danger' role='alert'>
              Error : Subject field Should Not be Empty </div>";
      }else {
        $subject = trim($_POST['subject']);
      }
      
      if(!preg_match("/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/",$_POST["tch_phone"]))
      {
        $phone_err = "!Please enter a valid Mobile Number";
      }
      else {
        $phone=$_POST["tch_phone"];
      }
  
    if(empty($name_err) && empty($phone_err) && empty($email_err) && empty($subject_err)){
      $sql = "UPDATE `teacher` SET `tch_name`='$name',`tch_emailid`='$email',`tch_phone`='$phone',`tsubject`='$subject' WHERE tch_id='$user_id'";
      echo $sql;
      if(mysqli_query($conn,$sql))
      {
        $msg="<div class='alert alert-success' role='alert'>
            Successfully Profile Updated..
          </div>";
      }else {
        $msg="<div class='alert alert-danger' role='alert'>
            Error: Something Went Wrong..
          </div>";
      }
    }
  
  }
  
  ?>
  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
    background: rgb(9, 100, 150)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

/* .back:hover {
    color: #682773;
    cursor: pointer
} */

.labels {
    font-size: 11px
}

/* .add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8 */
/* } */
    </style>
</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?php echo $name; ?></span><span class="text-black-50"><?php echo $email; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels" for="tch_name">Name</label><input type="text" class="form-control" id="tch_name" name="tch_name" placeholder="Teacher name" value="<?php echo $name;?>">
                    <span><?php if(!empty($name_err)) echo $name_err;?></span></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-6"><label class="labels" for="subject">Subject</label><input type="text" class="form-control" id="subject" name="subject" placeholder="Teaching subject" value="<?php echo $subject;?>">
                <span><?php if(!empty($subject_err)) echo $subject_err;?></span></div>


                    <div class="col-md-12"><label class="labels" for="tch_emailid">Email ID</label><input type="email" class="form-control" id="tch_emailid" name="tch_emailid" placeholder="enter email id" value="<?php echo $email;?>">
                    <span><?php if(!empty($email_err)) echo $email_err;?></span></div>
                    <div class="col-md-12"><label class="labels" for="tch_phone">Phone no</label><input type="contact" class="form-control" id="tch_phone" name="tch_phone" placeholder="Contact no" value="<?php echo $phone;?>">
                    <span><?php if(!empty($phone_err)) echo $phone_err;?></span></div>
</div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" value="submit" type="button">Save Profile</button>
                <span><?php if(!empty($msg)) echo $msg;?></span></div>
</form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>