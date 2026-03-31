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

			<div>
				<h1> <i class="fa-solid fa-screwdriver-wrench"></i> Welcome to the BUC E-Learning Instructor Dashboard!!</h1>
				<h2> <i class="fa-solid fa-list-check"></i> Empowering instructors. Streamlining course management. Enhancing learner success.</h2>
				<p style="font-size: 20px;">This dashboard gives you full control over your course ecosystem—from uploading new modules to updating schedules, managing fees, and tracking instructor assignments. Whether you're refining existing content or launching new programs, every tool here is built to support clarity, efficiency, and impact.</p>
				<h2 style="padding-bottom: 0px;"><i class="fa-solid fa-magnifying-glass"></i> What you can do here:</h2>
				<h3 style="padding-top: 0px;">
				- Upload, update, or delete courses<br>
				- Set course timelines<br>
				- Monitor Enrolled Students<br>
				- Upload, update, or delete Course Materails
				</h3>
				<h2 style="text-align: center;">"Let’s build a smarter, more accessible learning experience—one course at a time."</h2>
			</div>
			

		</div>
		
	</div>




</body>
</html>