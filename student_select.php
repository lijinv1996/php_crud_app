<?php

session_start();
require_once 'student_class.php';
$message ="";
$errStudentName = $errMark1 = $errMark2 = $errMark3 = "";


$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$student_attendance_id = $_POST['student_attendance_id'];
	if($student_attendance_id == 'select'){
		$message = "please select a valid roll number ";
	} else{

			$_SESSION["message"] = "student_attendance_id : $student_attendance_id selected ";
 		header("Location: student_view.php?student_attendance_id=$student_attendance_id");


	}


}

	$objStudent = new Student();
	$result = $objStudent->readStudents() ;

?>
<html>
	<head>
		<title>Keltron</title>
		<style type="text/css">
			table{
				  border-collapse: collapse;
			}
		</style>
	</head>
	<body  >
		<table border="1" width="100%">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<tr> 
				<td>
					<table border="0" width="100%" height="100px">
						<tr style="background-color:#FFBF00;"> 
							<td align="center">
							<h2>Keltron Knowledge Center</h2>
							</td>
						</tr>
					</table>
					<table border="0" width="100%" height="595px">
						<tr> 
							<td valign="top" align="center">
								<table border="0" width="100%">
									<tr><td valign="top" align="center">
									<?php 
									require_once 'include/menu.php';

									?>

								</td></tr>
									<tr><td valign="top" align="center" style="font-size: 17px; font-family: Arial, Helvetica, sans-serif;   color:#FFBF00; ">Student Information System</td></tr>
									<tr><td valign="top" align="center"  style="font-size: 12px; font-family: Arial, Helvetica, sans-serif;   color:red; ">
										<?php echo "$message" ;?>
									</td></tr>
									<tr><td valign="top" align="center">
										<table border="0" height ="250px" width="60%">
										<?php
												if($result->num_rows > 0) {
													?> 
											<tr>
											<td width="25%"></td>
											<td width="24%">Student Attendance ID</td>
											<td width="2%"></td>
											<td width="30%">
									<select name="student_attendance_id" >
										<option value="select"> select</option>
													<?php

		 											while($row = $result->fetch_assoc()) {
		 													$student_attendance_id = $row['student_attendance_id'];
		 													?>
									<option value='<?php echo "$student_attendance_id" ;?>' >
										<?php echo "$student_attendance_id" ;?>
									</option>

												    <?php
												    	 }
													
												    ?>
											
									</select>
											</td>
											<td ><input type="submit" name="btnSubmit" value="View"></td>
											</tr>

									

											<tr>
											<td width="25%"></td>
											<td width="24%"> </td>
											<td width="2%"></td>
											<td width="30%">
												
											</td>
											<td ></td>
											</tr>
											<?php 
												}else
												{
													?>
												<tr><td colspan="5">
													No Records Found
												</td></tr>

													<?php
												}
											?> 
											
										</table>




									</td></tr>
								</table>


							</td>
						</tr>
					</table>
					<table border="0" width="100%" height="40px" >
						<tr style="background-color:#FFBF00;" height="60%"> 
							<td align="center">keltron &#169; 2020</td>
						</tr>
						<tr style="background-color:#000000;" height="40%"> 
							<td> </td>
						</tr>
					</table>

				</td>
			</tr>
		</form>
		</table>

	</body>
</html>