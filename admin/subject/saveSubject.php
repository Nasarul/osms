<?php
include('../config/dbcon.php');


if (isset($_POST['Submit'])) {
	$course = $_POST['course_name'];
	$subject_name = $_POST['subject_name'];
	$code = $_POST['code'];

	// $lecture = $_FILES['lecture']['name'];
	// $lecture_type = $_FILES['lecture']['type'];
	// $lecture_size = $_FILES['lecture']['size'];
	// $lecture_temp_loc = $_FILES['lecture']['tmp_name'];
	// $lecture_store = uploadslecture . $lecture;
	// move_uploaded_file($lecture_temp_loc, $lecture_store);


	if (empty($course)) {
		$errorMsg = 'Please input course code..';
	} elseif (empty($subject_name)) {
		$errorMsg = 'Please input subject name..';
	} elseif (empty($code)) {
		$errorMsg = 'Please input code..';
	// } elseif (empty($lecture)) {
	// 	$errorMsg = 'Please input lecture..';
	} else {

		if (!isset($errorMsg)) {
			$sql = "INSERT INTO tblsubject(course_name, subject_name, code, lecture)
					values(' . $course . ',' . $subject_name . ', ' . $code . ',' . $lecture . ')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$successMsg = 'New record added successfully';
				header('Location index.php');
			} else {
				$errorMsg = 'Error ' . mysqli_error($conn);
			}
		}
	}
}

