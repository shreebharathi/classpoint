<?php
include("include/config.php");
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['id']) || empty($_SESSION['id']))
{
    header("location: login.php");
}


    $user_id = $_SESSION['id'];
    
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Admin Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
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
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Departments
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="branch.php">Add Branch</a>
                                    
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="branchlist.php">Branch</a>
                                    
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="teacher.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Teachers
                            </a>
                            <a class="nav-link" href="student.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Students
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <!-- contact dib -->
            <div class="container-fluid mt-5">
            <div class="row">
              <!-- <div class="col-2"></div> -->
              <div class="col-lg-12 col-md-8 col-12 pt-5">


              <div class="col-12">
              <div class="table-responsive table-bordered">
              <table  class="table border-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table table-dark">
                          <tr style="text-align:center;">
                        <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Branch</th>
                            <th>Position</th>
                            <th>Message</th>
                            <th>Timestamp</th>
                          </tr>
                        </thead>
        <?php
        
        
        
        $sql="SELECT * FROM `contact`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result))

        {?>
        
        <tr style="text-align:center;">
            <td><?php echo $row['con_id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['branch'];?></td>
            <td><?php echo $row['std_tch'];?></td>
            <td> <button class="btn btn-primary" value="<?php echo $row['con_id'];?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Message
       </button></td>
            <td><?php echo $row['timestamp'];?></td>
          </tr>
     
          <?php
          
        }
        ?>
    </tbody>
  </table>
</div>

<div class="modal fade" id="exampleModal"  tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="container">
  <h2>Message</h2>
  <!-- Trigger the modal with a button -->
  <?php
  $sql="SELECT * FROM `contact`";
        $result=mysqli_query($conn,$sql);
        if($result){
            ?>
  <div class="modal-body mb-5">
  <textarea class="content bg-white" value="<?php echo $row['msg'];?>" id="fb_content" name="fb_content" rows="4" cols="50" readonly>
</textarea>
<button type="dismiss" class="btn btn-success" data-dismiss="modal">Close</button>		    
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
      <?php
        } ?>
      </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        || $('student').DataTable();

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