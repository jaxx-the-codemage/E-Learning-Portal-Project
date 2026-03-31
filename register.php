<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
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
			<h1 style="color: #262626; margin-bottom: 40px;">Here your Form to enroll.</h1>
			<h1 style="color: #262626; margin-bottom: 40px;">Registeration Form</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validate()">
				<div class="input">
				<input type="text" name="txtuser" id="txtuser" placeholder="Your Name">
				</div>

				<div class="input">
				<input type="password" name="txtpass" id="txtpass" placeholder="Your Password">
				</div>

				<div class="input">
				<input type="email" name="txtmail" id="txtmail" placeholder="Your E-mail">
				</div>

				<label style="font-size: 18px;">Already registered? <a href="sd.php">Login</a> Now! </label><br>
				<button type="submit" name="reg" style="margin-top: 15px;">Register</button>
				
			</form>
		</div>
	</center>

	<script type="text/javascript">
		function validate(){
			//empty?
			var name = document.getElementById("txtuser").value //accept user input
			if(name == ""){
				alert("Please fill username!!!")
				return false;
			}

			var pass = document.getElementById("txtpass").value //accept user input
			if(pass == ""){
				alert("Please fill password!!!")
				return false;
			}

			var mail = document.getElementById("txtmail").value //accept user input
			if(mail == ""){
				alert("Please fill email!!!")
				return false;
			}
			//email format?
			var validFormat= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/
			if(!validFormat.test(email)){
				alert("Invalid Email Format!!")
				return false;
			}	
			return true;
		}
	</script>

		<?php
		include("DB.php");

			if(isset($_POST['reg'])){
				$name = htmlspecialchars($_POST['txtuser']);
				$pass = htmlspecialchars($_POST['txtpass']);
				$mail = htmlspecialchars($_POST['txtmail']);

				$con = connect();
				$sql = "insert into user(username,password,email,cid) values ('$name', '$pass','$mail',$_SESSION[enroll])";
				$res = mysqli_query($con,$sql);

				if($res){
					echo "<script>alert('Successfully Registered. Please login to your account.'); window.location.href = 'sd.php'</script>";
				}
				
				else{
					echo "<script>alert('Error!')</script>";
				}
			}

		?>

</body>
</html>