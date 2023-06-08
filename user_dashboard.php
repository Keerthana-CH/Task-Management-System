
<?php
  session_start();
  if(isset($_SESSION['email'])){
  
  include('includes/connection.php');
  if(isset($_POST['create_task'])){
    $name=$_SESSION['name'];
    $query="insert into tasks values(null,'$_GET[name]','$_POST[title]','$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";

    $query_run=mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task created successfully')
          window.location.href='user_dashboard.php';
          </script>
        ";
    }
    else{
      echo "<script type='text/javascript'>alert('Please try again');
      window.location.href='user_dashboard.php';
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
  	<title>User Dashboard</title>
    <!-- jQuery file -->
    <script src="includes/jquery.js"></script>
    <!-- Bootstarp files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- jQuery -->
    <script type="text/javascript">
      $(document).ready(function(){
        $("#create_task").click(function(){
          $("#right_sidebar").load("create_task.php");
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#view_tasks").click(function(){
          $("#right_sidebar").load("view_tasks.php");
        });
      });
    </script>
  </head>
  <body>
    <!-- Header code start here... -->
    <div class="row " id="header">
      <div class="col-md-12 d-flex flex-row">
        <div class="col-8 col-md-8" style="display: inline-block;">
          <b style="font-size: 30px; font-weight: initial;"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
          <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
          <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
          </svg>  Schedule your work here, <?php echo $_SESSION['name']; ?></b> 

        </div>
        <div class="col-4 col-md-4 m-auto" style="display: inline-block; text-align: right;">
          <b style="font-size:18px;"> <?php echo $_SESSION['email']; ?></b><br>
          <a href="logout.php" class="btn" style="text-align:left; font-size: 18px; font-weight:bold;" >Logout</a>
        </div>
      </div>
    <!-- Header code end here.. -->
    <div class="row" style="margin-top:30px;">

      <div class="col-md-12 d-flex flex-row">
        <!--
        <table class="table">
          <tr>
            <td style="text-align: center;">
              <a href="user_dashboard.php" type="button" class="rrow">Dashboard</a>
            </td>
          </tr>

          <tr>       
            <td style="text-align: center;">
              <a type="button" class="rrow" id="create_task">Create Task</a>
            </td>
          </tr>

          <tr>
            <td style="text-align: center;">
              <a type="button" class="rrow" id="view_tasks">View Tasks</a>
            </td>
          </tr>

          <tr> 
            <td style="text-align: center;">
              <a href="logout.php" type="button" class="rrow">Logout</a>
            </td>
          </tr>

        </table>-->

            <div class="col-md-4" style="text-align: center;">
              <a href="user_dashboard.php"  type="button" ><button class="btn rrow">Dashboard</button></a>
            </div>

            <div class="col-md-4" style="text-align: center;">
              <a type="button" class="rrow btn" id="create_task">Create Task</a>
            </div>

            <div class="col-md-4" style="text-align: center;">
             <a type="button" class="rrow btn" id="view_tasks">View Tasks</a>
            </div>

         
      </div>
    </div>
    <div class="row">
      <div class="col-md-10" style="text-align: center;" id="right_sidebar">
        <div class="col-md-12" style=" margin-top: 100px; margin-left:100px;">
          <form method="post">
            <input type="text" name="search" placeholder="Search by Task Title">
            <a href="search.php"><button class="btn btn-secondary" name="submit">Search</button></a>
          </form>
        </div>
        <table class="table">
          <?php

          $sno=1;
          if(isset($_POST['submit'])){
            $search=$_POST['search'];

            $query="select*from tasks where uname='$_SESSION[name]' and title like '%$search%'";
            $result=mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
              ?>
                <tr>
                  <th>S.No</th>
                  <th>Task Id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Action</th>
    
                <?php
                  while($row=mysqli_fetch_assoc($result)){
                ?>
                  <tr>    
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $row['tid']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['startdate']; ?></td>
                    <td><?php echo $row['enddate']; ?></td>
                    <td><?php echo $row['status']; ?></td>  
                    <td><a href="update.php?id=<?php echo$row['tid']?>">Update</a> | <a href="del_task.php?id=<?php echo$row['tid']?>">Delete</a></td>            
                  </tr>
                  <?php
                  $sno=$sno+1; 
                  }
                  ?>
                </tr>

                <?php
              }
              else{
              ?><h3 style="color:red; font-weight:normal; margin-left: 50px; margin-top: 30px;">Data not found</h3>
                <?php
              }
            }
          ?>
    
        </table>
      </div>
    </div>
  </body>
</html>
<?php
}
else{
  header('Location: user_login.php');
}