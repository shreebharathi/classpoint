<?php
include("../include/config.php");
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(isset($_SESSION['user_id']) || !empty($_SESSION['user_id']))
{
  header("location: index.php");
}
//Define variable
$username = $email = $password =$confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
$msg="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
   //Validate Name`
   if(empty(trim($_POST['tchname']))){
    $name_err = "Please enter name.";
} else{
    $name = trim($_POST['tchname']);
}

//Email Validation
if(strlen($_POST['email']) == 0)
{
  $email_err="Enter Email Id";
}
else
{
  $email=$_POST["email"];
}

if(isset($_POST['tchsignup'])){
  
    $username=$_POST['tchname'];
    $email=$_POST['tchemail'];
    $password=$_POST['tchpwd'];
    $branch=$_POST['branch'];
  

    $sql="INSERT INTO `teacher`(`tch_name`, `tch_emailid`, `tch_pwd`, `branch_name`) VALUES ('$username','$email','$password','$branch')";
    $result= mysqli_query($conn,$sql);
   

    if($result){
       // header('location:tdashboard/tchsignup.php');
        echo"<h1>Signup successful</h1>";
    }
    else{
        echo"<h1>Signup Failed. Try again!!</h1>";
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
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      
                      <div class="form-outline mb-4">
                        <form method="post" action="" enctype="multipart/form-data">
                          <input name="tchname" type="text" id="form3Example1cg" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1cg">Your Name</label>
                        </div>
        
                        <div class="form-outline mb-4">
                          <input name="tchemail" type="email" id="form3Example3cg" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example3cg">Your Email</label>
                        </div>
        
                        <div class="form-outline mb-4">
                          <input name="tchpwd" type="password" id="form3Example4cg" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example4cg">Password</label>
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
            
        
                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="tdashboard/tchlogin.php"
                            class="fw-bold text-body"><u>Login here</u></a></p>
        
                      
                    </form>
        
                    </div>
                    
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">
      
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