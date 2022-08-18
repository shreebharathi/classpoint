<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['id']) || empty($_SESSION['id']))
{
  header("location: login.php");
}

require '../include/config.php';
//Define variable
$name = $desc="";
$name_err = $desc_err = "";
$msg="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  //Validate Name`
  if(empty(trim($_POST['name']))){
      $name_err = "Please enter Subject Name.";
  } else{
      $name = trim($_POST['name']);
  }

      // Check input errors before inserting in database
          if(empty($name_err)){

          $sql = "SELECT * FROM `subject` WHERE `sub_name`='$name'";
          $result = mysqli_query($conn,$sql);
          $data = mysqli_num_rows($result);
          if(($data)==0){
          $sql = "INSERT INTO `subject`(`sub_name`) VALUES ('$name')";
          $query = mysqli_query($conn,$sql); // Insert query
          if($query){

            $msg = "<div class='alert alert-success' role='alert'>
                New Subject Added.....
              </div>";

          }else
          {
            $msg="<div class='alert alert-danger' role='alert'>
                Error....
              </div>";
          }
          }else{
            $msg="<div class='alert alert-danger' role='alert'>
                This Subject Already Added...
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <title>Admin</title>
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation Menu Include Start-->
    <?php
    include('../include/navigation.php');
    ?>
      <!-- Navigation Menu Include End-->


        <div class="content-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-8">

              <script>
  $("#submit").click(function() {
                var name= $("#inputName").val();

                $.ajax({
                    type: "POST",
                    url: "subject.php",
                    data: "subject=" + name,
                    success: function(data) {
                       alert("sucess");
                    }
                });


            });

</script>


                                <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                  <img class="rounded mx-auto d-block" src="img/symbol.png" alt="Symbol" width="100" height="100">

                                  <label for="inputEmail" class="sr-only">Subject Name</label>
                                  <input type="text" id="inputName" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Subject Name" required autofocus>
                                  <span class="help-block"><?php echo $name_err; ?></span>

    

                                <button class="btn btn-outline-success btn-block" name = "register"id="register" type="submit">Submit</button>


                                <span><?php if(!empty($msg)) echo $msg;?></span>
                                </form>









              </div>
                </div>
            </div>
          </div>
          <!-- /.container-fluid-->

          <!-- /.content-wrapper-->
          <footer class="sticky-footer">
            <div class="container">
              <div class="text-center">
                <small>Copyright © 2019 </small>
              </div>
            </div>
          </footer>
          <!-- Scroll to Top Button-->
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
          </a>
          <!-- Logout Modal-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
              </div>
            </div>
          </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </body>
</html>