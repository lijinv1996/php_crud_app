<?php
require_once 'dbconnection_class.php';

class Student{


	function createStudent($student_id, $attendance_date, $attendance_session, $status,$remarks){

		$sql ="INSERT INTO projectdb.student_attendance_details(student_id, attendance_date, attendance_session,status,remarks) VALUES ('$student_id', '$attendance_date', '$attendance_session', '$status','$remarks')";	

		$db = new DBConnect();
		if ($db->execQery($sql) === TRUE) {
	 			return  "student details inserted successfully";
			} else {
	 			return "Server busy please try again later ";
			}


         }
         function readStudent($student_attendance_id){

		$sql = "select * from student_attendance_details where student_attendance_id = $student_attendance_id";
		$db = new DBConnect();
		return $db->execQery($sql);


	}
	function readStudents(){
		$sql ="select * from student_attendance_details  order by student_attendance_id desc";
		$db = new DBConnect();
		return $db->execQery($sql);

	}
	function updateStudent($student_id,$attendance_date,$attendance_session,$status,$remarks,$student_attendance_id){



			$sql ="update student_attendance_details set 
		student_id = '$student_id', attendance_date = $attendance_date, attendance_session = '$attendance_session', status = '$status', remarks = '$remarks' where student_attendance_id = $student_attendance_id";

		$db = new DBConnect();
		if ($db->execQery($sql) === TRUE) {
	 			return  "student details updated successfully";
		}else{
	 			return "Server busy please try again later ";
		}




	}
	function deleteStudent($student_attendance_id){

		$sql = "delete from student_attendance_details where student_attendance_id = $student_attendance_id";
		$db = new DBConnect();
		if ($db->execQery($sql) === TRUE) {
	 			return  "student details deleted successfully";
		}else{
	 			return "Server busy please try again later ";
		}


	}

}