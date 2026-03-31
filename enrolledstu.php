<?php
session_start();
include("DB.php");

?>
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

	<div style="display: flex;">
		<div style="width: 80%;">
			<table>
				<tr>
					<td> <img src="pic/buc.jpg" alt="cv" title="" width="200px"> </td>
					<td> <h1 style="padding-left: 10px; font-family: Garamond, serif;">BUC E-Learning Protal Instructor Dashboard</h1> </td>
				</tr>
			</table>
		</div>
		<div class="info" style="width: 20%;">
			<table>
				<tr>
					<td> <a href=""> <?php echo $_SESSION['instName']; ?> </a> </td>
					<td>|</td>
					<td> <a href="id.php">Logout</a> </td>
				</tr>
			</table>
		</div>
	</div>		
		<hr>
		

	<div class="dash">
		<div class="left">
			<ul>
				<li style="margin-top: 55px"> <a href="uploadCourse.php">Upload Courses</a> </li>
				<li> <a href="updateCourse.php">Update Courses</a> </li>
				<li> <a href="deleteCourse.php">Delete Courses</a> </li>
				<li> <a href="uploadMaterial.php">Upload Course Materials</a> </li>
				<li> <a href="updateMaterial.php">Update Course Materials</a> </li>
				<li> <a href="deleteMaterial.php">Delete Course Materials</a> </li>
				<li> <a href="enrolledstu.php">View Enrolled Students</a> </li>
			</ul>
		</div>

		<div class="right">

			<div class="content">
				<form method="post">
					<table>
						<tr>
							<td><center><input type="submit" name="showestu" value="View Enrolled Students' Data"></center></td>
						</tr>
					</table>
				
				<hr>
				</form>

				<?php

				function getCourse(){
					$con = connect();
					$sql = "select * from courses";
					$res = mysqli_query($con,$sql);
					$course = [];
					while($rec = mysqli_fetch_array($res)){
						$course[]= $rec;
					}
					return $course;
				}

				if(isset($_POST['showestu'])){
					$con = connect();
					$sql = "select * from user";
					$res = mysqli_query($con,$sql);
					if(mysqli_num_rows($res)>0){
						echo "<table class='contents'> 
								<tr>
									<th>Student Name</th>
									<th> | </th>
									<th>Email</th>
									<th> | </th>
									<th>Enrolled Class </th>
									</tr>";
						$course = getCourse();
						$courseMap = [];
						foreach ($course as $item) {
						    $courseMap[$item['cid']] = $item['cName'];
						}
						while($rec = mysqli_fetch_array($res)){
							$cid = $rec['cid'];
    						$cName = isset($courseMap[$cid]) ? $courseMap[$cid] : "Unknown";

							echo "<tr>
									<td style='font-size: 16px;'>$rec[username]</td>
									<td> | </td>
									<td style='font-size: 16px;'>$rec[email]</td>
									<td> | </td>
									<td style='font-size: 16px;'>$cName</td>
								  </tr>";
						}
						echo "</form></table>";
					}
				}

				?>

			</div>
			

		</div>
		
	</div>




</body>
</html>