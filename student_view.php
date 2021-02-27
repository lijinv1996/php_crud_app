<?php

session_start();
require_once 'student_class.php';
if(isset($_SESSION["message"])){
	$message = $_SESSION["message"];
	unset($_SESSION["message"]);
}
else{
	$message="";	
}

	$student_attendance_id =$_GET['student_attendance_id'];

	$objStudent = new Student();
	$result = $objStudent->readStudent($student_attendance_id) ;


	if ($result->num_rows > 0) {
		 if($row = $result->fetch_assoc()) {
		 	$student_id = $row['student_id'];
		 	$attendance_date =  $row['attendance_date'];
		 	$attendance_session =  $row['attendance_session'];
		 	$status=  $row['status'];
		 	$remarks=  $row['remarks'];
		 }
		}

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
											<tr>
											<td width="25%"></td>
											<td width="24%"> Student Attendance ID</td>
											<td width="2%"></td>
											<td width="30%">
												<?php echo ": $student_attendance_id" ;?>
												
											</td>
											<td ></td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%">Student_ID</td>
											<td width="2%"></td>
											<td width="30%">
												<?php echo " : $student_id" ;?>
												
											</td>
											<td >
												
											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%"> Attendance Date</td>
											<td width="2%"></td>
											<td width="30%">
												<?php echo ": $attendance_date" ;?>
												
											</td>
											<td >
												
											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%"> Attendance Session</td>
											<td width="2%"></td>
											<td width="30%">
												<?php echo ": $attendance_session" ;?>
												
											</td>
											<td >
												
											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%"> Status</td>
											<td width="2%"></td>
											<td width="30%">
												<?php echo ":$status" ;?>
												
											</td>
											<td >
												
											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%">Remarks </td>
											<td width="2%"></td>
											<td width="30%">
												<?php echo ":$remarks" ;?>
												</td>
											<td ></td>
											</tr>
											
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