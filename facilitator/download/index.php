<?php
// include('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Download Lecture</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="main">
		<div id="header">
			<h1>Upload Lecture file</h1>
		</div>
		<div id="content">
			<form method="">
				<label>Course : </label>
				<select id="course" class="form-select" aria-label="Default select example">
					<option value="" selected>Select Course</option>					
				</select>
				<br><br>
				<label>Subject : </label>
				<select id="subject" class="form-select" aria-label="Default select example">>
					<option value="" selected>Select subject</option>
				</select>

				<?php 
				$id = $_GET['sub_id']; // Get id from url bar

				if (!$id) {
					header("Location: index.php");
				}  
					$sql = "SELECT * FROM tblsubject WHERE sub_id='$id'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						if ($row = mysqli_fetch_assoc($result)) {
					?>
					<a href="../uploads/lecture/"<? echo $row['name']; ?> download="<?php echo $row['name']; ?>" class="download_link"><?php echo $row['name']; ?></a>
					<?php
						}
					}				
					?>
<br>
<br>
				<button type="button" download="<?php echo $_FILE_name;?>" class="btn btn-primary">Download Lacture</button>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			function loadData(type, category_id) {
				$.ajax({
					url: "load-cs.php",
					type: "POST",
					data: {
						type: type,
						id: category_id
					},
					success: function(data) {
						if (type == "subjectData") {
							$("#subject").html(data);
						} else {
							$("#course").append(data);
						}
					}
				});
			}

			loadData();

			$("#course").on("change", function() {
				var course = $("#course").val();

				if (course != "") {
					loadData("subjectData", course);
				} else {
					$("#subject").html("");
				}
			})
		});
	</script>
</body>

</html>