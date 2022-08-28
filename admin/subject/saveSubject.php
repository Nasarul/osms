<?php
include('../config/dbcon.php');


if (isset($_POST['Submit'])) {
	$code = $_POST['code'];
	$subject_name = $_POST['subject_name'];

	if (empty($code)) {
		$errorMsg = 'Please input subject code..';
	} elseif (empty($subject_name)) {
		$errorMsg = 'Please input subject name..';
	} else {

		if (!isset($errorMsg)) {
			$sql = "INSERT INTO tblsubject(code, subject_name)
					values('" . $code . "','" . $subject_name . "')";
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
