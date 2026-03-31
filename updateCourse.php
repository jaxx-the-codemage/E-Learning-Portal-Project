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
				<li style="margin-top: 80px"> <a href="uploadCourse.php">Upload Courses</a> </li>
				<li> <a href="updateCourse.php">Update Courses</a> </li>
				<li> <a href="deleteCourse.php">Delete Courses</a> </li>
				<li> <a href="uploadMaterial.php">Upload Course Materials</a> </li>
				<li> <a href="updateMaterial.php">Update Course Materials</a> </li>
				<li> <a href="deleteMaterial.php">Delete Course Materials</a> </li>
				<li> <a href="enrolledstu.php">View Enrolled Students</a> </li>
			</ul>
		</div>

		<div class="right">
			
			<div class="content" id="update">
				<h2>Update Course</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<table>
						<tr>
							<td><label>Choose Course: </label></td>
							<td>
								<select name="cor"> 
									<?php

										$course = getCourse();
										foreach ($course as $item) {
											echo "<option value='{$item['cid']}'>{$item['cName']}</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><center><input type="submit" name="showCourse" value="Show Course Details"></center></td>

						</tr>
					</table>
				</form>

				<div class="upd">
					<?php
					if(isset($_POST['showCourse'])){
						$cID = htmlspecialchars($_POST['cor']);
						$con = connect();
						$sql = "select * from courses where cid=$cID";
						$res = mysqli_query($con,$sql);
						if(mysqli_num_rows($res)>0){
							echo "<table>";
							while($rec = mysqli_fetch_array($res)){
								echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
								echo "<tr>
									<td><input type='text' value='$rec[cName]' name=txtcName></td>
									<td><input type=text value='$rec[days]' name=days></td>
									<td><input type=date value='$rec[sDate]' name=sDate></td>
									<td><input type=date value='$rec[eDate]' name=eDate></td>
									<td><input type=text value='$rec[fees]' name=fee></td>
									<td><button type=submit value='$rec[cid]' name=updateCourse onclick=\"return confirm('Are you sure that you want to update the data?')\">Update</button></td>
									 </tr>";
								echo "</form>";
							}
							echo "</table>";
						}
					}


					?>
				</div>

				
			</div>


		</div>

</body>
</html>

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




if(isset($_POST['updateCourse'])){
	$cName = htmlspecialchars($_POST['txtcName']);
	$days = htmlspecialchars($_POST['days']);
	$sdate = htmlspecialchars($_POST['sDate']);
	$eDate = htmlspecialchars($_POST['eDate']);
	$fee = htmlspecialchars($_POST['fee']);
	$cid = htmlspecialchars($_POST['updateCourse']);

	$con = connect();
	$sql = "update courses set cName='$cName', days='$days', sDate='$sdate', eDate='$eDate', fees = '$fee' where cid='$cid'";
	$res = mysqli_query($con,$sql);

	if($res){
		echo"<script>alert('Updated Successfully.'); window.location.href='updateCourse.php'</script>";
	}
	else{
		echo"<script>alert('Error!')</script>";
	}
}
?>