<?php
include("backend/include/config.php");
// Initialize the session
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <title>Class Point</title>
  </head>
  <body>
    
    <nav class="sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#"><h3>Class Point</h3></a>
          <ul class="navbar-nav mx-auto py-3">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sevices.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
          <li class="nav-item dropdown">
            <button class="btn btn-light mx-md-4">Login<a class="nav-dark dropdown-toggle" id="navbarDropdown" onclick="button-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="backend\teacher\tdashboard\tchlogin.php">Teacher Login</a>
              <a class="dropdown-item" href="backend\student\dashboard\login.php">Student Login</a>
              <div class="dropdown-divider"></div>
              
            </div>
          </li>
        </button>
        </div>
      </nav>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/x_edited.jpg" class="d-block w-100 " alt="...">
            <div class="carousel-caption text-dark d-none d-md-block ">
              <header class="masthead">
                <main class="mx-md-4">
                  <hr class="divider" />
                  <h3 class="text-dark-75 mb-5">Online Assignment Allocation And Submission Platform</h3>
                  <h2 class=" text-dark mb-5">Easy Submission Point</h2> 
                    <p class="text-dark mb-3"> Best Platform for Recieving, Submitting, Collecting and Reviewing Assignments.</p> 
                     <p>Click below to Start your journey with Class Point</p>
                     <li class="nav-item dropdown">
                      <button class="btn btn-dark">Login here<a class="nav-dark dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="backend/teacher/tdashboard/tchlogin.php">Teacher Login</a>
                        <a class="dropdown-item" href="backend/student/dashboard/login.php">Student Login</a>
                        <div class="dropdown-divider"></div>
                      
                      </div>
                    </li>
                  </button>
          
                </main>
               
            </div>
          </div>

        </div>
      </div>
                  
                </header>
                <div px-10>

                </div>


                <div class="bg-dark text-light px-4 py-5 text-center" id="about">
                  
                    
                      
                      <div class="container-fluid">
                  <div class="py-5">
                    <h1 class="display-5 fw-bold text-white">About our website!</h1>
                    <div class="col-lg-6 mx-auto">
                      <p class="fs-5 mb-4">This website developed to serve
                        lecturers or teachers in collecting and evaluating assignments and for the students to submit the assignments on time from anywhere and any time. This platform creates an easy and comfortable sharing platform for students and
                        lecturers.</p>
                      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button" class="btn-light" href="#services">Our Services</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              
              <hr class="divider" />
      <section class="services" id="services">
      <div class="container px-4 py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Services</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
          <div class="col d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
            </div>
            <div>
              
              <h2>Online Submission</h2>
              <p>This web-application facilitates
                the students to submit their assignments from anywhere with internet access on
                time.</p>
              <a href="#" class="btn btn-primary">
                Primary button
              </a>
            </div>
          </div>
          <div class="col d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <!-- <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"></use></svg> -->
            </div>
            <div>
              <h2>Featured title</h2>
              <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
              <a href="#" class="btn btn-primary">
                Primary button
              </a>
            </div>
          </div>
          <div class="col d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <!-- <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"></use></svg> -->
            </div>
            <div>
              <h2>Featured title</h2>
              <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
              <a href="#" class="btn btn-primary">
                Primary button
              </a>
            </div>
          </div>
        </div>
      </div>
      </section>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
  <div class="container my-4">
        <!--Card-->
    <div class="card content-wrapper">

      <!--Card content-->
      <div class="card-body" id="contact" name="contact">
        <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $email = $branch ="";
  $name_err = $email_err = $branch_err="";
  $msg="";
  $std_tch=$_POST['tch_std'];
  $message=$_POST['message'];

  if(empty(trim($_POST['name']))){
    $name_err ="<div class='alert alert-danger' role='alert'>
          Error : Enter your name </div>";
  }else {
    $name = trim($_POST['name']);
  }

  if(empty(trim($_POST['email']))){
    
    $email_err ="<div class='alert alert-danger' role='alert'>
          Error : Enter email address </div>";
  }else {
    $email = trim($_POST['email']);
  }

  if((empty($_POST['branch']))){
    $branch_err ="<div class='alert alert-danger' role='alert'>
          Error : Enter your branch </div>";
  }else {
    $branch = trim($_POST['branch']);
  }

    if(empty($name_err) && empty($email_err) && empty($branch_err)){

      $sql = "INSERT INTO contact (name,branch,email,std_tch,msg) VALUES('$name','$branch','$email','$std_tch','$message')";
      $query = mysqli_query($conn,$sql); // Insert query
      if($query){
      $msg="<div class='alert alert-success' role='alert'>
          Message sent Successfully..
        </div>";

      }else
      {
        $msg="<div class='alert alert-danger' role='alert'>
            Error: Message Failed..
          </div>";
      }
    }

  }
  ?>



          <!--Section heading-->
          <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
          <!--Section description-->
          <p class="text-center w-responsive mx-auto mb-5">Do you have any queries regarding our website?
            Please contact us.
          </p>
          <div class="row">
            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
              <form id="contact-form" name="contact-form" action="index.php" method="POST">

                <!--Grid row-->
                <div class="row">

                  <!--Grid column-->
                  <div class="col-md-6">
                    <div class="md-form mb-0">
                      <input type="text" id="name" name="name" class="form-control">
                      <label for="name" class="">Your name</label>
                      <span><?php if(!empty($name_err)) echo $name_err;?></span>
                    </div>
                  </div>
                  <!--Grid column-->
                  <div class="col-md-6">
                    <div class="md-form mb-0">
                      <select class="selectpicker btn-light" id="tch_std" name="tch_std">
                    <optgroup label="Who are you?">
                      <option>Student</option>
                      <option>Teacher</option>
                    </optgroup>
                 </select>
                 </div>
                </div>
            
                  <!--Grid column-->
                  <div class="col-md-6">
                    <div class="md-form mb-0">
                      <input type="text" id="email" name="email" class="form-control">
                      <label for="email" class="">Your email</label>
                      <span><?php if(!empty($email_err)) echo $email_err;?></span>
                    </div>
                  </div>
                  <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                  <div class="col-md-12">
                    <div class="md-form mb-0">
                      <input type="text" id="branch" name="branch" class="form-control">
                      <label for="branch" class="">Branch</label>
                      <span><?php if(!empty($branch_err)) echo $branch_err;?></span>
                    </div>
                  </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                  <!--Grid column-->
                  <div class="col-md-12">

                    <div class="md-form">
                      <textarea type="text" id="message" name="message" rows="2"
                        class="form-control md-textarea"></textarea>
                      <label for="message">Your message</label>
                    </div>

                  </div>
                </div>
                <!--Grid row-->

              <div class="text-center text-light text-md-left">
                <button type="submit" id="submit" class="btn btn-dark">Send</button>
                <span><?php echo $msg;?></span>
              </div>
              </form>
              <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
              <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                  <p>Shree Bharathi College, Nanthoor, Mangalore -575004</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                  <p>+ 91 9900299002 </p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                  <p>admin@gmail.com</p>
                </li>
              </ul>
            </div>
            <!--Grid column-->

          </div>

      </div>

    </div>
    <!--/.Card-->

  </div>
</div>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>