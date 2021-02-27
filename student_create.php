<?php
session_start();
require_once 'student_class.php';
$message ="";
$errstudentid = $errattendancedate = $errattendancesession = $errstatus = $errremarks="";
$student_id = $attendance_date = $attendance_session = $status=$remarks= "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$student_id         = $_POST['studentid'];
$attendance_date    = $_POST['attendancedate'];
$attendance_session = $_POST['attendancesession'];
$status             = $_POST['status'];
$remarks            = $_POST['remarks'];

if(empty($student_id)){
	$errstudentid = "* ID must not  empty";
	$error = true;
}
if(empty($attendance_date)){
	$errattendancedate = "* date must not empty";
	$error = true;
}
if(empty($attendance_session)){
	$errattendancesession = "* session must not empty";
	$error = true;
}
if(empty($status)){
	$errstatus = "* status must not empty";
	$error = true;
}
if(empty($remarks)){
	$errremarks = "* remarks must not empty";
	$error = true;
}

if($error == true ){
	$message ="please fix the errors";

}else{



	$objStudent = new Student();

		$result = $objStudent->createStudent($student_id, $attendance_date, $attendance_session, $status,$remarks) ;
 			$_SESSION["message"] = $result;
 		header("Location: student_list_all.php");

		
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
	<body>
		<table border="1" width="100%">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<tr> 
				<td>
					<table border="0" width="100%" height="100px">
						<tr style="background-color:blue;"> 
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
									<tr><td valign="top" align="center" style="font-size: 17px; font-family: Arial, Helvetica, sans-serif;   color:#FFBF00; ">Student Attendance System</td></tr>
									<tr><td valign="top" align="center"  style="font-size: 12px; font-family: Arial, Helvetica, sans-serif;   color:red; ">
										<?php echo "$message" ;?>
									</td></tr>
									<tr><td valign="top" align="center">
										<table border="0" height ="250px" width="60%">
											

											<tr>
											<td width="25%"></td>
											<td width="24%">Student ID</td>
											<td width="2%"></td>
											<td width="30%">
												<input type="text" name="studentid"
												value='<?php echo "$student_id" ;?>' 
												>
											</td>
											<td >
												 <span id="studentid" style="color:red; font-size: 16px;
												 "><?php echo "$errstudentid" ;?></span>
											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%"> Attendance Date</td>
											<td width="2%"></td>
											<td width="30%">
												<input type="text" name="attendancedate"
												value='<?php echo "$attendance_date" ;?>' 
												>
											</td>
											<td >
												 <span id="attendancedate" style="color:red; font-size: 16px;
												 "><?php echo "$errattendancedate" ;?></span>

											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%"> Attendance Session</td>
											<td width="2%"></td>
											<td width="30%">
												<input type="text" name="attendancesession"
									value='<?php echo "$attendance_session" ;?>' 
												>
											</td>
											<td >
												 <span id="attendancesession" style="color:red; font-size: 16px;
												 "><?php echo "$errattendancesession" ;?></span>
											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%"> Status</td>
											<td width="2%"></td>
											<td width="30%">
												<input type="text" name="status"
												value='<?php echo "$status" ;?>' 
												>
											</td>
											<td >
												 <span id="status" style="color:red; font-size: 16px;
												 "><?php echo "$errstatus" ;?></span>
											</td>
											</tr>
											<tr>
											<td width="25%"></td>
											<td width="24%"> Remarks</td>
											<td width="2%"></td>
											<td width="30%">
												<input type="text" name="remarks"
												value='<?php echo "$remarks" ;?>' 
												>
											</td>
											<td >
												 <span id="remarks" style="color:red; font-size: 16px;
												 "><?php echo "$errremarks" ;?></span>
											</td>
											</tr>

											<tr>
											<td width="25%"></td>
											<td width="24%"> </td>
											<td width="2%"></td>
											<td width="30%">
												<input type="submit" name="btnSubmit">
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