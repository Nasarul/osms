<?php

	$conn = mysqli_connect("localhost","root","","napd_olms") or die("Connection failed");

	if($_POST['file'] == ""){
		$sql = "SELECT * FROM tblcourse";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['course_id']}'>{$row['name']}</option>";
		}
	}else if($_POST['file'] == "subjectData"){

		$sql = "SELECT * FROM tblsubject WHERE course_name = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['sub_id']}'>{$row['name']}</option>";
		}
	}

	echo $str;
 ?>
