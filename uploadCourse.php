<?php
session_start();
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
			
			<div class="content" id="upload">
				<h2>Upload New Course</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<table>
						<tr>
							<td> <label>Enter Course Name : </label> </td>
							<td> <input type="text" name="txtcName"> </td>
						</tr>
						<tr>
							<td> <label>Enter Days : </label> </td>
							<td> <input type="text" name="txtday"> </td>
						</tr>
						<tr>
							<td> <label>Enter Start Date : </label> </td>
							<td> <input type="date" name="txtsDate"> </td>
						</tr>
						<tr>
							<td> <label>Enter End Date : </label> </td>
							<td> <input type="date" name="txteDate"> </td>
						</tr>
						<tr>
							<td> <label>Enter Fees (MMK): </label> </td>
							<td> <input type="text" name="txtfee"> </td>
						</tr>
						<tr>
							<td colspan="2"><center><input type="submit" name="uploadCourse"></center></td>
						</tr>
					</table>
				</form>
			</div>


		</div>

</body>
</html>

<?php
//session_start();
include("DB.php");

if(isset($_POST['uploadCourse'])){
	$cName = htmlspecialchars($_POST['txtcName']);
	$day = htmlspecialchars($_POST['txtday']);
	$sDate = htmlspecialchars($_POST['txtsDate']);
	$eDate = htmlspecialchars($_POST['txteDate']);
	$fee = htmlspecialchars($_POST['txtfee']);

	$conn = connect();

	$sql = "insert into courses(cName,days,sDate,eDate,fees) values('$cName','$day','$sDate','$eDate',$fee)";
	$res = mysqli_query($conn,$sql);

	if($res){
		echo "<script>alert('Successfully Inserted a New Course.'); window.location.href = 'uploadCourse.php'</script>";
	}
	
	else{
		echo "<script>alert('Error!')</script>";
	}
}

?>
