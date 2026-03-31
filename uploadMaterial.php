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

			<div class="contents" id="upload">
				<h2>Upload the Course Materials</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
						<td> <label>Enter Material Name : </label> </td>
							<td> <input type="text" name="txtmName"> </td>
						</tr>
						<tr>
							<td> <label>Upload File : </label> </td>
							<td> <input type="file" name="material"> </td>
						</tr>
						<tr>
							<td> <label>Choose Course : </label> </td>
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
							<td colspan="2"><center><input type="submit" name="uploadMaterial" value="Upload"></center></td>
						</tr>
					</table>
				</form>
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

if(isset($_POST['uploadMaterial'])){
	$con=connect();
	$mname = $_POST['txtmName'];
	$cid = htmlspecialchars($_POST['cor']);
	$file = $_FILES['material']['name'];
	$target = "files/" . basename($file);

	if(move_uploaded_file($_FILES['material']['tmp_name'], $target)){
		$sql = "insert into materials(mName, fpath, cid) values ('$mname','$target','$cid')";
		if (!$con) {
    		die("Database connection failed: " . mysqli_connect_error());
		}
		else{
			mysqli_query($con,$sql);
			echo "<script>alert('File Uploaded Successfully.')</script>";
		}
	}
	else{
		echo "<script>alert('File Upload Failed!!!')</script>";
	}
}

?>