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
			<h2 style="text-align: center;color: white; padding-top: 10px">STUDENT MANAGEMENT</h2>

		</div>
		<div class="content">
			<div class="register">
				<div class="newdetails">
				<form action="stud.php" method="post">
				<h2 style="text-align: center;"><?php
                       echo "Welcome " ,$_SESSION["username"], "..!" ;
                           ?> </h2>

<?php
//echo "Password is " ,$_SESSION["password"];
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "student";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$student = $_SESSION["username"];
$stud_pass = $_SESSION["password"];

$query = "select * from stud where username ='$student' && password ='$stud_pass'";
$result = mysqli_query($conn, $query);
$records = mysqli_num_rows($result);
//$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result))
{
	?>
	
	

	
				<table align="center">
					<tr><td>
				User ID </td><td><input type="text"  name="userid" value="<?php echo $row['id']; ?>"></td></tr>
					<tr><td>
				User name </td><td><input type="text" name="user" value="<?php echo $row['username']; ?>"></td></tr>
				<tr><td>Password</td><td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td></tr>
				<tr><td>Full name</td><td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td></tr>
				<tr><td>email</td><td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td></tr>
				<tr><td>Phone</td><td><input type="text" name="phone" value="<?php echo $row['phone']; ?>"></td></tr>
				<tr><td>Gender</td><td><input type="text" name="gender" id="gender" value="<?php echo $row['gender']; ?>">
					</td></tr>
				<tr><td>Course</td><td><input type="text" name="course" id="course" value ="<?php echo $row['course']; ?>">
                        </td></tr>
				<tr><td>Country</td><td><input type="text" name="country" value="<?php echo $row['country']; ?>"></td></tr>
				<tr> </tr><tr><td></td>
				</table>

				<div class="btn">
				<input type="submit" name="edit" id="" value="Edit">	
                <input type="submit" style="margin-left: 10px;" name="update" id="" value="Update">
                <input type="submit" style="margin-left: 10px;" name="logout" id="" value="Log out"></div>
                
                
</form>
							
			</div></div>
			
		</div>
		<div class="footer">
			
		</div>
		
	</div>
</body>
</html>
<?php
}
?>

<script type="text/javascript">
	function display(){
		var r = confirm("Do you want to update ?");
		if(r == true)
		{
			window.location.href = "index.php";
		}
		else{
			return false;
		}
	}

function exit(){
		var r = confirm("Do you want to logout ?");
		if(r == true)
		{
			window.location.href = "index.php";
		}
		else{
			return false;
		}
	}

</script>


<?php

if(isset($_POST['update']))
{
	$id = $_POST['userid'];
	$username= $_POST['user'];
	$password= $_POST['password'];
	$name=$_POST['name'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
		
	$country= $_POST['country'];

$query = "update stud set username = '$username', password = '$password', name = '$name', email = '$email', 
          phone = '$phone' where id = '$id'";
	if(mysqli_query($conn,$query)) 
	{	
		echo '<script type="text/javascript"> display(); </script>';
	}
}

if(isset($_POST['logout']))
 {
 	session_destroy();
    echo '<script type="text/javascript"> exit(); </script>';
 }
 ?>
