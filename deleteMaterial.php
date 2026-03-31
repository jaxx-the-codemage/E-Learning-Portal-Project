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
				<h2>Delete Course Material</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<table>
						<tr>
							<td><label>Choose Course to Delete its Material: </label></td>
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
							<td colspan="2"><center><input type="submit" name="showCourse" value="Show Course Materials"></center></td>
						</tr>
					</table>
				</form>
				<hr>

				<?php

				if(isset($_POST['showCourse'])){
					$cID = htmlspecialchars($_POST['cor']);
					$con = connect();
					$sql = "select * from materials where cid=$cID";
					$res = mysqli_query($con,$sql);
					if(mysqli_num_rows($res)>0){
						echo "<table class='contents'> 
								<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
								<tr>
									<th>Material Name</th>
									<th> | </th>
									<th>File Path</th>
									</tr>";
						while($rec = mysqli_fetch_array($res)){
							echo "<tr>
									<td style='font-size: 16px;'>$rec[mName]</td>
									<td> | </td>
									<td style='font-size: 16px;'>$rec[fpath]</td>
									<td><button type=submit value=$rec[mid] name=removeMaterial onclick=\"return confirm('Are you sure that you want to delete?')\">Remove</button></td>
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

if(isset($_POST['removeMaterial'])){
	$mid = $_POST['removeMaterial'];
	$con = connect();
	$sql = "delete from materials where mid=$mid";
	$res = mysqli_query($con,$sql);

	if($res){
		echo"<script>alert('Material Deleted!'); window.location.href='deleteMaterial.php'</script>";
	}
	else{
		echo"<script>alert('Error!')</script>";
	}	
}


?>