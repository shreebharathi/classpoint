<?php
include("../include/config.php");
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['tch_id']) || empty($_SESSION['tch_id']))
{
    header("location: tchlogin.php");
  }

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tch_id = $_SESSION['tch_id'];
    $title = $desc = $branch ="";
    $title_err = $desc_err = $branch_err="";
    $msg="";
    $status = "TRUE";
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $branch=$_POST['branch'];
    $sem=$_POST['sem'];
    $due=$_POST['due'];
    $subject=$_POST['subject'];
   
    
    $sql="INSERT INTO `announcement`(`announce_title`, `announce_desc`, `branch_id`,`std_sem`,`due_date`,`status`,`tch_id`,`subject`)
     VALUE ('$title','$desc','$branch','$sem','$due','$status','$tch_id','$subject')";
    $result= mysqli_query($conn,$sql);
    echo $subject;
    
    if($result){
       
        echo"<h1>Announced Successfully</h1>";
    }
    else{
        echo"<h1>Announcement Failed. Try again!!</h1>";
    }

}
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Teachers</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        
        <div class="sb-nav-fixed">
   <!--- Navigation--->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../tdashboard/tindex.php">Teachers Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" >
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="tprofile.php">Profile Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="tlogout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="tindex.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Announcements
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="announcement.php">Announcements</a>
                                    <a class="nav-link" href="newannounce.php">Create Announcements</a>
                                    
                            </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Assignments
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        List
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="assignment.php">Total Assignments</a>
                                            <!-- <a class="nav-link" href="#">Pending</a>
                                            <a class="nav-link" href="feedback.php">Feedback</a> -->
                                        </nav>
                                    </div>
                                    
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Students
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment fa-fw"></i></div>
                                Discussion
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Teacher/Lecturer
                    </div>
                </nav>
            </div>
            <section class="col-lg-12 col-md-8 col-12 pt-5 bg-light">
<div class="col-md-10 pt-3 col-lg-6 col-xl-7 d-flex bg-white align-items-center order-1 order-lg-2">           
<div class="container-fluid">
<!-- <div class="col-2"></div> -->
<div class="col-12">
            
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h4>New Announcement </h4>
  <div class="form-group form-responsive col-mb-6">
    <label for="title">Title:</label>
    <input name="title" required type="text" class="form-control" id="title" placeholder="Title of announcement">
  </div>
  <div class="form-group col-mb-6">
  <label for="desc">Details:</label>
  <textarea name="desc" required class="form-control" rows="4" id="desc"></textarea>
</div>
<div class="form-group col-mb-6">
    <label for="due">Due:</label>
    <input name="due" required type="text" class="form-control" id="due" placeholder="YYYY-MM-DD">
  </div>
<div class="form-group col-mb-6">
<label for="branch" class="form-label">Branch:</label>
  <select class="form-select" id="branch" name="branch" class="branch">
  <option selected>Choose branch: </option>
 <?php
 $sql='SELECT * FROM `branch`';
 $result=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result)){
 ?>
  
    <option value="<?php echo $row['branch_id'];?>"><?php echo $row['branch_name'];?></option>
    <?php
 }?> 
  </select>

</div>

<div class="form-group col-md-6">
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


<div class="form-group col-md-6">
<label for="subject">Subject:</label>
    <input name="subject" required type="text" class="form-control" id="subject" placeholder="Enter the name of the subject">

</div>

  <button type="submit" class="btn btn-primary">Announce</button>
  
</form>
</div>
</div>
</div>
</div>
</div> 
</section>   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/sb-admin.min.js"></script>
    </body>
</html>
