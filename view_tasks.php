<?php
	session_start();
	if(isset($_SESSION['email'])){
	include('includes/connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="row " style="margin-top: 100px; margin-left: 100px;">
		
	
	<center><h3>List of all Tasks</h3></center>
	<center><table class="table" id="vttable">
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
				$sno=1;
				
				$query="select*from tasks where uname='$_SESSION[name]'";
				$query_run=mysqli_query($connection,$query);
				while($row=mysqli_fetch_assoc($query_run)){
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
	</table></center>
</div>
</body>
</html>
<?php
}
else{
  header("Location: user_login.php");
}