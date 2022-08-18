<?php
include("../include/config.php");
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['tch_id']) || empty($_SESSION['tch_id']))
{
    header("location: announcement.php");
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
                        <li><a class="dropdown-item" href="#!">Profile Settings</a></li>
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


<div class="container-fluid mt-5">
            <div class="row">
              <!-- <div class="col-2"></div> -->
              <div class="col-lg-12 col-md-8 col-12 pt-5">


              <div class="table-responsive table-bordered border-dark">
                <table class="table border-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table table-dark">
                          <tr style="text-align:center;">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Branch</th>
                            <th>Semester</th>
                            <th>Subject</th>
                            <th>Due</th>
                            <th>Timestamp</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
        <?php
        include("../include/config.php");
        $tch_id = isset($_SESSION['tch_id']);

if(!empty($_POST['tch_id'])){
  $tch_id = $_POST['tch_id'];
}else if(!empty($_GET['tch_id'])){
  $tch_id = $_GET['tch_id'];
}
        $tch_id = $_SESSION['tch_id'];
        
        $sql="SELECT * from announcement, teacher, branch WHERE announcement.tch_id = teacher.tch_id AND announcement.branch_id = branch.branch_id AND announcement.tch_id = $tch_id";
        $result=mysqli_query($conn,$sql);
        
        while($row=mysqli_fetch_array($result))

        {?>
       <tr style="text-align:center;">
            <td><?php echo $row['announce_id'];?></td>
            <td><?php echo $row['announce_title'];?></td>
            <td><?php echo $row['announce_desc'];?></td>
            <td><?php echo $row['branch_name'];?></td>
            <td><?php echo $row['std_sem'];?></td>
            <td><?php echo $row['subject'];?></td>
            <td><?php echo $row['due_date'];?></td>
            <td><?php echo $row['timestamp'];?></td>
            <td><button type="button" value="delete"><a href="delete.php?id=<?php echo $row['announce_id'];?>" class="btn btn-primary">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a></button></td>
                             
          </tr>
        <?php
        }
        ?>
     
       
    </tbody>
  </table>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        || $('teacher').DataTable();

    });
    </script>
     </div>
        </div>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
