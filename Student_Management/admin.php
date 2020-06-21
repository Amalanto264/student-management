<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<div class="mainbody">
		<div class="header">
			<h2 style="text-align: center;color: white; padding-top: 10px">WELCOME ADMIN</h2>
			
		</div>
		<div class="content">
			<div class="register">
				<div class="newdetails">
				<form action="admin.php" method="post">
				<table align="center" border="1px" style="width: 680px; line-height: 20px">
						<tr>
							<th colspan="7"><h2>Student Record</h2></th>
						</tr>
						<t>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Gender</th>
							<th>Course</th>
							<th>Country</th>
						</t>
				<?php

                $dbServername = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "student";

                $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

                $admin = $_SESSION["username"];
                $admin_pass = $_SESSION["password"];

                $query = "select * from stud";
                $result = mysqli_query($conn, $query);
                $records = mysqli_num_rows($result);
				//$row = mysqli_fetch_array($result);
                while($row = mysqli_fetch_array($result))
				{
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['course']; ?></td>
						<td><?php echo $row['country']; ?></td>
					</tr>
					
					<?php
					}	
                
					?>
                

				
				</table>
				<input type="submit" name="logout" style="margin-top: 10px" value="Log out">
					</form>
							
			</div></div>
			
		</div>
		<div class="footer">
			
		</div>
		
	</div>
</body>
</html>
<?php

if (isset($_POST['logout'])) {
	header("location:index.php");
}

?>

