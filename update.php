<?php
	session_start();
	if(isset($_SESSION['email'])){
	include('includes/connection.php');
	$urlid=curl_init('https://nombre.is/stream.php?mid=' . $_GET['id']);
	$intid=intval($urlid);
	if(isset($_POST['update_task'])){
		$query="update tasks set description='$_POST[description]',startdate='$_POST[start_date]',enddate='$_POST[end_date]',status='$_POST[status]' where tid=$_GET[id]";
		$query_runn=mysqli_query($connection,$query);
		if($query_runn){
			echo "<script type='text/javascript'>
			alert('Task updated successfully')
          window.location.href='user_dashboard.php';
          </script>
        ";
    }
    else{
      echo "<script type='text/javascript'>alert('Pleas enter correct details.');
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
	<title>TMS_update</title>
	<!-- jQuery file -->
    <script src="includes/jquery.js"></script>
    <!-- Bootstarp files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css">
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
          <a href="logut.php" class="btn" style="text-align:left; font-size: 18px; font-weight:bold;" >Logout</a>
        </div>
      </div>
    </div>
	<!-- Header code end here...-->
	<div class="row">
		<div class="col-md-4 m-auto" style="color: white;"><br>
			<h3>Edit the Task</h3>
			<?php
				$query="select*from tasks where tid=$_GET[id]";
				$query_run=mysqli_query($connection,$query);
				while($row=mysqli_fetch_assoc($query_run)){
					?>
			<form action="" method="post">
				<div class="form-group">
					<input type="hidden" name="id" class="form-control" value="" required>
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
            		<label>Task Title:</label>
            		<textarea class="form-control" rows="1" cols="50" name="title" required><?php echo $row['title'];?></textarea>
          		</div>

          		<div class="form-group">
            		<label>Description:</label>
            		<textarea class="form-control" rows="5" cols="50" name="description" required><?php echo $row['description'];?></textarea>
          		</div>

          		<div class="form-group">
            		<label>Start Date:</label>
            		<input type="date" class="form-control" name="start_date" value="<?php echo $row['startdate'];?>" required>
          		</div>

          		<div class="form-group" style="margin-bottom: 10px;">
            		<label>End Date:</label>
            	<input type="date" class="form-control" name="end_date" value="<?php echo $row['enddate'];?>" required>
          		</div>
          		<div class="form-group" style="margin-bottom:15px;">
            		<select class="form-control" name="status">
            			<!--<option>-Select-</option>-->
            			<option>-selecet status-</option>
            			<option>Not Started</option>
            			<option>In Progress</option>
            			<option>Completed</option>
            		</select>
          		</div>
          		<input type="submit" class="btn btn-warning" name="update_task" value="Update">
			</form>
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>
<?php
}
else{
  header('Location: user_login.php');
}