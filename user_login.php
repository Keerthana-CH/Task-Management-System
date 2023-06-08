<?php
  session_start();
  //$_SESSION['variableName'] = $username1;  

  include('includes/connection.php');
  if(isset($_POST['userLogin'])){
    $query="select email,password,name,uid from users where email='$_POST[email]' and password='$_POST[password]'";
    $query_run=mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
      while($row=mysqli_fetch_assoc($query_run)){        
        $_SESSION['uid']=$row['uid'];
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        $_SESSION['password']=$row['password'];
        $_SESSION['mobile']=$row['mobile'];

        $username1= $row['name'];
      // Construct the URL with the username
      $url = "user_dashboard.php?name=" . $username1;

    // Redirect to the user page
      header("Location: $url");
      //exit();

      }
        #echo "<script type='text/javascript'>
         #window.location.href='user_dashboard.php';
          #</script>
        #";
        // Assuming the user's name is stored in the $username variable
      $row1=mysqli_fetch_assoc($query_run);
      $username="keerthana";
      

    }
    else{
      echo "<script type='text/javascript'>alert('Pleas enter correct details.');
      window.location.href='user_login.php';
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
  	<title>TMS User Login Page</title>
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
      <div class="col-6 col-md-6 m-auto" id="login_home_page">
        <center><h3 style="border-radius: 10px; padding: 5px; margin-bottom: 20px;">User Login</h3></center>
        <form action="" method="post">
          <div class="form-group" style="margin-bottom: 20px;">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <div class="form-group" style="margin-bottom: 20px;">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
          </div>
    
          <div class="form-group col-4" style="margin-bottom: 20px;">
            <input type="submit" name="userLogin" value="Login" class="btn btn-info" >
          </div>
          <div>
            <a href="index.php" class="btn" style="padding-left: 15px; padding-right: 15px; background-color: #f57040;">Back</a>
          </div>
          
        </form>
        
      </div>
    </div>
  </body>
</html>
