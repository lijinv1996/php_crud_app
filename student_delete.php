<?php
session_start();
require_once 'student_class.php';
$student_attendance_id =$_GET['student_attendance_id'];

	$objStudent = new Student();

		$result = $objStudent->deleteStudent($student_attendance_id) ;
 			$_SESSION["message"] = $result;
 		header("Location: student_list_all.php");


?>