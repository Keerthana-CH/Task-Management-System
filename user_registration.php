<?php
  include('includes/connection.php');
  if(isset($_POST['userRegister'])){
    
  // Assuming you have established a connection to the database

  // The value you want to check
  $value = "$_POST[email]";
  $value1 = "$_POST[name]";
  $value2 = "$_POST[mobile]";

  // Prepare the query with a placeholder for the value
  $query = "SELECT * FROM users WHERE email = ?";
  $query1 = "SELECT * FROM users WHERE name = ?";
  $query2 = "SELECT * FROM users WHERE mobile = ?";

  // Prepare the statement
  $stmt = mysqli_prepare($connection, $query);
  $stmt1 = mysqli_prepare($connection, $query1);
  $stmt2 = mysqli_prepare($connection, $query2);

  // Bind the value to the statement
  mysqli_stmt_bind_param($stmt, "s", $value);
  mysqli_stmt_bind_param($stmt1, "s", $value1);
  mysqli_stmt_bind_param($stmt2, "s", $value2);

  // Execute the statement
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_execute($stmt1);
  $result1 = mysqli_stmt_get_result($stmt1);
  mysqli_stmt_execute($stmt2);
  $result2 = mysqli_stmt_get_result($stmt2);
  // Get the result
  
  
  


  // Check if there are no rows
    if( mysqli_num_rows($result) === 0 && mysqli_num_rows($result1) === 0 && mysqli_num_rows($result2) === 0){


      $query="insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
      $query_run=mysqli_query($connection,$query);
      if($query_run){
          echo "<script type='text/javascript'>alert('User registered successfully...');
            window.location.href='index.php';
            </script>
          ";
      }
      else{
        echo "<script type='text/javascript'>alert('Error occured please try again');
        window.location.href='user_registration.php';
        </script>

        ";

      }
    }
    else{
      if(mysqli_num_rows($result) !== 0){
        echo "<script type='text/javascript'>alert('User with this email id already exists');
        window.location.href='user_registration.php';
        </script>";
      }
        
        else if(mysqli_num_rows($result1) !== 0){
        echo "<script type='text/javascript'>alert('User with this name already exists');
        window.location.href='user_registration.php';
        </script>
        ";
      }

      else if(mysqli_num_rows($result2) !== 0){
        echo "<script type='text/javascript'>alert('User with this mobile number already exists');
        window.location.href='user_registration.php';
        </script>
        ";
      }
      
    }
  }
?>

<!DOCTYPE html>
<html>
  <head> 
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>TMS Register Page</title>
    <!-- jQuery file -->
    <script src="includes/jquery.js"></script>
    <!-- Bootstarp files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <div class="row" style="margin-top: 100px;">
      <div class="col-6 col-md-6 m-auto" id="Register_home_page">
        <center><h3 style="border-radius: 10px; padding: 5px; margin-bottom: 20px;">User Registration</h3></center>
        <form action="" method="post">

          <div class="form-group" style="margin-bottom: 20px;">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>

          <div class="form-group" style="margin-bottom: 20px;">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <div class="form-group" style="margin-bottom: 20px;">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
          </div>
          
          <div class="form-group" style="margin-bottom: 20px;">
            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
          </div>

          <div class="form-group col-4" style="margin-bottom: 20px;">
            <input type="submit" name="userRegister" value="Register" class="btn btn-info">
          </div>
          <div>
            <a href="index.php" class="btn" style="padding-left: 15px; padding-right: 15px; background-color: #f57040;">Back</a>
          </div>
          
        </form>
        
      </div>
    </div>
  </body>
</html>
