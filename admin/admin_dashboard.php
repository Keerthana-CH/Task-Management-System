
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- jQuery file -->
    <script src="includes/../jquery.js"></script>
    <!-- Bootstarp files -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
  </head>
  <body>
    <!-- Header code start here... -->
    <div class="row" id="header">
      <div class="col-md-12">
        <div class="col-6 col-md-4" style="display: inline-block;">
          <h3>Task Management System</h3>
        </div>
        <div class="col-4 col-md-6" style="display: inline-block; text-align: right;">
          <b>Email: </b> admin@gmail.com
          <span><b style="margin-left: 20px;">Name: </b>Admin</span>
        </div>
      </div>
    <!-- Header code end here.. -->
    <div class="row">

      <div class="col-md-2" id="left_sidebar">
        <table class="table-dark" style="text-align: left;">
          <tr>
            <td style="text-align: center;">
              <a href="admin_dashboard.php" type="button" id="logout_link">Dashboard</a>
            </td>
          </tr>

          <tr>       
            <td style="text-align: center;">
              <a href="create_task.php" type="button" id="row">Create Task</a>
            </td>
          </tr>

          <tr>
            <td style="text-align: center;">
              <a href="view_tasks.php" type="button" id="row">View Tasks</a>
            </td>
          </tr>

          <tr> 
            <td style="text-align: center;">
              <a href="logout.php" type="button" id="logout_link">Logout</a>
            </td>
          </tr>

        </table>
      </div>

      <div class="col-md-10" id="right_sidebar">
        
      </div>
    </div>
    </div>
  </body>
</html>
