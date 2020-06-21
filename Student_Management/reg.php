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
				<form action="reg.php" method="post">
				<h2 style="text-align: center;">Register here</h2>
				<table align="center">
					<tr><td>
				User name </td><td><input type="text" name="user"></td></tr>
				<tr><td>Password</td><td><input type="Password" name="password"></td></tr>
				<tr><td>Full name</td><td><input type="text" name="name"></td></tr>
				<tr><td>email</td><td><input type="text" name="email"></td></tr>
				<tr><td>Phone</td><td><input type="tel" name="phone"></td></tr>
				<tr><td>Gender</td><td><input type="radio" name="gender" id="male" value="male">
					<label for="male">Male</label>
					<input type="radio" name="gender" id="female" value="female">
						<label for="female">Female</label>
						<input type="radio" name="gender" id="others" value="others">
						<label for="female">Others</label></td></tr>
				<tr><td>Course</td><td><select name="course" id="course">
                        <option value="International Business & Engineering">International Business & Engineering </option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Big Data">Big Data</option>
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        </select></td></tr>
				<tr><td>Country</td><td><input type="text" name="country"></td></tr>
				<tr> </tr><tr><td></td>
				</table>

				<div class="btn">
				<input type="submit" name="signup" id="" value="Sign up">	
                <input type="submit" style="margin-left: 20px;" name="home" id="" value="Home"></div>
                
                
</form>
							
			</div></div>
			
		</div>
		<div class="footer">
			
		</div>
		
	</div>
</body>
</html>
<script type="text/javascript">
	function display(){
		var r = confirm("Do you want to submit");
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
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "student";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(isset($_POST['signup']))
{
	$username= $_POST['user'];
	$password= $_POST['password'];
	$name=$_POST['name'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	//echo "<h3>Sucessfully Registered<h3>", $username, $name, $email;
	$gender= $_POST['gender'];
	$course= $_POST['course'];
	$country= $_POST['country'];

	$query = "insert into stud (username,password,name,email,phone,gender,course,country) values
	('$username','$password','$name','$email','$phone','$gender','$course','$country')";
	if(mysqli_query($conn,$query))
	{
		//echo "<h3>Sucessfully Registered<h3>";
		echo '<script type="text/javascript"> display(); </script>';
		//echo '<script language="javascript">';
//echo 'alert("Sucessfully Registered")';
//echo '</script>';

	
}
}
if (isset($_POST['home'])) 
{
	header("location:index.php");
}

?>