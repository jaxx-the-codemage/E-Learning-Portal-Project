<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Instructor Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: lightgrey;">
	<center>

		<div>
			<table>
				<tr>
					<td> <img src="pic/buc.jpg" alt="cv" title="" width="200px"> </td>
					<td> <h1 style="padding-left: 10px; font-family: Garamond, serif;">BUC E-Learning Protal</h1> </td>
				</tr>
			</table>
		</div>
		<hr>
		<div class="nav" style="height: 50px;">
			<table>
				<tr>
					<td><a href="homePage.php">Home <i class="fa-regular fa-house"></i></a></td>
					<td><a href="courses.php">Courses <i class="fa-solid fa-book"></i></a></td>
					
					<td><a href="id.php">Instructor Dashboard <i class="fa-solid fa-person-chalkboard"></i></i></a></td>
					<td><a href="help.php">Help/FAQ <i class="fa-solid fa-circle-question"></i></a></td>
					<td><a href="contact.php">Contact Us <i class="fa-solid fa-address-book"></i></a></td>
				</tr>
			</table>
		</div>
		<hr>
		<br>
	</center>


	<center>
		<div class="instructor">
			<h1 style="color: #262626; margin-bottom: 40px;">An instructor?<br>Login to reach the dashboard</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="input">
				<input type="text" name="txtuser" placeholder="Your Name">
				</div>

				<div class="input">
				<input type="password" name="txtpass" placeholder="Your Password">
				</div>
				<button type="submit" name="ilogin">LOGIN</button>
			</form>
		</div>
	</center>

	<?php
	include("DB.php");
	session_start();

	function validUser($username,$password){
		$con = connect();
		$sql = "select * from admin where username='$username' and password='$password' ";
		$res = mysqli_query($con,$sql);
		$row = mysqli_num_rows($res);
		if($row>0){
			$rec = true;
		}
		else{
			$rec = false;
		}
		return $rec;
	}

	if(isset($_POST['ilogin'])){
		$user = htmlspecialchars($_POST['txtuser']);
		$pass = htmlspecialchars($_POST['txtpass']);

			if(validUser($user,$pass)){
				$_SESSION['instName'] = $user;
				header("Location:instructorDash.php");
			}
			else{
				echo"<script>alert('User not found. Check your information again!!!!')</script>";
			}
	}

	?>

</body>
</html>