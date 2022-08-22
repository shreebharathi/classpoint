<?php
include("../include/config.php");
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(isset($_SESSION['tch_id']) || !empty($_SESSION['tch_id']))
{
  header("location: tchlogin.php");
}

//Define variable
$username = $email = $password =$confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
$msg="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
   //Validate Name`
   if(empty(trim($_POST['tchname']))){
    $username_err = "Please enter name.";
} else{
    $username = trim($_POST['tchname']);
}

//Email Validation
if(strlen($_POST['tchemail']) == 0)
{
  $email_err="Enter Email Id";
}
else
{
  $email=$_POST["tchemail"];
}
// Validate password
if(empty(trim($_POST['tchpwd']))){
  $password_err = "Please enter a password.";
} elseif(strlen(trim($_POST['tchpwd'])) < 6){
  $password_err = "Password must have atleast 6 characters.";
} else{
  $password = trim($_POST['tchpwd']);
}

// Validate confirm password
if(empty(trim($_POST["confirm_tchpwd"]))){
  $confirm_password_err = 'Please confirm password.';
} else{
  $confirm_password = trim($_POST['confirm_tchpwd']);
  if($password != $confirm_password){
      $confirm_password_err = 'Password did not match.';
  }else {
    $password = md5($password);
  }
}
$branch=$_POST['branch'];

// Check input errors before inserting in database
if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
$sql="SELECT * from teacher where tch_emailid='$email'";
$result= mysqli_query($conn,$sql);
$data= mysqli_num_rows($result);
if(($data)==0){
// if(isset($_POST['tchsignup'])){
  
    // $username=$_POST['tchname'];
    // $email=$_POST['tchemail'];
    // $password=$_POST['tchpwd'];
     $sql="INSERT INTO `teacher`(`tch_name`, `tch_emailid`, `tch_pwd`, `branch_name`) VALUES ('$username','$email','$password','$branch')";
    $query= mysqli_query($conn,$sql);
    if($query){
      $msg="<div class='alert alert-success' role='alert'>
      You have Successfully Registered.....
    </div>";

  }else
  {
    $msg="<div class='alert alert-danger' role='alert'>
        Error....
      </div>";
  }
  }else{
    $msg="<div class='alert alert-danger' role='alert'>
        This email is already registered, Please try another email...
      </div>";

  }

}

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>s</title>
  </head>
  <body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100" >
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-3">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      
                      <div class="form-outline mb-4">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <input name="tchname" type="text" id="form3Example1cg" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1cg">Your Name</label>
                          <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                        </div>
        
                        <div class="form-outline mb-4 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                          <input name="tchemail" type="email" id="form3Example3cg" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example3cg">Your Email</label>
                          <span class="help-block alert-danger"><?php echo $email_err; ?></span>
                        </div>
        
                        <div class="form-outline mb-4  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                          <input name="tchpwd" type="password" id="form3Example4cg" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example4cg">Password</label>
                          <span class="help-block alert-danger"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-outline mb-4 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                          <input name="confirm_tchpwd" type="password" id="confirm_tchpwd" class="form-control form-control-lg" />
                          <label class="form-label" for="confirm_tchpwd">Confirm Password</label>
                          <span class="help-block alert-danger"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="input-group mb-4">
  <label class="input-group-text" for="branch">Branch:</label>
  <select class="form-select" id="branch" name="branch" class="branch">
  <option selected>Choose your branch... </option>
 <?php
 include('include/config.php');
 $sql='SELECT * FROM `branch`';
 $result=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result)){
 ?>
  
    <option value="<?php echo $row['branch_name'];?>"><?php echo $row['branch_name'];?></option>
    <?php
 }?> 
  </select>
 
</div>
                    
                        <button name="tchsignup" type="submit" class="btn btn-primary btn-block mb-4">
                            Sign up
                          </button>
                          <span><?php if(!empty($msg)) echo $msg;?></span>
            
        
                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="tchlogin.php"
                            class="fw-bold text-body"><u>Login here</u></a></p>
        
                      
                    </form>
        
                    </div>
                    
      
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>