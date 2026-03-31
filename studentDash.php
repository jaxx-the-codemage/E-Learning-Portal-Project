<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Dashboard</title>
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
					<td><a href="">My Dashboard <i class="fa-solid fa-user-graduate"></i></a></td>
					<td><a href="id.php">Instructor Dashboard <i class="fa-solid fa-person-chalkboard"></i></i></a></td>
					<td><a href="help.php">Help/FAQ <i class="fa-solid fa-circle-question"></i></a></td>
					<td><a href="contact.php">Contact Us <i class="fa-solid fa-address-book"></i></a></td>
				</tr>
			</table>
		</div>
		<hr>
	</center>

	<div class="container">
		
			<?php

				include("DB.php");
				$con = connect();
				$cid = intval($_SESSION['enroll']);
				$sql = "select * from materials where cid=$cid";
				$res=mysqli_query($con,$sql);
				if(mysqli_num_rows($res)>0){

					while($rec=mysqli_fetch_array($res)){
						$filePath = htmlspecialchars($rec['fpath']);
        				$fileName = basename($filePath);
        				echo "<div class='d1'>";
						echo "<h2>$rec[mName]</h2>";
						echo "<p style='font-size: 18px; font-weight: bold;'> <a href='$filePath' download='$fileName' target='_blank' style='text-decoration: none; color: black;'>$fileName</a></p>";
						echo "</div>";
					}
				}

			?>
			
		
	</div>




</body>
</html>