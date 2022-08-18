<?php
include("../include/config.php");
if(isset($_POST['signup'])){
    $username=$_POST['stdname'];
    $rollno=$_POST['rollno'];
    $branch=$_POST['branch'];
    $sem=$_POST['sem'];
    $email=$_POST['stdemail'];
    $password=$_POST['stdpwd'];
    $sql="INSERT INTO student(`std_name`, `std_no`, `branch`, `std_sem`, `std_email`, `std_pwd`) VALUES ('$username','$rollno','$branch','$sem','$email','$password')";
    $result= mysqli_query($conn,$sql);

    if($result){
        header('location:sindex.php');
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
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                          <input name="stdname" type="text" id="stdname" class="form-control form-control-lg" />
                          <label class="form-label" for="stdname">Your Name</label>
                        </div>
        
                        <div class="form-outline mb-4">
                          <input name="stdemail" type="email" id="stdemail" class="form-control form-control-lg" />
                          <label class="form-label" for="stdemail">Your Email</label>
                        </div>
        
                        <div class="form-outline mb-4">
                          <input name="stdpwd" type="password" id="stdpwd" class="form-control form-control-lg" />
                          <label class="form-label" for="stdpwd">Password</label>
                        </div>

                        <div class="form-outline mb-4">
                          <input name="rollno" type="int" id="rollno" class="form-control form-control-lg" />
                          <label class="form-label" for="rollno">Register no</label>
                        </div>

                        <div class="form-outline mb-4">
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

                        <div class="form-outline mb-4">
                        <label for="sem" class="form-label">Semester:</label>
                        <select class="form-select" id="sem" name="sem">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                      
                        </select>
                        </div>
        
                        <button name="signup" type="submit" class="btn btn-primary btn-block mb-4" href="sindex.php">
                            Sign up
                          </button>
            
        
                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                            class="fw-bold text-body"><u>Login here</u></a></p>
        
                      
                    </form>
        
                    </div>
                    
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
            
      
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