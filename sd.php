<?php
session_start();
if(isset($_POST['showC'])){
	$_SESSION['enroll']=$_POST['showC'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
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
	</center>



	<center>
		<div class="instructor">
			<h1 style="color: #262626; margin-bottom: 40px;">Already enrolled in a class?</h1>
			<h1 style="color: #262626; margin-bottom: 40px;">Login for details</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="input">
				<input type="text" name="txtuser" placeholder="Your Name">
				</div>

				<div class="input">
				<input type="password" name="txtpass" placeholder="Your Password">
				</div>
				<label style="font-size: 18px;">New User? <a href="register.php">Register</a> Now! </label><br>
				<button type="submit" name="slogin" style="margin-top: 15px;">LOGIN</button>
				
			</form>
		</div>
	</center>

	<?php
	include("DB.php");

	function validUser($username,$password){
		$con = connect();
		$sql = "select * from user where username='$username' and password='$password' ";
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

	if(isset($_POST['slogin'])){
		$user = htmlspecialchars($_POST['txtuser']);
		$pass = htmlspecialchars($_POST['txtpass']);

		$con = connect();
		$sql = "select * from user where username='$user' and password='$pass'";
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
			while($rec = mysqli_fetch_array($res)){
				$cid=$rec["cid"];

				if($cid==$_SESSION['enroll']){
					header("Location:studentDash.php");
				}
				else{
					echo "<script> alert('Please Enroll the class'); window.location.href='register.php' </script>";
				}
			}
		}
				else{
					echo "<script> alert('Please Enroll the class'); window.location.href='register.php' </script>";
				}
		
	}

	?>


</body>
</html>