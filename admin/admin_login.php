<?php
  include('../includes/connection.php');
  if(isset($_POST['adminLogin'])){
    $query="select email,password,name from admins where email='$_POST[email]' and password='$_POST[password]'";
    $query_run=mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
        echo "<script type='text/javascript'>
          window.location.href='admin_dashboard.php';
          </script>
        ";
    }
    else{
      echo "<script type='text/javascript'>alert('Pleas enter correct details.');
      window.location.href='admin_login.php';
      </script>

      ";

    }
  }
?>

<!DOCTYPE html>
<html>
  <head> 
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>TMS Admin Login Page</title>
    <!-- jQuery file -->
    <script src="../includes/jquery.js"></script>
    <!-- Bootstarp files -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
  </head>
  <body>
    <div class="row" style="margin-top: 100px;">
      <div class="col-6 col-md-6 m-auto" id="login_home_page">
        <center><h3 style="border-radius: 10px; padding: 5px; margin-bottom: 20px;">Admin Login</h3></center>
        <form action="" method="post">
          <div class="form-group" style="margin-bottom: 20px;">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <div class="form-group" style="margin-bottom: 20px;">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
          </div>
    
          <div class="form-group col-4" style="margin-bottom: 20px;">
            <input type="submit" name="adminLogin" value="Login" class="btn btn-info">
          </div>
          <div>
            <a href="../index.php" class="btn btn-warning" style="padding-left: 15px; padding-right: 15px;">Back</a>
          </div>
          
        </form>
        
      </div>
    </div>
  </body>
</html>
