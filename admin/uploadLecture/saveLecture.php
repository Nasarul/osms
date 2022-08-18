<?php
require_once('../config/dbcon.php');


if (isset($_POST['Submit'])) {
	$course_name = $_POST['course_name'];
	$subject_name = $_POST['subject_name'];
	$facilitator_name = $_POST['facilitator_name'];
	$lecture_name = $_POST['name'];
	
	$lecture_file = $_FILES['lecture']['name'];
	$lecture_type = $_FILES['lecture']['type'];
	$lecture_size = $_FILES['lecture']['size'];
	$lecture_temp_loc = $_FILES['lecture']['tmp_name'];
	$lecture_store = "../uploads/lecture/" . $lecture;
	move_uploaded_file($lecture_temp_loc, $lecture_store);


	if (empty($course_name)) {
		$errorMsg = 'Please input course Name...';
	} elseif (empty($subject_name)) {
		$errorMsg = 'Please input subject name..';
	} elseif (empty($facilitator_name)) {
		$errorMsg = 'Please input facilitator name..';
	} elseif (empty($lecture_name)) {
		$errorMsg = 'Please input lecture name..';
	} elseif (empty($lecture_file)) {
		$errorMsg = 'Please input lecture file..';
	} else {

		if (!isset($errorMsg)) {
			$sql = "INSERT INTO tbluploadlecture(course_name, subject_name, facilitator_name, lecture_name, lecture)
					values('" . $course_name . "','" . $subject_name . "', '" . $facilitator_name . "','" . $lecture_name . "', '" . $lecture_file . "')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			} else {
				$errorMsg = 'Error ' . mysqli_error($conn);
			}
		}
	}
}

?>