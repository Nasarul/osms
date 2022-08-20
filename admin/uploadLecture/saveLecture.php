<?php
require_once('../config/dbcon.php');


if (isset($_POST['Submit'])) {
	$course_id = $_POST['course_id'];
	$subject_id = $_POST['subject_id'];
	$facilitator_id = $_POST['facilitator_id'];
	$lecture_name = $_POST['lecture_name'];

	
	$lecture_file = $_FILES['lecture_file']['name'];
	$lecture_type = $_FILES['lecture_file']['type'];
	$lecture_size = $_FILES['lecture_file']['size'];
	$lecture_temp_loc = $_FILES['lecture_file']['tmp_name'];
	$lecture_store = "../uploads/lecture/" . $lecture_file;
	move_uploaded_file($lecture_temp_loc, $lecture_store);


	if (empty($course_id)) {
		$errorMsg = 'Please input course Name...';
	} elseif (empty($subject_id)) {
		$errorMsg = 'Please input subject name..';
	} elseif (empty($facilitator_id)) {
		$errorMsg = 'Please input facilitator name..';
	} elseif (empty($lecture_name)) {
		$errorMsg = 'Please input lecture name..';
	} elseif (empty($lecture_file)) {
		$errorMsg = 'Please input lecture file..';
	} else {

		if (!isset($errorMsg)) {
			$sql = "INSERT INTO tbluploadlecture(course_id, subject_id, facilitator_id, lecture_name, lecture_file)
					values('" . $course_id . "','" . $subject_id . "', '" . $facilitator_id . "','" . $lecture_name . "', '" . $lecture_file . "')";
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