
<?php
  session_start();
  if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Task</title>
    <!-- jQuery file -->
    <script src="includes/jquery.js"></script>
    <!-- Bootstarp files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    
    <div class="row" style="margin-top:70px; margin-left: 300px;">
      <h3>Create a new Task</h3>
      <div class="col-md-12">
        <?php
        // Assuming the URL is something like: http://example.com/page.php?name=John

          //if(isset($_REQUEST['name'])) {
            //$name = $_SESSION['variableName'];
            // Use the $name variable for further processing or display
            //echo "Name: " . $name;
          //} else {
            // Handle the case when the 'name' parameter is not present in the URL
            //echo "Name parameter is missing in the URL.";
          //}
        ?>

        <form action="" method="post">
          <div class="form-group" style="margin-bottom: 10px;">
            <label>Task Title:</label>
            <textarea class="form-control" rows="1" cols="50" name="title" placeholder="Mention the task title in 1 line"></textarea>
          </div>
          <div class="form-group">
            <label>Description:</label>
            <textarea class="form-control" rows="5" cols="50" name="description" placeholder="Describe your task in detil"></textarea>
          </div>
          <div class="form-group">
            <label>Start Date:</label>
            <input type="date" class="form-control" name="start_date">
          </div>
          <div class="form-group" style="margin-bottom: 10px;">
            <label>End Date:</label>
            <input type="date" class="form-control" name="end_date">
          </div>
          <input type="submit" class="btn btn-warning" name="create_task" value="Create">
        </form>
      </div>
    </div>
  </body>
</html>
<?php
}
else{
  header("Location: user_login.php");
}