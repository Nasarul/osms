<?php 

include('../config/dbcon.php');

$link = "";
$link_status = "display: none;";

if (isset($_POST['upload'])) { // If isset upload button or not
	// Declaring Variables
	$location = "lecture/";
	// $course_name = $_FILES['course_name'];
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"]; // Get uploaded file size
	// $code = $_FILES['code'];
	// $lecture = $_FILES['lecture'];
	/*
	How we can get mb from bytes
	(mb*1024)*1024

	In my case i'm 10 mb limit
	(10*1024)*1024
	*/

	if ($file_size > 910485760) { // Check file size 10mb or not
		echo "<script>alert('Woops! File is too big. Maximum file size allowed for upload 10 MB.')</script>";
	} else {
		$sql = "INSERT INTO tbllecture (name, new_name)
				VALUES ('$file_name', '$file_new_name')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_name);
			echo "<script>alert('Wow! File uploaded successfully.')</script>";
			// Select id from database
			$sql = "SELECT id FROM tbllecture ORDER BY id DESC";
			$result = mysqli_query($conn, $sql);
			if ($row = mysqli_fetch_assoc($result)) {
				$link = "download.php?id=" . $row['id'];
				$link_status = "display: block;";
			}
		} else {
			echo "<script>alert('Woops! Something wong went.')</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>File Upload</title>
</head>
<body>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body">
			<!-- Sharable Link Code -->
			<input type="checkbox" id="link_checkbox">
			<input type="text" value="<?php echo $link; ?>" id="link" readonly>
			<label for="link_checkbox" style="<?php echo $link_status; ?>">Get Sharable Link</label>

			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p>
					<strong>Drag and drop</strong> files here<br>
					or <span>browse</span> to begin the upload
				</p>
			</label>
			<button name="upload" class="btn">Upload</button>
		</form>
	</div>
</body>
</html>