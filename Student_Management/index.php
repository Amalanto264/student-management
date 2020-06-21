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
			<div class="login">
				<div class="details">
				<h2 style="text-align: center;">Login</h2>
                <form action="index.php" method="post">
                <p>Login as...<input type="radio" id="admin" name="usertype" value="admin">
                	<label for="admin">Admin</label>
                	<input type="radio" name="usertype" id="student" value="student">
                	<label for="student">Student</label></p>
                <p align="center">Username:
                <input type="text" id="user" name="user"></p>
                <p align="center">Password:
                <input type="password" id="pass" name="pass"></p> 

	
<tr><td colspan="5" align="center"> <input type="submit" id="btn" name="signin" value="Login"></td></tr>
<p align="center">New member ?</p>
<p><a href="reg.php">Sign up</a> </p>
</form>
							
			</div></div>
			
		</div>
		<div class="footer">
			
		</div>
		
	</div>

</body>
</html>
<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "student";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(isset($_POST['signin']))
{
	$user = $_POST['usertype'];
	if ($user == "admin") {

		    $username = $_POST['user'];
	$password = $_POST['pass'];
	$_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    $query = "select * from admin where username='$username' && password='$password'"; 
	$result = mysqli_query($conn, $query);
	$records = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	if($records == 0)
	{
		echo "wrong username or password";
	}

	else
    {
		header("location:admin.php");
    }
	}

	elseif ($user == "student") {
		
	
    $username = $_POST['user'];
	$password = $_POST['pass'];
	$_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
	
	$query = "select * from stud where username='$username' && password='$password'"; 
	$result = mysqli_query($conn, $query);
	$records = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	if($records == 0)
	{
		echo "wrong username or password";
	}

	else
	{
		//echo "It worked..!";
		header("location:stud.php");
	}
}
}
?>