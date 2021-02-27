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
										<?php
											echo "$message";
										?>


									</td></tr>
									<tr><td valign="top" align="center">
										


										<table border="1"  width="80%">
											<tr height = "40px" style="background-color:#FFBF00;">
											<td>student_attendance_id</td>
											<td> Student ID</td>
											<td>Attendance Date</td>
											<td>Attendance Session</td>
											
											<td>Status </td>
											<td> Remarks </td>
											<td>Edit </td>
											<td>Delete</td>
											</tr>

								<?php
									if ($result->num_rows > 0) {
										 while($row = $result->fetch_assoc()) {

											?>

						<tr>
						<td><?php echo $row["student_attendance_id"];  ?></td>
						<td><?php echo $row["student_id"];  ?></td>
						<td><?php echo $row["attendance_date"];  ?></td>
						<td><?php echo $row["attendance_session"];  ?></td>
						<td><?php echo $row["status"];  ?></td>
						<td><?php echo $row["remarks"];  ?></td>
						
						<td><a href='student_edit.php?student_attendance_id=<?php echo $row["student_attendance_id"];  ?>'>Edit </a></td>
						<td><a href='student_delete.php?student_attendance_id=<?php echo $row["student_attendance_id"];  ?>' 
							onclick="return confirm('Are you sure you want to delete this item?');"

							>Delete</a></td>
						</tr>
											
										<?php
									} // while end
								} // if end
										else{

											?>
											<tr>
											<td colspan="9">No Such record found !</td>
											
											</tr>

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
		</table>

	</body>
</html>